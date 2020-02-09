<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	public function index()
	{
		if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'dokter') {
			// do something when exist
			$data['title'] = "Halaman Utama";

			$this->load->view('header/header', $data);
			$this->load->view('header/navbar');
			$this->load->view('header/sidebar');
			// var_dump($this->session->userdata('level')); <-- SHOWING SESSION
			$this->load->view('shit');
			$this->load->view('content/main');
			$this->load->view('footer/footer');
		} else {
			// do something when doesn't exist
			redirect('login', 'refresh');
		}
	}
}
