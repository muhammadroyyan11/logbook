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

    public function get($where = null)
    {
        $this->db->select('*');
        $this->db->from('logbook');
        if ($where != null) {
            $this->db->where('kode_id', $where);
        }
        $this->db->join('kode', 'kode.id_kode = logbook.kode_id');
        $query = $this->db->get();
        return $query;
    }

    public function get_row($where = null)
    {
        $this->db->select('*');
        $this->db->from('logbook');
        if ($where != null) {
            $this->db->where('id_log', $where);
        }
        $this->db->join('kode', 'kode.id_kode = logbook.kode_id');
        $query = $this->db->get();
        return $query;
    }

    public function get_by_user($where = null)
    {
        $this->db->select('*');
        $this->db->from('pilihan');
        if ($where != NULL) {
            $this->db->where('user', $where);
        }
        $this->db->join('logbook', 'logbook.id_log  = pilihan.logbook');
        $query = $this->db->get();
        return $query;
    }

    public function get_by_kepala($where = null)
    {
        $this->db->select('*');
        $this->db->from('pilihan');
        if ($where != NULL) {
            $this->db->where('ruang', $where);
        }
        $this->db->join('logbook', 'logbook.id_log  = pilihan.logbook');
        $query = $this->db->get();
        return $query;
    }

    public function get_rekap_user($where = null, $range = null)
    {
        $this->db->select('logbook.kode, logbook.kompetensi, COUNT(*) AS count');
        $this->db->from('pilihan');
        if ($where != NULL) {
            $this->db->where('user', $where);
        }
        if ($range != null) {
            $this->db->where('date' . ' >=', $range['mulai']);
            $this->db->where('date' . ' <=', $range['akhir']);
        }
        $this->db->join('logbook', 'logbook.id_log  = pilihan.logbook');
        $this->db->group_by('logbook.kode');
        $query = $this->db->get();
        return $query;
    }
}
