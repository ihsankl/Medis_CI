<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Halaman Tidak Ditemukan!';
        $this->load->view('content/error-404', $data);
        
    }

}

/* End of file Error404.php */
