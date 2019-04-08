<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('manager/M_manager');
		$this->load->model('manager/M_project');
		$this->load->model(array('M_users', 'manager/M_nilai'));
	}
	
	public function index(){
        $id_user = $this->session->userdata('id_user');
        $department = $this->session->userdata('department');

        $data = [
				'header'	=> 'level/manager/layout/header_manager',
				'sidenav'	=>	'level/manager/layout/sidenav_manager',
				'content'	=>	'level/manager/pages/v_tampil_karyawan',
				'profile'	=>  $this->M_users->profile($id_user),
				'count_all' =>	$this->_count_all(),
				'periode'	=>	$this->_get_periode()
		];

		$this->load->view('layout/layout', $data);
	}

	private function _count_all(){
		return $this->M_nilai->count_all();
	}

	private function _get_periode(){
		return $this->M_nilai->periode();
	}

	public function datatable(){
		$data = $this->M_nilai->get_dataTables();
		$jsonOutput = [];
		foreach ($data as $val) {
			$tempArray = [];
			$tempArray[] = htmlspecialchars($val->id_user, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->name_user, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->department, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->tanggal_penilaian, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->periode, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->total_skor, ENT_QUOTES, 'UTF-8');
			$tempArray[] = '<button class="btn btn-danger" name="nilai_delete"><i class="fa fa-trash"></i></button>';

			array_push($jsonOutput, $tempArray);			
		}

		$output['draw']				= intval($this->input->get('draw'));
		$output['recordsTotal']		= $this->M_nilai->fetch_count();
		$output['recordsFiltered']	= $this->M_nilai->filter();
		$output['data']				= $jsonOutput;

		echo json_encode($output);
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/back/manager/Nilai.php */