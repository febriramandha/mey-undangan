<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		check_not_login();
		$data['judul_site'] = "MEY Undangan Digital";
		$this->template->load('template', 'dashboard', $data);
	}
}
