<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invite extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Invite_M');
    }

    public function index()
    {
        $data['judul_site'] = "MEY Undangan Digital";
        $caten = $this->fungsi->user_login()->name;
        $data['row'] = $this->Invite_M->get($caten);

        $this->template->load('template', 'invite/invite_data', $data);
    }

    public function add()
    {
        $invite = new stdClass();
        $invite->caten = null;
        $invite->url_invite = null;
        $invite->nm_invite = null;
        $invite->url_invite = null;
        $data = [
            'page' => 'add',
            'judul_site' => "MEY Undangan Digital",
            'row' => $invite,
            'share' => include('invite_share.php')
        ];
        $this->template->load('template', 'invite/invite_form', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->Invite_M->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan...');
                $data = alert_msg('success', '', 'Data Berhasil Disimpan...', 'invite');
                $this->load->view('alert', $data);
            } else {
                $error = "Gagal Simpan Data!";
                $this->session->set_flashdata('error', $error);
                $data = alert_msg('error', '', 'Gagal Simpan Data!', 'invite');
                $this->load->view('alert', $data);
            }
        }
    }

    public function delete($id)
    {
        $this->Invite_M->del($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus...');
            $data = alert_msg('success', '', 'Data Berhasil Dihapus...', 'invite');
            $this->load->view('alert', $data);
        } else {
            $error = "Gagal Menghapus Data!";
            $this->session->set_flashdata('error', $error);
            $data = alert_msg('error', '', 'Gagal Menghapus Data!', 'invite');
            $this->load->view('alert', $data);
        }
    }
}
