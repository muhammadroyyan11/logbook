<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Base_model extends CI_Model
{

    public function getUser($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function getUserAdmin($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data);
        } else {
            return $this->db->get_where($table, $where);
        }
    }

    public function changePassword($post)
    {
        $params = [
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
        ];

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }

    public function getWhere($where = null)
    {
        $this->db->select('*');
        $this->db->from('potensi_user');
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        $this->db->where('role', 3);
        $this->db->order_by('id_potuser', 'desc');
        $this->db->group_by('user_id');
        if ($where != null) {
            $this->db->where('wilayah', $where);
        }
        return $this->db->get();
    }

    public function saveAbout($post)
    {
        $params = [
            'instagram'   => $post['instagram'],
            'description' => $post['about'],
            'telp'        => $post['no_telp'],
            'email'       => $post['email']

        ];

        $this->db->where('id_about', $post['id_about']);
        $this->db->update('about', $params);
    }

    public function getAnggota($where = null)
    {
        // $this->db->select('*');
        // $this->db->distinct();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('anggota', 'anggota.id_anggota = user.anggota_id');
        $this->db->where('role', 3);
        $this->db->order_by('id_user', 'desc');
        if ($where != null) {
            $this->db->where('kwarcab', $where);
        }
        return $this->db->get();
    }

    public function getExport($where = null)
    {
        $this->db->select('*');
        $this->db->from('anggota');
        // $this->db->join('user', 'user.id_user = potensi_user.user_id');
        // $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        // $this->db->where('role', 3);
        // if ($where != null) {
        //     $this->db->where('wilayah', $where);
        // }
        return $this->db->get();
    }

    public function getWhereByPotensi($potensi_id)
    {
        $this->db->select('*');
        $this->db->from('potensi_user');
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        $this->db->where('role', 3);
        // if ($where != null) {
        $this->db->where('potensi_id', $potensi_id);
        // }
        return $this->db->get();
    }

    public function getWhereByAdmin($potensi_id)
    {
        $this->db->select('*');
        $this->db->from('potensi_user');
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        $this->db->where('role', 3);
        $this->db->where('potensi_id', $potensi_id);
        return $this->db->get();
    }

    public function getUsers($id)
    {
        $this->db->join('wilayah', 'wilayah.id_wilayah = user.wilayah');
        $this->db->where('id_user !=', $id);
        $this->db->order_by('role', 'ASC');
        return $this->db->get('user')->result_array();
    }

    public function get($table, $order ,  $where = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        $this->db->order_by($order, 'DESC');
        $sql = $this->db->get();
        return $sql;
    }

    public function getWilayahById($where)
    {
        // $tanggal = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('wilayah');
        $this->db->where('id_wilayah', $where);
        $query = $this->db->get();
        return $query;
    }

    public function get_max_id($table, $field, $where)
    {
        $this->db->select_max($field);
        $this->db->where($where);
        $sql = $this->db->get($table);
        return $sql;
    }

    public function get_group_id($table, $group_by)
    {
        $this->db->group_by($group_by);
        $this->db->order_by($group_by . " DESC");
        $sql = $this->db->get($table);
        return $sql;
    }
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function fetch_data($table, $field, $num, $offset)
    {
        empty($offset) ? $offset = 0 : $offset;

        $this->db->query("SET @no=" . $offset);
        $this->db->select('*,(@no:=@no+1) AS nomor');
        $this->db->group_by($field);
        $this->db->order_by($field, 'DESC');

        $data = $this->db->get($table, $num, $offset);

        return $data->result();
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }
}
