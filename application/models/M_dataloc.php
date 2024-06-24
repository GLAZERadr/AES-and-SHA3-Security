<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dataloc extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('data_lokasi')->result_array();
    }

    public function tambahData($data) 
    {
        $this->db->insert('data_lokasi', $data);
    }

    public function get_data_by_id($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get('data_lokasi');
        return $query->row();
    }

    public function updateData($id, $data) 
    {
        $this->db->where('id', $id)->update('data_lokasi', $data);
    }

    public function dataAvaeff()
    {
        return $this->db->get('avalanche_effect')->result_array();
    }

    public function tambahDataAvaeff($data) 
    {
        $this->db->insert('avalanche_effect', $data);
    }

    public function hitungRataRata() {
        $this->db->select_avg('perbedaan_cipher', 'rata_perbedaan_cipher');
        $this->db->select_avg('perbedaan_persentase', 'rata_perbedaan_persentase');
        $query = $this->db->get('avalanche_effect');
        return $query->row_array();
    }

    public function dataPerforma()
    {
        return $this->db->get('performa_sistem')->result_array();
    }

    public function tambahDataPerforma($data) 
    {
        $this->db->insert('performa_sistem', $data);
    }

    public function dataIntegrity() 
    {
        return $this->db->get('integrity')->result_array();
    }

    public function tambahDataIntegrity($data)
    {
        $this->db->insert('integrity', $data);
    }
}
