<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dokter');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'admin') {
            $data['dokter'] = $this->M_dokter->get();
            $data['title'] = "Data Dokter";

            $this->load->view('header/header', $data);
            $this->load->view('header/navbar');
            $this->load->view('header/sidebar');
            $this->load->view('shit');
            $this->load->view('header/title', $data);
            $this->load->view('content/dokter', $data);
            $this->load->view('footer/footer');
        } else {
            // do something when doesn't exist
            redirect('error404', 'refresh');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('level') == 'admin') {
            $data['title'] = "Tambah Data Dokter";

            $this->form_validation->set_rules('nama_dokter', 'Nama', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
            $this->form_validation->set_rules('str', 'STR', 'required');
            $this->form_validation->set_rules('ijin_praktek', 'Ijin Praktek', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/dokter_tambah');
                $this->load->view('footer/footer');
            } else {
                $data = array(
                    'nama_dokter' => $this->input->post('nama_dokter', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'umur' => $this->input->post('umur', true),
                    'str' => $this->input->post('str', true),
                    'ijin_praktek' => $this->input->post('ijin_praktek', true),
                    'alamat' => $this->input->post('alamat', true)
                );

                $this->M_dokter->tambah($data, 'dokter');
                $this->session->set_flashdata('tambah', 'Ditambahkan');
                redirect('dokter');
            }
        } else {
            // do something when doesn't exist
            redirect('error404', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->M_dokter->hapus($id);
        $this->session->set_flashdata('hapus', 'Dihapus');
        redirect('dokter');
    }

    public function ubah($id)
    {
        if ($this->session->userdata('level') == 'admin') {
            $data['title'] = "Edit Data Dokter";
            $data['dokter'] = $this->M_dokter->getById($id);

            $this->form_validation->set_rules('nama_dokter', 'Nama', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
            $this->form_validation->set_rules('str', 'STR', 'required');
            $this->form_validation->set_rules('ijin_praktek', 'Ijin Praktek', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');


            if ($this->form_validation->run() == FALSE) {
                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/dokter_edit', $data);
                $this->load->view('footer/footer');
            } else {
                $data = array(
                    'nama_dokter' => $this->input->post('nama_dokter', true),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                    'umur' => $this->input->post('umur', true),
                    'str' => $this->input->post('str', true),
                    'ijin_praktek' => $this->input->post('ijin_praktek', true),
                    'alamat' => $this->input->post('alamat', true)
                );

                $this->M_dokter->ubah($data, 'dokter', $id);
                $this->session->set_flashdata('edit', 'Diubah');
                redirect('dokter');
            }
        } else {
            // do something when doesn't exist
            redirect('error404', 'refresh');
        }
    }
}

/* End of file Dokter.php */
