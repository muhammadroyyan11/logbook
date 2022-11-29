<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan_model extends CI_Model
{

    public function add($post)
    {
        $params = [
            'nama_pelatihan' => $post['nama'],
            'tanggal' => $post['tanggal'],
            'skp' => $post['skp'],
            'sertifikat' => $post['sertif'],
            'user_id' => userdata('id_user')
        ];
        $this->db->insert('pelatihan', $params);
    }
}
