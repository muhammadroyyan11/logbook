<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logbook_model extends CI_Model
{
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
        
    }

    public function update_kode($params)
    {
        $this->db->where('id_kode', userdata('kode_pk'));
        $this->db->update('kode', $params);
    }
}
