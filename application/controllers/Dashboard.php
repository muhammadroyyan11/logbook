<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        
    }

    public function index()
    {
        $pk    = $this->base->get('kode')->result();
        $data = array(
            'title' => 'Dashboard',
            'pk'    => $pk
        );
        $this->template->load('template', 'dashboard/dashboard', $data);
    }

    public function pilih()
    {
        $post = $this->input->post(NULL, TRUE);

        $params = [
            'kode_pk' => $post['pilih']
        ];

        $this->base->edit('user', $params, ['id_user' => userdata('id_user')]);
        
        if ($this->db->affected_rows() > 0) {
            set_pesan('Pemilihan PK Berhasil');
            redirect('dashboard');
        }
    }
}
