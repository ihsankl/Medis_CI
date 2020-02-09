<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemeriksaan extends CI_Model
{

    public function getAll()
    {
        return $this->db->query("SELECT pemeriksaan.*,status_hewan.*,dokter.id_dokter,dokter.nama_dokter,pemilik.* FROM pemeriksaan INNER JOIN status_hewan ON pemeriksaan.id_status = status_hewan.id_status INNER JOIN dokter ON pemeriksaan.id_dokter = dokter.id_dokter INNER JOIN pemilik ON pemeriksaan.id_pemilik = pemilik.id_pemilik ORDER BY pemeriksaan.tanggal DESC")->result_array();
    }

    public function getByKeyword()
    {
        $keyword = $this->input->post('cari_pemilik');
        $this->db->select('*');
        $this->db->from('pemilik');
        $this->db->like('nama_pemilik', $keyword);
        $this->db->or_like('nomor_reg', $keyword);
        return $this->db->get()->result_array();
    }


    public function tambah()
    {
        $datestring = '%Y-%m-%d';

        $data = array(
            'id_status' => $this->input->post('nama_hewan', true),
            'id_dokter' => $this->input->post('nama_dokter', true),
            'id_pemilik' => $this->input->post('nama_pemilik', true),
            'tanggal' => mdate($datestring),
            'anamnesa' => $this->input->post('anamnesa', true),
            'suhu' => $this->input->post('suhu', true),
            'pulsus' => $this->input->post('pulsus', true),
            'respirasi' => $this->input->post('respirasi', true),
            'diagnosa' => $this->input->post('diagnosa', true),
            'terapi' => $this->input->post('terapi', true),
            'turgor_kulit' => $this->input->post('turgor_kulit', true),
            'selaput_lendir' => $this->input->post('selaput_lendir', true)
        );

        $this->db->insert('pemeriksaan', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('pemeriksaan', ['id_pemeriksaan' => $id])->row_array();
    }

}

/* End of file M_pemeriksaan.php */
