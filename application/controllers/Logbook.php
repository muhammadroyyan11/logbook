<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logbook extends CI_Controller
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
        $log = $this->logbook->get_by_user(userdata('id_user'))->result();
        $logbook = $this->logbook->get(userdata('kode_pk'))->result();
        
        // var_dump($log);
        $data = array(
            'title' => 'Isi Logbook',
            'log'   => $log,
            'logbook' => $logbook
        );
        $this->template->load('template', 'logbook/data', $data);
    }

    public function detail($id)
    {   
        $getId = $this->base->get('logbook', NULL, ['id_log' => $id])->row();
        $data = array(
            'title'     => 'Detail Logbook',
            'row'       => $getId
        );
        $this->template->load('template', 'logbook/detail', $data);
    }

    public function pilih($id)
    {
        $logbook = $this->logbook->get_row($id)->row();

        $params = [
            'user' => userdata('id_user'),
            'logbook' => $id,
            'metode'  => 'Silahkan dipilih',
            'date'    => date('Y-m-d'),
            'status'  => 1,
            'ruang'   => userdata('dept')  
        ];

        $this->logbook->insert('pilihan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Berhasil memilih log');
            redirect('Logbook');
        } else {
            set_pesan('Pemilihan Log gagal, Silahkan coba lagi', FALSE);
            redirect('Logbook');
        }
    }

    public function add()
    {
        //Batas
        $this->form_validation->set_rules('kompetensi', 'Kompetensi', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[logbook.kode]');
        $this->form_validation->set_rules('kewenangan', 'Kewenangan', 'required');
        $this->form_validation->set_rules('metode', 'Metode', 'required');

        $this->form_validation->set_message('is_unique', '%s sudah ada, mohon menggunakan kode yang berbeda');

        $getPk = $this->base->get('kode', null, ['id_kode' => userdata('kode_pk')])->row();

        //GENERATE PK_NUMBER
        $kode_tambah = $getPk->value;
        $kode_number = $getPk->number;
        $kode_number++;
        $newKode = str_pad($kode_number, 3, '0', STR_PAD_LEFT);
        $number = $kode_tambah . $newKode;

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title'     => 'Tambah Log baru',
                'generate'  => $number
            );

            $this->template->load('template', 'logbook/add', $data);
        } else {
            $post = $this->input->post(null, TRUE);

            $log = [
                'kompetensi'    => $post['kompetensi'],
                'user_id'       => userdata('id_user'),
                'kode'          => $post['kode'],
                'kewenangan'    => $post['kewenangan'],
                'metode'        => $post['metode'],
                'status'        => 1,
                'date'          => date('Y-m-d')
            ];
            $this->logbook->insert('logbook', $log);

            //Proses update PK NUMBER
            $updateKode = $kode_number++;
            +'1';
            $kode = str_pad($updateKode, 3, '0', STR_PAD_LEFT);
            // var_dump($kode);

            if ($this->db->affected_rows() > 0) {
                $params = [
                    'number'    => $kode
                ];
                $this->logbook->update_kode($params);

                set_pesan('Data berhasil disimpan');
                redirect('Logbook');
            } else {
                set_pesan('Data gagal disimpan, Silahkan isi data kembali', FALSE);
                redirect('logbook/add');
            }
        }
    }

    public function verify($id)
    {
        $params = [
            'status' => 2
        ];
        $this->db->where('id_pilih', $id);
        $this->db->update('pilihan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil diverifikasi');
            redirect('VerifyLog');
        } else {
            set_pesan('Terjadi kesalahan saat verifikasi logbook', false);
            redirect('VerifyLog');
        }
    }

    public function cancel($id)
    {
        $params = [
            'status' => 1
        ];
        $this->db->where('id_pilih', $id);
        $this->db->update('pilihan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Cancel verifikasi berhasil');
            redirect('VerifyLog');
        } else {
            set_pesan('Terjadi kesalahan saat cancel verifikasi logbook', false);
            redirect('VerifyLog');
        }   
    }

    public function changeM($id)
    {
        $params = [
            'metode' => 'Mandiri'
        ];
        $this->db->where('id_pilih', $id);
        $this->db->update('pilihan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Berhasil mengupdate logbook');
            redirect('Logbook');
        } else {
            set_pesan('Terjadi kesalahan mengubah data', false);
            redirect('Logbook');
        }
    }

    public function changeS($id)
    {
        $params = [
            'metode' => 'Supervisi'
        ];
        $this->db->where('id_pilih', $id);
        $this->db->update('pilihan', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Berhasil mengupdate logbook');
            redirect('Logbook');
        } else {
            set_pesan('Terjadi kesalahan mengubah data', false);
            redirect('Logbook');
        }
    }
}
