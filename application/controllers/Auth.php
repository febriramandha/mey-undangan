<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        check_already_login();
        $data['judul_site'] = "MEY Undangan Digital";
        $this->load->view('login', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('User_M');
            $query = $this->User_M->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);

                $data = alert_msg('success', 'Selamat..', 'Anda Berhasil Login!', 'dashboard');
                $this->load->view('alert', $data);
            } else {
                $data = alert_msg('error', 'Oops...', 'Maaf Login Gagal, username / password Salah!', 'auth/login');
                $this->load->view('alert', $data);
            }
        }
    }

    public function logout()
    {
        $params = ['userid', 'level'];
        $this->session->unset_userdata($params);
        $data = alert_msg('success', 'Terima Kasih..', 'Anda Berhasil Keluar Aplikasi!', 'auth/login');
        $this->load->view('alert', $data);
    }
}
