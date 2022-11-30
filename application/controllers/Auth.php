<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Base_model', 'base');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('tempauth', 'auth/auth', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $data['pk']    = $this->base->get('kode')->result();
            $this->template->load('tempauth', 'auth/register', $data);
        } else {
            $input = $this->input->post(null, true);

            $getKode = substr($input['nip'], 0, -3);

            if ($getKode == '01') {
                $params = [
                    'nama'      => $input['nama'],
                    'email'     => $input['email'],
                    'password'  => password_hash($input['password'], PASSWORD_DEFAULT),
                    'role'      => 1,
                    'is_active' => 1,
                    'kode_pk'   => NULL,
                    'nip'       => $input['nip'],
                    'foto'      => 'user.png',
                    'username'  => $input['username'],
                    'tanggal_lahir'       => $input['ttl']
                ];
            } else {
                $params = [
                    'nama'      => $input['nama'],
                    'email'     => $input['email'],
                    'password'  => password_hash($input['password'], PASSWORD_DEFAULT),
                    'role'      => 2,
                    'is_active' => 1,
                    'kode_pk'   => $input['pilih'],
                    'nip'       => $input['nip'],
                    'foto'      => 'user.png',
                    'username'  => $input['username'],
                    'tanggal_lahir'       => $input['ttl']
                ];
            }
            $this->base->insert('user', $params);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Pendaftaran berhasil, Silahkan Login');
                redirect('auth');
            } else {
                set_pesan('Pendaftaran Gagal', FALSE);
            }
        }
    }
}
