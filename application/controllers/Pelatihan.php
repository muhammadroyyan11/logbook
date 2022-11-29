<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan extends CI_Controller
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
        $pelatihan = $this->base->get('pelatihan', 'id_pelatihan')->result();
        $data = array(
            'title'     => 'Pelatihan',
            'pelatihan' => $pelatihan
        );
        $this->template->load('template', 'pelatihan/data', $data);
    }
}
