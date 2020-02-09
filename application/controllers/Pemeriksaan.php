<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemeriksaan');
        $this->load->model('M_pemilik');
        $this->load->model('M_dokter');
        $this->load->model('M_hewan');
        $this->load->helper('date');
        $this->load->library('form_validation');
    }

    public function index()
    {

        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $data['pemilik'] = $this->M_pemeriksaan->getByKeyword();
            $data['pemeriksaan'] = $this->M_pemeriksaan->getAll();
            $data['title'] = "Data Pemeriksaan";

            $this->load->view('header/header', $data);
            $this->load->view('header/navbar');
            $this->load->view('header/sidebar');
            $this->load->view('shit');
            $this->load->view('header/title', $data);
            $this->load->view('content/pemeriksaan', $data);
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
            $this->load->model('M_dokter');
            $this->load->model('M_hewan');

            $data['title'] = "Tambah Data Pemeriksaan";
            $data['pemilik'] = $this->M_pemilik->get();
            $data['dokter'] = $this->M_dokter->get();
            $data['pemeriksaan'] = $this->M_pemeriksaan->getAll();
            $selectP = $this->input->post('nama_pemilik');
            $selectD = $this->input->post('nama_dokter');

            $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|callback_select_validate_pemilik');
            $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|callback_select_validate_dokter');
            $this->form_validation->set_rules('anamnesa', 'Anamnesa', 'required');
            $this->form_validation->set_rules('suhu', 'Suhu', 'required|numeric');
            $this->form_validation->set_rules('pulsus', 'Pulsus', 'required');
            $this->form_validation->set_rules('respirasi', 'Respirasi', 'required');
            $this->form_validation->set_rules('turgor_kulit', 'Turgor Kulit', 'required');
            $this->form_validation->set_rules('selaput_lendir', 'Selaput Lendir', 'required');
            $this->form_validation->set_rules('terapi', 'Terapi', 'required');
            $this->form_validation->set_rules('nama_dokter', 'Dokter', 'required|callback_select_validate_dokter');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/pemeriksaan_tambah', $data);
                $this->load->view('footer/footer');
            } else {
                $this->M_pemeriksaan->tambah();
                $this->session->set_flashdata('tambah', 'Ditambahkan');
                redirect('pemeriksaan');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }

    // BUAT AJAX GUYS
    function get_nama_hewan()
    {
        $this->load->model('M_hewan');

        $id = $this->input->post('id');
        $data = $this->M_hewan->getNamaHewan($id);
        echo json_encode($data);
    }

    public function select_validate_pemilik($selectP)
    {
        // fungsi ini akan bernilai FALSE kalau select box tidak di tukar
        if ($selectP == "none") {
            $this->form_validation->set_message('select_validate_pemilik', 'Pemilik Hewan wajib di pilih!');
            return FALSE;
        } else {
            // akan bernilai TRUE jika di tukar
            return TRUE;
        }
    }

    public function select_validate_dokter($selectD)
    {
        // fungsi ini akan bernilai FALSE kalau select box tidak di tukar
        if ($selectD == "none") {
            $this->form_validation->set_message('select_validate_dokter', 'Petugas wajib di pilih!');
            return FALSE;
        } else {
            // akan bernilai TRUE jika di tukar
            return TRUE;
        }
    }

    public function ubah($id_pemeriksaan,$id_dokter,$id_pemilik,$id_hewan)
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            // $id_pemeriksaan = $this->uri->segment(3);
            // $id_pemilik = $this->uri->segment(5);
            // $id_hewan = $this->uri->segment(6);

            $data['title'] = "Edit Data Pemeriksaan";
            $data['pemeriksaan'] = $this->M_pemeriksaan->getById($id_pemeriksaan);
            $data['hewan'] = $this->M_hewan->getById($id_hewan);
            $data['pemilik'] = $this->M_pemilik->getById($id_pemilik);
            $data['dokter'] = $this->M_dokter->get();
            $selectP = $this->input->post('nama_pemilik');
            $selectD = $this->input->post('nama_dokter');

            $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
            $this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|callback_select_validate_dokter');
            $this->form_validation->set_rules('anamnesa', 'Anamnesa', 'required');
            $this->form_validation->set_rules('suhu', 'Suhu', 'required|numeric');
            // $this->form_validation->set_rules('pulsus', 'Pulsus', 'required');
            // $this->form_validation->set_rules('respirasi', 'Respirasi', 'required');
            $this->form_validation->set_rules('turgor_kulit', 'Turgor Kulit', 'required');
            $this->form_validation->set_rules('selaput_lendir', 'Selaput Lendir', 'required');
            $this->form_validation->set_rules('terapi', 'Terapi', 'required');
            $this->form_validation->set_rules('nama_dokter', 'Dokter', 'required|callback_select_validate_dokter');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/pemeriksaan_edit', $data);
                $this->load->view('footer/footer');
            } else {
                $this->M_pemeriksaan->tambah();
                $this->session->set_flashdata('edit', 'Di update!');
                redirect('pemeriksaan');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }
}

/* End of file Pemeriksaan.php */
