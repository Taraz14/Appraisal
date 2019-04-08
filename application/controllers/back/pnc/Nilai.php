<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('M_users');
			$this->load->model('pnc/M_nilai');
	}

	public function index(){
		$id_user = $this->session->userdata('id_user');
        $department = $this->session->userdata('department');

        $data = [
				'header'	=> 'level/pnc/layout/header_pnc',
				'sidenav'	=> 'level/pnc/layout/sidenav_pnc',
				'content' 	=> 'level/pnc/pages/v_tampil_karyawan',
				'profile'	=>  $this->M_users->profile($id_user),
				'count_all' =>	$this->_count_all(),
				'periode'	=>	$this->_get_periode(),
				'tahun'		=>	$this->_get_tahun(),
				'depart'	=>	$this->_get_depart()
		];
		$this->load->view('layout/layout', $data, FALSE);
	}

	private function _count_all(){
		return $this->M_nilai->count_all();
	}

	private function _get_periode(){
		return $this->M_nilai->periode();
	}

	private function _get_tahun(){
		return $this->M_nilai->tahun();
	}

	private function _get_depart(){
		return $this->M_nilai->depart();
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
			// $tempArray[] = '<button class="btn btn-danger" name="nilai_delete"><i class="fa fa-trash"></i></button>';

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
/* Location: ./application/controllers/back/pnc/Nilai.php */