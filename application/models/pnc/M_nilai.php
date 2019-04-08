<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {

	protected static $appraisal_table = "appraisal";
	protected static $score_table = "skor";

	protected $select_column_score = [
		'skor.id_skor',
		'skor.id_user',
		'skor.tanggal_penilaian',
		'skor.periode',
		'skor.total_skor',
		'users.name_user',
		'users.department'
	];

	protected $order_column = [
		'users.name_user',
		'users.department',
		'skor.tanggal_penilaian',
		'skor.periode',
		// 'skor.total_skor'
	];

	protected function nilai_setting(){
        $id_user = $this->session->userdata('id_user');
        $department = $this->session->userdata('department');

		$this->db->select($this->select_column_score)
				 ->from(self::$score_table)
				 ->join('users', 'users.id_user = '.self::$score_table.'.id_user');
			// $this->db->where('users.department', 'produksi');

		if($this->input->get('periode')) 
		{
			$where = "periode = '".($this->input->get('periode'))."'";
			$this->db->where($where);
		}

		// if($this->input->get('tahun')) 
		// {
		// 	$where = "tahun_periode = '".($this->input->get('tahun'))."'";
		// 	$this->db->where($where);
		// }

		if($this->input->get('department')) 
		{
			$where = "users.department = '".($this->input->get('department'))."'";
			$this->db->where($where);
		}

		if(isset($_GET['order'])) {
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
		}

		else{
			$this->db->order_by(self::$score_table.'.tanggal_penilaian', 'desc');
		}
	}

	public function get_dataTables(){
		$this->nilai_setting();
		if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'), $this->input->get('start'));
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all(){
		return $this->db->get(self::$score_table)->num_rows();
	}

	public function fetch_count(){
		$this->db->select('*');
		$this->db->from(self::$score_table);
		$query = $this->db->get();
		return $this->db->count_all_results();
	}

	public function filter(){
		$this->nilai_setting();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function periode(){
		$this->db->select('periode');
		$this->db->from(self::$score_table);
		$this->db->group_by('periode');
		return $this->db->get()->result();
	}

	public function tahun(){
		$this->db->select('tahun_periode');
		$this->db->from(self::$appraisal_table);
		$this->db->group_by('tahun_periode');
		return $this->db->get()->result();
	}

	public function depart(){
		$this->db->select('users.department')
				 ->from(self::$score_table)
				 ->join('users', 'users.id_user = '.self::$score_table.'.id_user')
				 ->group_by('users.department');
		return $this->db->get()->result();
	}

}

/* End of file M_nilai.php */
/* Location: ./application/models/karyawan/M_nilai.php */