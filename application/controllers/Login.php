<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('content/login', $data);
    }

    public function aksi_login()
    {
        $cek_admin = $this->M_login->cek_login()->num_rows();
        $cek_dokter = $this->M_login->cek_login_dokter()->num_rows();
        $data_admin = $this->M_login->cek_login()->row_array();
        $data_dokter = $this->M_login->cek_login_dokter()->row_array();

        if ($cek_admin > 0) {
            $data_session = array(
                'nama' => $data_admin['username'],
                'level' => 'admin'
            );

            $this->session->set_userdata($data_session);
            redirect(base_url());
        } elseif ($cek_dokter > 0) {
            $data_session = array(
                'nama' => $data_dokter['nama_dokter'],
                'id_dokter' => $data_dokter['id_dokter'],
                'level' => 'dokter'
            );
            $this->session->set_userdata($data_session);

            if ($data_dokter['pass_default'] == 1) {
                redirect('ganti_pass', 'refresh');
            }
            redirect(base_url());
        } else {
            $this->session->set_flashdata('gagal_login', 'salah!');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}

/* End of file Login.php */
