<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ganti_pass extends CI_Model {

    public function ganti_pass($data,$table,$id)
    {
        $this->db->where('id_dokter',$id);
        $this->db->update($table, $data);
    }

}

/* End of file M_ganti_pass.php */
