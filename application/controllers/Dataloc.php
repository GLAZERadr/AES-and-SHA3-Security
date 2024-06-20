<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'application/security/encryption/AES128Encryption.php';
include 'application/security/hashing/SHA3KECCAK.php';

class Dataloc extends CI_Controller
{
    public function dataloc()
    {
        $data['data_lokasi'] = $this->M_dataloc->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dataloc', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_data() 
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/tambah_data');
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('long', 'Longitude', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $data = array(
                'lat' => $this->input->post('lat'),
                'long' => $this->input->post('long')
            );

            $this->load->model('m_dataloc');
            if ($this->m_dataloc->tambahData($data)) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('Dataloc/dataloc');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
                redirect('Dataloc/dataloc');
            }
        }
    }


    public function enkripsi($id = NULL)
    {
        if ($id === NULL) {
            redirect('Dataloc/dataloc'); 
        }
    
        $this->load->model('m_dataloc');
        $data_lokasi = $this->m_dataloc->get_data_by_id($id);
    
        if (empty($data_lokasi)) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan');
            redirect('Dataloc/dataloc'); 
        }
    
        $this->form_validation->set_rules('key', 'Secret Key', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $data_lokasi;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/enkripsi', $data);
            $this->load->view('templates/footer');
        } else {
            $secret_key = $this->input->post('key');
            $aes = new AES128Encryption($secret_key);
    
            $encrypted_lat = $aes->encrypt($data_lokasi->lat);
            $encrypted_long = $aes->encrypt($data_lokasi->long);
    
            $data = array(
                'lat_en' => $encrypted_lat,
                'long_en' => $encrypted_long,
                'secret_key' => $secret_key
            );
    
            $this->m_dataloc->updateEnkripsi($data_lokasi->id, $data);
            $this->session->set_flashdata('success', 'Data berhasil dienkripsi');
    
            redirect('Dataloc/hash/' . $data_lokasi->id); 
        }
    }
    

    public function hash($id = NULL)
    {
        if ($id === NULL) {
            redirect('Dataloc/dataloc');
        }

        $this->load->model('m_dataloc');
        $data_lokasi = $this->m_dataloc->get_data_by_id($id);

        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $data_lokasi;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/hashing_data', $data);
            $this->load->view('templates/footer');
        } 
    }

    public function generate_hash()
    {
        $lat_en = $this->input->post('lat_en');
        $long_en = $this->input->post('long_en');

        if ($lat_en && $long_en) {
            $sha3 = new SHA3KECCAK();
            $hash_lat_en = $sha3::hash($lat_en);
            $hash_long_en = $sha3::hash($long_en);

            echo json_encode([
                'hash_lat_en' => $hash_lat_en,
                'hash_long_en' => $hash_long_en
            ]);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    public function generate_hash_db()
    {
        $lat_en_db = $this->input->post('lat_en_db');
        $long_en_db = $this->input->post('long_en_db');

        if ($lat_en_db && $long_en_db) {
            $sha3 = new SHA3KECCAK();
            $hash_lat_en_db = $sha3::hash($lat_en_db);
            $hash_long_en_db = $sha3::hash($long_en_db);

            echo json_encode([
                'hash_lat_en_db' => $hash_lat_en_db,
                'hash_long_en_db' => $hash_long_en_db
            ]);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    public function dekripsi()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dekripsi');
        $this->load->view('templates/footer');
    }
}
