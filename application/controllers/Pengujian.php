<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'application/security/encryption/AES128Encryption.php';
include 'application/security/hashing/SHA3KECCAK.php';

class Pengujian extends CI_Controller
{
    public function avaeff()
    {
        $data['data_avaeff'] = $this->M_dataloc->dataAvaeff();

        $this->form_validation->set_rules('koordinat', 'Koordinat', 'required');
        $this->form_validation->set_rules('koordinat-modif', 'Koordinat Modif', 'required');
        $this->form_validation->set_rules('key-enkripsi', 'Secret Key', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/avaeff', $data);
            $this->load->view('templates/footer');
        } else {
            $koordinat = $this->input->post('koordinat');
            $koordinat_modif = $this->input->post('koordinat-modif');
            $secret_key = $this->input->post('key-enkripsi');
    
            if ($koordinat && $koordinat_modif && $secret_key) {
                $aes = new AES128Encryption($secret_key);
    
                $koordinat_en = $aes->encrypt($koordinat);
                $koordinat_modif_en = $aes->encrypt($koordinat_modif);

                list($bit_difference, $bit_difference_percentage) = $this->calculate_bit_difference($koordinat_en, $koordinat_modif_en);

                $data = array (
                    'input_koordinat' => $koordinat,
                    'ciphertext_input' => $koordinat_en,
                    'input_modifikasi' => $koordinat_modif,
                    'ciphertext_input_modif' => $koordinat_modif_en,
                    'perbedaan_cipher' => $bit_difference,
                    'perbedaan_persentase' => $bit_difference_percentage
                );

                $this->load->model('m_dataloc');
                if ($this->m_dataloc->tambahDataAvaeff($data)) {
                    redirect('Pengujian/avaeff');
                } else {
                    redirect('Pengujian/avaeff');
                }
            }
        }
    }

    private function calculate_bit_difference($ciphertext1, $ciphertext2) {
        $diff = 0;
        for ($i = 0; $i < strlen($ciphertext1); $i++) {
            $byte1 = ord($ciphertext1[$i]);
            $byte2 = ord($ciphertext2[$i]);
            $xor = $byte1 ^ $byte2;
            $diff += count(array_filter(str_split(sprintf('%08b', $xor))));
        }

        $total_bits = strlen($ciphertext1) * 8; // total number of bits
        $percentage = round(($diff / $total_bits) * 100, 0);

        return [$diff, $percentage];
    }

    public function intro_integrity()
    {
        $data['data_lokasi'] = $this->M_dataloc->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/intro_integrity', $data);
    }

    public function integrity($id = NULL)
    {
        if ($id === NULL) {
            redirect('Pengujian/intro_integrity'); 
        }
    
        $this->load->model('m_dataloc');
        $data['data'] = $this->m_dataloc->get_data_by_id($id); // Get the data by id
        $data['data_lokasi'] = $this->m_dataloc->dataIntegrity(); // Get the integrity data
    
        $this->form_validation->set_rules('lat-hs-1', 'Lat Hs 1', 'required');
        $this->form_validation->set_rules('long-hs-1', 'Long Hs 1', 'required');
        $this->form_validation->set_rules('lat-hs-2', 'Lat Hs 2', 'required');
        $this->form_validation->set_rules('long-hs-2', 'Long Hs 2', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/integrity', $data); // Pass both 'data' and 'data_lokasi' to the view
        } else {
            $lat_hs_1 = $this->input->post('lat-hs-1');
            $long_hs_1 = $this->input->post('long-hs-1');
            $lat_hs_2 = $this->input->post('lat-hs-2');
            $long_hs_2 = $this->input->post('long-hs-2');
    
            if (($lat_hs_1 == $lat_hs_2) && ($long_hs_1 == $long_hs_2)) {
                echo json_encode(['result' => 'Matched']);
    
                $data = array(
                    'lat' => $data['data']->lat, 
                    'lang' => $data['data']->long,
                    'digest_lat_1' => $lat_hs_1,
                    'digest_lang_1' => $long_hs_1,
                    'digest_lat_2' => $lat_hs_2,
                    'digest_lang_2' => $long_hs_2,
                    'hasil_perbandingan' => 'Matched'
                );
    
                $this->m_dataloc->insertIntegrity($data);
    
            } else {
                echo json_encode(['result' => 'Not Matched']);
    
                $data = array(
                    'lat' => $data['data']->lat, 
                    'lang' => $data['data']->long,
                    'digest_lat_1' => $lat_hs_1,
                    'digest_lang_1' => $long_hs_1,
                    'digest_lat_2' => $lat_hs_2,
                    'digest_lang_2' => $long_hs_2,
                    'hasil_perbandingan' => 'Not Matched'
                );
    
                $this->m_dataloc->insertIntegrity($data);
            }
    
            redirect('Pengujian/integrity/' . $id);
        }
    }
    
    public function generate_hash_integrity()
    {
        log_message('debug', 'Entered generate_hash_integrity method');
        
        $lat_en = $this->input->post('lat-en');
        $long_en = $this->input->post('long-en');
    
        log_message('debug', 'Data received: lat-en=' . $lat_en . ', long-en=' . $long_en);
    
        if ($lat_en && $long_en) {
            try {
                $sha3 = new SHA3KECCAK();
                $hash_lat_integrity = $sha3::hash($lat_en, 256, false);
                $hash_long_integrity = $sha3::hash($long_en, 256, false);
    
                log_message('debug', 'Hashing success: hash_lat_integrity=' . $hash_lat_integrity . ', hash_long_integrity=' . $hash_long_integrity);
    
                echo json_encode([
                    'hash_lat_integrity' => $hash_lat_integrity,
                    'hash_long_integrity' => $hash_long_integrity
                ]);
            } catch (Exception $e) {
                log_message('error', 'Exception: ' . $e->getMessage());
                echo json_encode(['error' => 'Hashing failed: ' . $e->getMessage()]);
            }
        } else {
            log_message('error', 'Invalid input: lat-en or long-en is missing');
            echo json_encode(['error' => 'Invalid input']);
        }
    }    

    public function performa()
    {
        $data['data_lokasi'] = $this->M_dataloc->dataPerforma();

        $this->form_validation->set_rules('banyak-data', 'Banyak Data', 'required');
        $this->form_validation->set_rules('waktu-no-algo', 'Waktu No Algo', 'required');
        $this->form_validation->set_rules('waktu-with-algo', 'Waktu With Algo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/performa', $data);
            $this->load->view('templates/footer');
        } else {
            $ndata = $this->input->post('banyak-data');
            $timeNAlgo = $this->input->post('waktu-no-algo');
            $timeWAlgo = $this->input->post('waktu-with-algo');

            if ($ndata && $timeNAlgo && $timeWAlgo) {
                $peningkatan = ($timeWAlgo - $timeNAlgo);

                $data = array(
                    'banyak_data' => $ndata,
                    'waktu_tanpa_algo' => $timeNAlgo,
                    'waktu_dengan_algo' => $timeWAlgo,
                    'peningkatan' => $peningkatan
                );

                $this->load->model('m_dataloc');
                if ($this->m_dataloc->tambahDataPerforma($data)) {
                    redirect('Pengujian/performa');
                } else {
                    redirect('Pengujian/performa');
                }
            }
        }
    }
}