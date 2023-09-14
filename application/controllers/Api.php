<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        // $this->load->model('ucapan_m');
    }

    public function index()
    {
        $data['judul_site'] = "MEY Undangan Digital";

        // $readAPI = file_get_contents('https://kodepos-2d475.firebaseio.com/kota_kab/k425.json?print=pretty');
        // $data['kabkopos'] = json_decode($readAPI, true);

        $readAPIProv = file_get_contents('https://ibnux.github.io/data-indonesia/provinsi.json');
        $data['prov'] = json_decode($readAPIProv, true);

        // $this->template->load('template', 'api/index', $data);
        $this->template->load('template', 'api/prov', $data);

        // echo "<pre>";
        // print_r($data);

        // return $data;

    }
}
