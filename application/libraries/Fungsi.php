<?php

class Fungsi
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function count_gudep()
    {
        $this->ci->load->model('anggota_model', 'anggota');

        $wilayah = array('wilayah' => userdata('wilayah'));
        $potensi = array('potensi_id' => 1);

        return $this->ci->anggota->getGudepCount($wilayah, $potensi)->num_rows();
    }

    public function count_saka()
    {
        $this->ci->load->model('anggota_model', 'anggota');

        $wilayah = array('wilayah' => userdata('wilayah'));
        $potensi = array('potensi_id' => 2);

        return $this->ci->anggota->getGudepCount($wilayah, $potensi)->num_rows();
    }

    public function count_anggota()
    {
        $this->ci->load->model('base_model', 'base');

        return $this->ci->base->getAnggota(userdata('wilayah'))->num_rows();
    }

    public function count_laporan()
    {
        $this->ci->load->model('laporan_model', 'laporan');

        $where = array('user_id' => userdata('id_user'));

        return $this->ci->laporan->get($where)->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('users_m', 'user');
        return $this->ci->user->getCount()->num_rows();
    }

    public function count_perumahan()
    {
        $this->ci->load->model('detail_m');
        return $this->ci->detail_m->get()->num_rows();
    }

    public function count_jenis()
    {
        $this->ci->load->model('jenisPerumahan_m', 'jenis');
        return $this->ci->jenis->get()->num_rows();
    }

    public function count_antriantotal()
    {
        $this->ci->load->model('antrianloket_m');
        return $this->ci->antrianloket_m->getAll()->num_rows();
    }

    function user_login()
    {
        $this->ci->load->model('users_m');
        $user_id = $this->ci->session->userdata('id_user');
        $user_data = $this->ci->users_m->getCount($user_id)->row();
        return $user_data;
    }

    // public function count_item()
    // {
    //     $this->ci->load->model('item_m');
    //     return $this->ci->item_m->get()->num_rows();
    // }
    // public function count_supplier()
    // {
    //     $this->ci->load->model('supplier_m');
    //     return $this->ci->supplier_m->get()->num_rows();
    // }
    // public function count_member()
    // {
    //     $this->ci->load->model('member_m');
    //     return $this->ci->member_m->get()->num_rows();
    // }
    // public function count_user()
    // {
    //     $this->ci->load->model('user_m');
    //     return $this->ci->user_m->get()->num_rows();
    // }
}
