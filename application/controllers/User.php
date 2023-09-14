<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('User_M');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_not_login();
        check_admin();
        $data['judul_site'] = "MEY Undangan Digital";

        $data['row'] = $this->User_M->get();

        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        $user = new stdClass();
        $user->caten_pr = null;
        $user->caten_lk = null;
        $user->nm_anak = null;
        $user->address = null;
        $user->url_undangan = null;
        $data = [
            'page' => 'add',
            'judul_site' => "MEY Undangan Digital",
            'row' => $user
        ];
        $this->template->load('template', 'user/user_form_add', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->User_M->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan...');
                $data = alert_msg('success', '', 'Data Berhasil Disimpan...', 'user');
                $this->load->view('alert', $data);
            } else {
                $error = "Gagal Simpan Data!";
                $this->session->set_flashdata('error', $error);
                $data = alert_msg('error', '', 'Gagal Simpan Data!', 'user');
                $this->load->view('alert', $data);
            }
        } else if (isset($_POST['edit'])) {
            $this->User_M->edit($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah...');
                $data = alert_msg('success', '', 'Data Berhasil Diubah...', 'user');
                $this->load->view('alert', $data);
            } else {
                $error = "Gagal Mengubah Data!";
                $this->session->set_flashdata('error', $error);
                $data = alert_msg('error', '', 'Gagal Mengubah Data', 'user');
                $this->load->view('alert', $data);
            }
        }
    }

    public function delete($id)
    {
        $this->User_M->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus...');
            $data = alert_msg('success', '', 'Data Berhasil Dihapus...', 'user');
            $this->load->view('alert', $data);
        } else {
            $error = "Gagal Menghapus Data!";
            $this->session->set_flashdata('error', $error);
            $data = alert_msg('error', '', 'Gagal Menghapus Data!', 'user');
            $this->load->view('alert', $data);
        }
    }

    public function edit($id)
    {
        $data['judul_site'] = "MEY Undangan Digital";

        $query = $this->User_M->get($id);
        $data['row'] = $query->row();
        $this->template->load('template', 'user/user_form_edit', $data);
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user_login WHERE username='$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s ini sudah digunakan, silahkan ganti!');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
