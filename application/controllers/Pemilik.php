<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemilik');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $data['pemilik'] = $this->M_pemilik->get();
            $data['title'] = "Data Pemilik";

            $this->load->view('header/header', $data);
            $this->load->view('header/navbar');
            $this->load->view('header/sidebar');
            $this->load->view('shit');
            $this->load->view('header/title', $data);
            $this->load->view('content/pemilik', $data);
            $this->load->view('footer/footer');
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }

    public function tambah()
    {

        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $data['title'] = "Tambah Data Pemilik";

            $this->form_validation->set_rules('nama_pemilik', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('nohp', 'No. HP', 'required|numeric');
            $this->form_validation->set_rules('nomor_reg', 'No. Regis', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/pemilik_tambah');
                $this->load->view('footer/footer');
            } else {
                $this->M_pemilik->tambah();
                $this->session->set_flashdata('tambah', 'Ditambahkan');
                redirect('pemilik');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->M_pemilik->hapus($id);
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('pemilik');
    }

    public function ubah($id)
    {
        if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
            $data['title'] = "Edit Data Pemilik";
            $data['pemilik'] = $this->M_pemilik->getById($id);

            $this->form_validation->set_rules('nama_pemilik', 'Nama', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('nohp', 'No. HP', 'required|numeric');
            $this->form_validation->set_rules('nomor_reg', 'No. Regis', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/pemilik_edit', $data);
                $this->load->view('footer/footer');
            } else {
                $this->M_pemilik->ubah();
                $this->session->set_flashdata('tambah', 'Diubah');
                redirect('pemilik');
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }
}

/* End of file Pemilik.php */
/* Location: ./application/controllers/Pemilik.php */
