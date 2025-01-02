<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'resfresh');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'page'  => 'dashboard'
		];

		$this->load->view('index', $data);
	}
}

/* End of file Dashboard.php */
