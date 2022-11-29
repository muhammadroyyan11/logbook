<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function getPotensiById($id)
    {
        $this->db->select('*');
        $this->db->from('potensi_user');
        $this->db->where('user_id', $id);
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        return $this->db->get();
    }

    public function getPotensiAnggota($id)
    {
        $this->db->select('potensi_id, potensi.nama_potensi');
        $this->db->from('potensi_user');
        $this->db->where('user_id', $id);
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        return $this->db->get();
    }

    public function getGudepCount($wilayah, $potensi = null)
    {
        $this->db->select('*');
        $this->db->from('potensi_user');
        $this->db->join('user as u', 'u.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        $this->db->where($wilayah);
        if ($potensi != null) {
            $this->db->where($potensi);
        }
        return $this->db->get();
    }

    public function getPotensiId($id)
    {
        $this->db->select('potensi_id');
        $this->db->from('potensi_user');
        $this->db->where('user_id', $id);
        $this->db->join('user', 'user.id_user = potensi_user.user_id');
        $this->db->join('potensi', 'potensi.id_potensi = potensi_user.potensi_id');
        return $this->db->get();
    }

    public function deleteAll($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('potensi_user');
    }

    public function get($id = null)
    {
        $this->db->select('user.*, potensi_user.potensi_id, potensi.nama_potensi AS nama_potensi, wilayah.nama_wilayah');

        $this->db->join('potensi_user', 'user.id_user = potensi_user.user_id', 'left');

        $this->db->join('potensi', 'potensi_user.potensi_id = potensi.id_potensi', 'left');

        $this->db->join('wilayah', 'user.wilayah = wilayah.id_wilayah');

        if ($id != null) {
            $this->db->where('user.id_user', $id);
        }

        $this->db->order_by('user.id_user', 'desc');

        $this->db->group_by('user.id_user');

        return $this->db->get('user')->row();
    }

    public function getExport($id = null)
    {
        $this->db->select('user.*, potensi_user.potensi_id, potensi.nama_potensi AS nama_potensi');

        $this->db->join('potensi_user', 'user.id_user = potensi_user.user_id', 'left');

        $this->db->join('potensi', 'potensi_user.potensi_id = potensi.id_potensi', 'left');

        if ($id != null) {
            $this->db->where('user.id_user', $id);
        }

        $this->db->order_by('user.id_user', 'desc');

        $this->db->group_by('user.id_user');

        return $this->db->get('user')->result();
    }

    public function getExportWilayah($wilayah = null, $potensi = null)
    {
        $this->db->select('user.*, potensi_user.potensi_id, potensi.nama_potensi AS nama_potensi, wilayah.nama_wilayah');

        $this->db->join('potensi_user', 'user.id_user = potensi_user.user_id', 'left');

        $this->db->join('wilayah', 'user.wilayah = wilayah.id_wilayah', 'left');

        $this->db->join('potensi', 'potensi_user.potensi_id = potensi.id_potensi', 'left');

        if ($wilayah != null ) {
            $this->db->where('user.wilayah', $wilayah);
        }
        
        if ($potensi != null ) {

        $this->db->where('potensi.id_potensi', $potensi);

        }

        $this->db->order_by('user.id_user', 'desc');

        $this->db->order_by('user.wilayah', 'desc');

        $this->db->group_by('user.id_user');

        return $this->db->get('user')->result();
    }

    public function getById($id)
    {
        $this->db->select('*');

        $this->db->from('user');

        $this->db->where('anggota_id', $id);

        $this->db->join('anggota', 'anggota.id_anggota = user.anggota_id');

        $this->db->join('wilayah', 'wilayah.id_wilayah = user.wilayah');

        return $this->db->get();
    }

    public function getByIdAdmin($id)
    {
        $this->db->select('*');

        $this->db->from('user');

        $this->db->where('id_user', $id);

        $this->db->join('anggota', 'anggota.id_anggota = user.anggota_id');

        $this->db->join('wilayah', 'wilayah.id_wilayah = user.wilayah');

        return $this->db->get();
    }

    public function update($post)
    {
        $params = [
            'nama' => $post['nama_anggota'],
            'email' => $post['email'],
            'no_telp' => $post['no_hp'],
        ];

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);

        $paramsDua = [
            'nama_anggota' => $post['nama_anggota'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'jenis_kelamin' => $post['jenis_kelamin']
        ];

        $this->db->where('id_anggota', $post['id_anggota']);
        $this->db->update('anggota', $paramsDua);
    }

    public function updateGudep($post)
    {
        $params = [
            'no_sk' => $post['no_sk'],
            'no_gudep' => $post['no_gudep'],
            'pangkalan' => $post['pangkalan'],
            'golongan' => $post['golongan'],
            'tingkatan_gudep' => $post['tingkatan_gudep'],
            'tingkatan_saka' => $post['tingkatan_saka'],
            'penghargaan' => $post['penghargaan'],
            'kursus_pembina' => $post['kursus'],
            'jabatan' => $post['jabatan'],
        ];

        $this->db->where('id_anggota', $post['id_anggota']);
        $this->db->update('anggota', $params);
    }

    public function foto($post)
    {
        $params = [
            'foto' => $post['foto']
        ];

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }
}
