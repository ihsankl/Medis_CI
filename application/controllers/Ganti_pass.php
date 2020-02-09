<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ganti_pass extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ganti_pass');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('level') == 'dokter') {

            $this->form_validation->set_rules('pass_baru', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('confirm_pass_baru', 'Konfirm Password', 'required|matches[pass_baru]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Halaman Ganti Password";

                $this->load->view('header/header', $data);
                $this->load->view('header/navbar');
                $this->load->view('header/sidebar');
                // var_dump($this->session->userdata('level')); <-- SHOWING SESSION
                $this->load->view('shit');
                $this->load->view('header/title', $data);
                $this->load->view('content/ganti_pass');
                $this->load->view('footer/footer');
            }else {
                $id_dokter = $this->session->userdata('id_dokter');
                $data = array(
                    'password' => $this->input->post('pass_baru'), 
                    'pass_default' => 0 
                );

                $this->M_ganti_pass->ganti_pass($data,'dokter',$id_dokter);
                redirect(base_url());
                
            }
        } else {
            // do something when doesn't exist
            redirect('login', 'refresh');
        }
    }
}

/* End of file Ganti_pass.php */
