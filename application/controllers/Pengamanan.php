<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengamanan extends CI_Controller
{
    public function hasil()
    {
        //$data['data_lokasi'] = $this->M_dataloc->SemuaData();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/hasil');
        $this->load->view('templates/footer');
    }
}
