<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hewan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_hewan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $data['hewan'] = $this->M_hewan->get();
            $data['title'] = "Data Hewan";

            $this->load->view('header/header', $data);
            $this->load->view('header/navbar');
            $this->load->view('header/sidebar');
            $this->load->view('shit');
            $this->load->view('header/title', $data);
            $this->load->view('content/hewan', $data);
            $this->load->view('footer/footer');
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $this->load->model('M_pemilik');
            $data['title'] = "Tambah Data Hewan";
            $data['pemilik'] = $this->M_pemilik->get();
            // var $select di siapin buat fungsi select_validate()
            $select = $this->input->post('nama_pemilik');

            $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required');
            $this->form_validation->set_rules('jenis_hewan', 'Jenis Hewan', 'required');
            $this->form_validation->set_rules('ras_hewan', 'Ras Hewan', 'required');
            $this->form_validation->set_rules('umur', 'Umur Hewan', 'required|numeric');
            $this->form_validation->set_rules('warna_bulu', 'Warna Bulu', 'required');
            $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|numeric');
            // di rules ada callback_select_validate buat memanggil fungsi select_validate()
            $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|callback_select_validate');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/hewan_tambah');
                $this->load->view('footer/footer');
            } else {
                $this->M_hewan->tambah();
                $this->session->set_flashdata('tambah', 'Ditambahkan');
                redirect('hewan');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }

    public function select_validate($select)
    {
        // fungsi ini akan bernilai FALSE kalau select box tidak di tukar
        if ($select == "none") {
            $this->form_validation->set_message('select_validate', 'Pemilik Hewan wajib di pilih!');
            return FALSE;
        } else {
            // akan bernilai TRUE jika di tukar
            return TRUE;
        }
    }

    public function hapus($id)
    {
        $this->M_hewan->hapus($id);
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('hewan');
    }

    public function ubah($id)
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $this->load->model('M_pemilik');
            $data['title'] = "Tambah Data Hewan";
            $data['pemilik'] = $this->M_pemilik->get();
            $data['hewan'] = $this->M_hewan->getById($id);
            // var $select di siapin buat fungsi select_validate()
            $select = $this->input->post('nama_pemilik');

            $this->form_validation->set_rules('nama_hewan', 'Nama Hewan', 'required');
            $this->form_validation->set_rules('jenis_hewan', 'Jenis Hewan', 'required');
            $this->form_validation->set_rules('ras_hewan', 'Ras Hewan', 'required');
            $this->form_validation->set_rules('umur', 'Umur Hewan', 'required|numeric');
            $this->form_validation->set_rules('warna_bulu', 'Warna Bulu', 'required');
            $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required|numeric');
            // di rules ada callback_select_validate buat memanggil fungsi select_validate()
            $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|callback_select_validate');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/hewan_edit', $data);
                $this->load->view('footer/footer');
            } else {
                $this->M_hewan->edit();
                $this->session->set_flashdata('edit', 'Di update!');
                redirect('hewan');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }
}

/* End of file Hewan.php */
