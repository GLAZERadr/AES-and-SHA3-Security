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
                redirect('Dataloc/dataloc');
            } else {
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
            redirect('Dataloc/dataloc'); 
        }
        
        $this->form_validation->set_rules('key', 'Secret Key', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $data_lokasi;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/enkripsi', $data);
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
    
            $this->m_dataloc->updateData($data_lokasi->id, $data);
    
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
    
        if (empty($data_lokasi)) {
            redirect('Dataloc/dataloc');
        }
    
        $this->form_validation->set_rules('digest_text_lat_2', 'Digest Latitude', 'required');
        $this->form_validation->set_rules('digest_text_long_2', 'Digest Longitude', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['data'] = $data_lokasi;
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/hashing_data', $data);
            $this->load->view('templates/footer');
        } else {
            $digest_text_lat_2 = $this->input->post('digest_text_lat_2');
            $digest_text_long_2 = $this->input->post('digest_text_long_2');

            log_message('debug', 'Data received: lat_hs=' . $digest_text_lat_2 . ', long_hs=' . $digest_text_long_2);

            $data = array(
                'lat_hs' => $digest_text_lat_2,
                'long_hs' => $digest_text_long_2
            );
    
            $this->m_dataloc->updateData($id, $data);

            redirect('Dataloc/dekripsi/' . $id);
        }
    }    

    public function generate_hash()
    {
        log_message('debug', 'Entered generate_hash method');
        
        $lat_en = $this->input->post('lat_en');
        $long_en = $this->input->post('long_en');

        log_message('debug', 'Data received: lat_en=' . $lat_en . ', long_en=' . $long_en);

        if ($lat_en && $long_en) {
            try {
                $sha3 = new SHA3KECCAK();
                $hash_lat_en = $sha3::hash($lat_en, 256, false);
                $hash_long_en = $sha3::hash($long_en, 256, false);

                log_message('debug', 'Hashing success: hash_lat_en=' . $hash_lat_en . ', hash_long_en=' . $hash_long_en);

                echo json_encode([
                    'hash_lat_en' => $hash_lat_en,
                    'hash_long_en' => $hash_long_en
                ]);
            } catch (Exception $e) {
                log_message('error', 'Exception: ' . $e->getMessage());
                echo json_encode(['error' => 'Hashing failed: ' . $e->getMessage()]);
            }
        } else {
            log_message('error', 'Invalid input: lat_en or long_en is missing');
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    public function generate_hash_db()
    {
        log_message('debug', 'Entered generate_hash_db method');

        $lat_en_db = $this->input->post('lat_en_db');
        $long_en_db = $this->input->post('long_en_db');

        log_message('debug', 'Data received: lat_en_db=' . $lat_en_db . ', long_en_db=' . $long_en_db);

        if ($lat_en_db && $long_en_db) {
            try {
                $sha3 = new SHA3KECCAK();
                $hash_lat_en_db = $sha3::hash($lat_en_db, 256, false);
                $hash_long_en_db = $sha3::hash($long_en_db, 256, false);

                log_message('debug', 'Hashing success: hash_lat_en_db=' . $hash_lat_en_db . ', hash_long_en_db=' . $hash_long_en_db);

                echo json_encode([
                    'hash_lat_en_db' => $hash_lat_en_db,
                    'hash_long_en_db' => $hash_long_en_db
                ]);
            } catch (Exception $e) {
                log_message('error', 'Exception: ' . $e->getMessage());
                echo json_encode(['error' => 'Hashing failed: ' . $e->getMessage()]);
            }
        } else {
            log_message('error', 'Invalid input: lat_en_db or long_en_db is missing');
            echo json_encode(['error' => 'Invalid input']);
        }
    }

    public function compare_hash_digest()
    {
        $digest_lat_1 = $this->input->post('digest_text_lat_1');
        $digest_long_1 = $this->input->post('digest_text_long_1');
        $digest_lat_2 = $this->input->post('digest_text_lat_2');
        $digest_long_2 = $this->input->post('digest_text_long_2');

        log_message('debug', 'Data received: digest_lat_1=' . $digest_lat_1 . ', digest_long_1=' . $digest_long_1 . ', digest_lat_2=' . $digest_lat_2 . ', digest_long_2=' . $digest_long_2);

        if (($digest_lat_1 == $digest_lat_2) && ($digest_long_1 == $digest_long_2)) {
            echo json_encode(['result' => 'Matched']);
        } else {
            echo json_encode(['result' => 'Not Matched']);
        }
    }

    public function dekripsi($id = NULL)
    {
        if ($id === NULL) {
            redirect('Dataloc/dataloc');
        }

        $this->load->model('m_dataloc');
        $data_lokasi = $this->m_dataloc->get_data_by_id($id);

        if (empty($data_lokasi)) {
            redirect('Dataloc/dataloc');
        }

        $data['data'] = $data_lokasi;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dekripsi', $data);
    }

    public function generate_dekripsi()
    {
        $lat_en = $this->input->post('lat_en_dec');
        $long_en = $this->input->post('long_en_dec');
        $secret_key = $this->input->post('key_dec');

        $aes = new AES128Encryption($secret_key);
        $lat = $aes->decrypt($lat_en);
        $long = $aes->decrypt($long_en);

        log_message('debug', 'Data received: lat=' . $lat_en . ', long=' . $long_en . ', secret=' . $secret_key);

        echo json_encode([
            'lat' => $lat,
            'long' => $long,
            'key' => $secret_key
        ]);
    }
}