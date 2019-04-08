<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pnc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');
		$this->load->library('session');
	}

	public function index(){
		$id_user = $this->session->userdata('id_user');
		$data = [
			'header'	=> 'level/pnc/layout/header_pnc',
			'sidenav'	=> 'level/pnc/layout/sidenav_pnc',
			'content' 	=> 'level/pnc/pages/v_dashboard',
			'profile'	=>  $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data, FALSE);
	}

	public function mansesi(){
		$id_user = $this->session->userdata('id_user');

		$data = [
			'header'	=> 'level/pnc/layout/header_pnc',
			'sidenav'	=> 'level/pnc/layout/sidenav_pnc',
			'content' 	=> 'level/pnc/pages/v_mansesi',
			'profile'	=>  $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data, FALSE);
	}

	public function pass_change(){
		$id_user = $this->session->userdata('id_user');

		$data = [
			'header'	=> 'level/pnc/layout/header_pnc',
			'sidenav'	=> 'level/pnc/layout/sidenav_pnc',
			'content' 	=> 'level/pnc/pages/v_ubah_pass',
			'profile'	=>  $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data, FALSE);
	}

}

/* End of file Pnc.php */
/* Location: ./application/controllers/back/pnc/Pnc.php */