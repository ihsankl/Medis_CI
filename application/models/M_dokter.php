<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dokter extends CI_Model
{

    public function get()
    {
        $q = $this->db->get('dokter')->result_array();
        return $q;
    }

    public function tambah($data,$table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_dokter',$id);
        $this->db->delete('dokter');
    }

    public function getById($id)
    {
        return $this->db->get_where('dokter',['id_dokter' => $id])->row_array();
    }

    public function ubah($data,$table,$id)
    {
        $this->db->where('id_dokter',$id);
        $this->db->update($table, $data);
    }
}

/* End of file M_dokter.php */
