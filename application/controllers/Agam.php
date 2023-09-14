<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agam extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Mahasiswa_M');
    }

    public function index()
    {
        $data['judul_site'] = "MEY Undangan Digital";
        $this->template->load('template', 'agam/index', $data);
    }

    public function mhs()
    {
        $data['judul_site'] = "Mahasiswa Agam";
        $this->template->load('template', 'agam/mhs', $data);
    }

    // CRUD Ajax
    function data_mahasiswa()
    {
        $data = $this->Mahasiswa_M->mhs_list();
        echo json_encode($data);
    }

    function get_mahasiswa()
    {
        $nim = $this->input->get('nim');
        $data = $this->Mahasiswa_M->get_mhs_by_nim($nim);
        echo json_encode($data);
    }

    function simpan_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $data = $this->Mahasiswa_M->simpan_mahasiswa($nim, $nama, $jurusan);
        echo json_encode($data);
    }

    function update_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $data = $this->Mahasiswa_M->update_mahasiswa($nim, $nama, $jurusan);
        echo json_encode($data);
    }

    function hapus_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $data = $this->Mahasiswa_M->hapus_mahasiswa($nim);
        echo json_encode($data);
    }
}
