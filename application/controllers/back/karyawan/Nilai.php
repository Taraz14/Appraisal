<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->load->model('M_users');
			$this->load->model(array('karyawan/M_nilai', 'karyawan/M_nilai_detail'));
	}

	public function index(){
		$id_user = $this->session->userdata('id_user');
        $department = $this->session->userdata('department');

        $perCheck = $this->M_nilai_detail->periode();
        foreach ($perCheck as $per) {
        	$row = ['periode' => $per->periode];
        }

        $periode = $this->session->set_userdata($row);

        $data = [
	        	'header'	=>  'level/karyawan/layout/header_karyawan',
				'sidenav'	=>	'level/karyawan/layout/sidenav_karyawan',
				'content'	=>	'level/karyawan/pages/v_tampil_karyawan',
				'profile'	=>  $this->M_users->profile($id_user),
				'count_all' =>	$this->_count_all(),
				'periode'	=>	$this->_get_periode()
		];
		$this->load->view('layout/layout', $data, FALSE);

	}

	private function _count_all(){
		return $this->M_nilai->count_all();
	}

	private function _det_count_all(){
		return $this->M_nilai_detail->count_all();
	}

	private function _get_periode(){
		return $this->M_nilai->periode();
	}
	
	private function _det_get_periode(){
		return $this->M_nilai_detail->periode();
	}

	public function datatable(){
		$data = $this->M_nilai->get_dataTables();
		$jsonOutput = [];
		foreach ($data as $val) {
			$tempArray = [];
			$tempArray[] = htmlspecialchars($val->id_user, ENT_QUOTES, 'UTF-8');
			$tempArray[] = '<a class="a" data-toggle="modal" data-target="#detail_nilai">'.htmlspecialchars($val->name_user, ENT_QUOTES, 'UTF-8').'</a>';
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

	public function detail_datatable(){
		$id_user = $this->session->userdata('id_user');
		$data = $this->M_nilai_detail->get_datatables($id_user);
		$jsonOutput = [];
		foreach ($data as $val) {
			$tempArray = [];
			$tempArray[] = htmlspecialchars($val->judul_aspek, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->aspek, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->detail_aspek, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->tahun_periode, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->periode, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->nilai, ENT_QUOTES, 'UTF-8');
			$tempArray[] = htmlspecialchars($val->tanggal_penilaian, ENT_QUOTES, 'UTF-8');

			array_push($jsonOutput, $tempArray);
		}

		$output['draw']			   = intval($this->input->get('draw'));
		$output['recordsTotal']    = $this->M_nilai_detail->fetch_count();
		$output['recordsFiltered'] = $this->M_nilai_detail->filter($id_user);
		$output['data']			   = $jsonOutput;
		
		echo json_encode($output);
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/back/karyawan/Nilai.php */