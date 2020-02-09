<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_hewan extends CI_Model
{

    public function get()
    {
        return $this->db->query("SELECT pemilik.id_pemilik, pemilik.nama_pemilik, status_hewan.* FROM pemilik INNER JOIN status_hewan ON pemilik.id_pemilik = status_hewan.id_pemilik ")->result_array();
    }

    public function tambah()
    {
        $data = array(
            'id_pemilik' => $this->input->post('nama_pemilik'),
            'nama_hewan' => $this->input->post('nama_hewan'),
            'ras_hewan' => $this->input->post('ras_hewan'),
            'jenis_hewan' => $this->input->post('jenis_hewan'),
            'umur' => $this->input->post('umur'),
            'kelamin' => $this->input->post('jenis_kelamin'),
            'warna_bulu' => $this->input->post('warna_bulu'),
            'berat_badan' => $this->input->post('berat_badan')
        );

        $this->db->insert('status_hewan', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_status', $id);
        $this->db->delete('status_hewan');
    }

    public function getById($id)
    {
        return $this->db->get_where('status_hewan', ['id_status' => $id])->row_array();
    }

    public function edit()
    {
        $data = array(
            'id_pemilik' => $this->input->post('id_pemilik', true),
            'nama_hewan' => $this->input->post('nama_hewan', true),
            'ras_hewan' => $this->input->post('ras_hewan', true),
            'jenis_hewan' => $this->input->post('jenis_hewan', true),
            'kelamin' => $this->input->post('jenis_kelamin', true),
            'kelamin' => $this->input->post('jenis_kelamin', true),
            'warna_bulu' => $this->input->post('warna_bulu', true),
            'berat_badan' => $this->input->post('berat_badan', true)
        );

        $this->db->where('id_status', $this->input->post('id_status'));
        $this->db->update('status_hewan', $data);
    }

    public function getNamaHewan($id)
    {
        // BUAT AJAX DOANK
        $hasil=$this->db->query("SELECT * FROM status_hewan WHERE id_pemilik='$id'")->result_array();
        return $hasil;
    }

}

/* End of file M_hewan.php */
