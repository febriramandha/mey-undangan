<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_M extends CI_Model
{
    public function mhs_list()
    {
        $this->db->from('agam_mhs');
        $this->db->order_by('nim', 'ASC');
        return $this->db->get()->result();
    }

    function simpan_mahasiswa($nim, $nama, $jurusan)
    {
        $hasil = $this->db->query("INSERT INTO agam_mhs (nim,nama,jurusan)VALUES('$nim','$nama','$jurusan')");
        return $hasil;
    }

    function get_mhs_by_nim($nim)
    {
        $hsl = $this->db->query("SELECT * FROM agam_mhs WHERE nim='$nim'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'nim' => $data->nim,
                    'nama' => $data->nama,
                    'jurusan' => $data->jurusan,
                );
            }
        }
        return $hasil;
    }

    function update_mahasiswa($nim, $nama, $jurusan)
    {
        $hasil = $this->db->query("UPDATE agam_mhs SET nama='$nama',jurusan='$jurusan' WHERE nim='$nim'");
        return $hasil;
    }

    function hapus_mahasiswa($nim)
    {
        $hasil = $this->db->query("DELETE FROM agam_mhs WHERE nim='$nim'");
        return $hasil;
    }
}
