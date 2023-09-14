<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ucapan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Ucapan_M');
    }

    public function index()
    {
        $data['judul_site'] = "MEY Undangan Digital";
        $caten = $this->fungsi->user_login()->name;
        $data['row'] = $this->Ucapan_M->get($caten);
        $this->template->load('template', 'ucapan/ucapan_data', $data);
    }

    // public function add()
    // {
    //     $invite = new stdClass();
    //     $invite->caten = null;
    //     $invite->url_invite = null;
    //     $invite->nm_invite = null;
    //     $invite->url_invite = null;
    //     $data = [
    //         'page' => 'add',
    //         'judul_site' => "MEY Undangan Digital",
    //         'row' => $invite
    //     ];
    //     $this->template->load('template', 'invite/invite_form', $data);
    // }

    // public function process()
    // {
    //     $post = $this->input->post(null, TRUE);
    //     if (isset($_POST['add'])) {
    //         $this->Ucapan_M->add($post);
    //     } else if (isset($_POST['edit'])) {
    //         $this->Ucapan_M->edit($post);
    //     }

    //     if ($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan...');
    //     }
    //     redirect('invite');
    // }

    // public function delete($id)
    // {
    //     $this->Ucapan_M->del($id);
    //     if ($this->db->affected_rows() > 0) {
    //         $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus...');
    //     }
    //     redirect('invite');
    // }
}
