<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerifyLog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
        $this->load->model('Logbook_model', 'logbook');
    }

    public function index()
    {
        $log = $this->logbook->get_by_kepala(userdata('dept'))->result();
        $data = array(
            'title' => 'Verifikasi Logbook',
            'log'   => $log
        );
        $this->template->load('template', 'logbook/data', $data);
    }
}
