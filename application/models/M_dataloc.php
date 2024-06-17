<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dataloc extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('data_lokasi')->result_array();
    }

    public function tambahData($data) {
        $this->db->insert('data_lokasi', $data);
    }

    public function get_data_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('data_lokasi');
        return $query->row();
    }

    public function updateEnkripsi($id, $data) {
        $this->db->where('id', $id)->update('data_lokasi', $data);
    }

    public function updateHashing($id, $data) {
        $this->db->where('id', $id)->update('data_lokasi', $data);
    }
}
