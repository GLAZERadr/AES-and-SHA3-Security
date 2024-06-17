<?php
defined('BASEPATH') or exit('No direct script access allowed');

class hasil extends CI_Model
{
    public function SemuaData()
    {
        return $this->db->get('data_hasil')->result_array();
    }
}
