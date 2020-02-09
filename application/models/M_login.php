<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function cek_login()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $where = array(
            'username' => $user,
            'password' => $pass
        );

        return $this->db->get_where('users', $where);
    }

    public function cek_login_dokter()
    {
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $where = array(
            'username' => $user,
            'password' => $pass
        );

        return $this->db->get_where('dokter', $where);
    }
}

/* End of file M_login.php */
