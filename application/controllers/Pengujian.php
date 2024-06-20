<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengujian extends CI_Controller
{
    public function avaeff()
    {
        //$data['data_lokasi'] = $this->M_dataloc->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/avaeff');
        $this->load->view('templates/footer');
    }

    public function integrity()
    {
        // $data['data'] = $data_lokasi;
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/integrity');
        $this->load->view('templates/footer');
    }

    public function performa()
    {
        //$data['data_lokasi'] = $this->M_dataloc->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/performa');
        $this->load->view('templates/footer');
    }
}