<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemilik extends CI_Model {

    public function get()
    {
        return $this->db->get('pemilik')->result_array();
    }

    public function tambah()
    {
        $data = array(
            'nama_pemilik' => $this->input->post('nama_pemilik',true),
            'alamat' => $this->input->post('alamat',true),
            'nohp' => $this->input->post('nohp',true),
            'nomor_reg' => $this->input->post('nomor_reg',true)
        );

        $this->db->insert('pemilik',$data);
    }

    public function hapus($id)
    {
        $this->db->where('id_pemilik',$id);
        $this->db->delete('pemilik');
    }

    public function getById($id)
    {
        return $this->db->get_where('pemilik', ['id_pemilik' => $id])->row_array();
    }

    public function ubah()
    {
        $data = array(
            'nama_pemilik' => $this->input->post('nama_pemilik',true),
            'alamat' => $this->input->post('alamat',true),
            'nohp' => $this->input->post('nohp',true),
            'nomor_reg' => $this->input->post('nomor_reg',true)
        );

        $this->db->where('id_pemilik', $this->input->post('id_pemilik'));
        $this->db->update('pemilik',$data);
    }

}

/* End of file M_pemilik.php */
