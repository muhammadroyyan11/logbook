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
        $this->load->model('Pelatihan_model', 'pelatihan');
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

    public function add()
    {
        $data = array(
            'title'     => 'Tambah riwayat pelatihan'
        );

        $this->template->load('template', 'pelatihan/add', $data);
    }

    public function proses()
    {
        $post = $this->input->post(NULL, TRUE);

        $config['upload_path']          = './assets/upload/sertifikat/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['max_size']             = 5000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = userdata('nama'). '-' . slugify($post['nama']) . '-' .date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sertif')) {
            $post['sertif'] = $this->upload->data('file_name');
            $this->pelatihan->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Data Berhasil Dismpan');
            }
            redirect('Pelatihan');
        } else {
            set_pesan('Terjadi kesalahan saat mengupload data', false);
            redirect('Pelatihan');
        }
    }

    public function delete($id)
    {
        $this->base_model->del('pelatihan', ['id_pelatihan' => $id]);
        if ($this->db->affected_rows() > 0) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('Pelatihan');
    }
}
