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

    public function hitungRataRataPerforma() {
        $this->db->select_avg('waktu_tanpa_algo', 'rata_performa_waktu_tanpa_algo');
        $this->db->select_avg('waktu_dengan_algo', 'rata_performa_waktu_dengan_algo');
        $this->db->select_avg('peningkatan', 'rata_peningkatan_performaa');
        $query = $this->db->get('performa_sistem');
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
    
    public function check_location_values($id, $lat_en, $long_en, $lat_hs, $long_hs) {
        $this->db->where('id', $id);
        $this->db->where('lat_en', $lat_en);
        $this->db->where('long_en', $long_en);
        $this->db->where('lat_hs', $lat_hs);
        $this->db->where('long_hs', $long_hs);
        $query = $this->db->get('data_lokasi');

        return $query->num_rows() > 0;
    }
}
