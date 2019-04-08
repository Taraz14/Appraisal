<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('manager/M_manager');
		$this->load->model('manager/M_project');
		$this->load->model(array('M_users', 'manager/M_nilai'));
	}

	public function index()
	{
		$id_user = $this->session->userdata('id_user');
		$data = [
			'header'	=> 'level/manager/layout/header_manager',
			'sidenav'	=> 'level/manager/layout/sidenav_manager',
			'content' => 'level/manager/pages/v_dashboard',
			'profile'	=> $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data, FALSE);
	}

	public function form_penilaian(){
		$id_user = $this->session->userdata('id_user');

		$data = [
				'header'	=> 'level/manager/layout/header_manager',
				'sidenav'	=>	'level/manager/layout/sidenav_manager',
				'content'	=>	'level/manager/pages/v_form_penilaian',
				'name_user'	=>	$this->M_manager->get_name_user(),
				'penilai'	=>	$this->M_manager->get_name_penilai($id_user),
				'profile'	=>  $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data);
	}

	public function input_penilaian(){
		$nama_karyawan 	= $this->input->post('nama_karyawan');
		$startmonth 	= $this->input->post('startmonth');
		$endmonth 		= $this->input->post('endmonth');
		$tgl_nilai		= date('d-m-Y');
		$thn			= date('Y');
		$time 			= time();

		$user_data = $this->db->get_where('users', array('id_user'=> $nama_karyawan));
        foreach ($user_data->result() as $u) {
            $nama = $u->name_user;
            $id_u = $u->id_user;
        }

		$start_end_month = $startmonth.'-'.$endmonth;
		
		$id_user = $this->session->userdata('id_user');

		$data = [
				'header'	=> 'level/manager/layout/header_manager',
				'sidenav'	=>	'level/manager/layout/sidenav_manager',
				'content'	=>	'level/manager/pages/v_input_penilaian',
				'periode'	=>  $start_end_month,
				'id_kar'	=> $id_u,
				'nama_karyawan' => $nama,
				'penilai'	=>	$this->M_manager->get_name_penilai($id_user),
				'aspek'		=> $this->M_manager->get_aspek(),
				'aspek_isi'		=> $this->M_manager->get_aspek_isi(),
				'profile'	=> $this->M_users->profile($id_user)

		];
		$this->load->view('layout/layout', $data);
	}

	public function push_nilai(){
		$nama_karyawan 	= $this->input->post('kar');
		$periode 	= $this->input->post('per');
		$tgl_nilai		= date('Y-m-d');
		$thn			= date('Y');
		$time 			= time();

		$user_data = $this->db->get_where('users', array('id_user'=> $nama_karyawan));
        foreach ($user_data->result() as $u) {
            $nama = $u->name_user;
            $id_u = $u->id_user;
        }

		$id_user = $this->input->post('id_u');

		$jum_aspek = $this->M_manager->get_aspek_isi();
        $bobot1 = 10;
        $bobot2 = 15;
		$data_nilai = [];
		foreach ($jum_aspek as $index => $val) {
			$rbx = $this->input->post('rb_nilai'.$val->asid);

			array_push($data_nilai, array(
					'id_aspek' => $val->asid,
                    'id_user' => $id_user,
                    'tahun_periode' => $thn,
                    'periode' => $periode,
                    'nilai' => $rbx,
                    'tanggal_penilaian' => $tgl_nilai,
                    'time' => $time
                )

			);
		}

		$totsum1 = 0;
        for ($bob1 = 1; $bob1 < 8; $bob1++) {
            $rbval1 = $this->input->post('rb_nilai'.$bob1);
            $jml1 = $rbval1*$bobot1;            
            $totsum1 += $jml1;
        }
        $totsum2 = 0;    
        for ($bob2 = 8; $bob2 < 10; $bob2++) {
            $rbval2 = $this->input->post('rb_nilai'.$bob2);
            $jml2 = $rbval2*$bobot2;            
            $totsum2 += $jml2;
        }

        $subtot = ($totsum1+$totsum2);
        $total = $subtot/4;

        $data_score = [
        	'id_user' => $id_user,
        	'tanggal_penilaian' => $tgl_nilai,
        	'periode' => $periode,
        	'total_skor' => $total
        ];

        $this->M_manager->total_score_insert($data_score);
        $this->M_manager->insert_nilai($data_nilai);
        redirect('fp','refresh');
	}

    public function keterlibatan_proj(){

        $id_user = $this->session->userdata('id_user');

        $data = [
				'header'	=> 'level/manager/layout/header_manager',
				'sidenav'	=>	'level/manager/layout/sidenav_manager',
				'content'	=>	'level/manager/pages/v_keterlibatan_proj',
				'profile'	=>	$this->M_users->profile($id_user),
				'proj'		=>	$this->M_project->proj($id_user),
				'app' =>  $this->M_manager->get_appraisal_join($id_user)
		];
		$this->load->view('layout/layout', $data);
    }

	public function pass_change(){
	    $id_user = $this->session->userdata('id_user');

		$data = [
			'header'	=> 'level/manager/layout/header_manager',
			'sidenav'	=> 'level/manager/layout/sidenav_manager',
			'content' => 'level/manager/pages/v_ubah_pass',
			'profile'	=> $this->M_users->profile($id_user)
		];
		$this->load->view('layout/layout', $data, FALSE);
	}
}

/* End of file Manager.php */
/* Location: ./application/controllers/back/manager/Manager.php */