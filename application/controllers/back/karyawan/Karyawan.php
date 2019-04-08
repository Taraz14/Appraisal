<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model(array('M_users','karyawan/M_project','karyawan/M_karyawan'));
	}

	public function index(){
		$id_user = $this->session->userdata('id_user');
		$data = [
			'header'	=> 'level/karyawan/layout/header_karyawan',
			'sidenav'	=> 'level/karyawan/layout/sidenav_karyawan',
			'content' 	=> 'level/karyawan/pages/v_dashboard',
			'profile'	=> $this->M_users->profile($id_user)
		];
		$this->load->view('layout/layout', $data, FALSE);		
	}

	public function keterlibatan_proj(){
		$id_user = $this->session->userdata('id_user');
		$data = [
			'header'	=> 'level/karyawan/layout/header_karyawan',
			'sidenav'	=> 'level/karyawan/layout/sidenav_karyawan',
			'content' 	=> 'level/karyawan/pages/v_keterlibatan_proj',
			'profile'	=>	$this->M_users->profile($id_user),
			'proj'		=>	$this->M_project->proj($id_user),
			'app' 		=>  $this->M_karyawan->get_appraisal_join($id_user)
		];
		$this->load->view('layout/layout', $data, FALSE);	
	}

	public function pass_change(){
		$id_user = $this->session->userdata('id_user');

		$data = [
			'header'	=> 'level/karyawan/layout/header_karyawan',
			'sidenav'	=> 'level/karyawan/layout/sidenav_karyawan',
			'content' => 'level/karyawan/pages/v_ubah_pass',
			'profile'	=> $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data, FALSE);
	}

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/back/karyawan/Karyawan.php */