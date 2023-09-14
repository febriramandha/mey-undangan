<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ucapan_M extends CI_Model
{
    public function get($caten)
    {
        $this->db->from('ucapan');
        $this->db->where('caten', $caten);
        $query = $this->db->get();
        return $query;
    }
}
