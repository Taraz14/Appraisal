<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {

	protected static $appraisal_table = "appraisal";
	protected static $score_table = "skor";

	protected $select_column = [
		'appraisal.id_appraisal',
		'appraisal.id_user',
		'appraisal.tanggal_penilaian',
		'appraisal.periode',
		'users.id_user',
		'users.name_user',
		'users.department',
		'skor.id_skor',
		'skor.id_user',
		'skor.total_skor'
	];

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
        $department = $this->session->userdata('department');

        $id_aspek = 1;
		$this->db->select($this->select_column_score)
				 ->from(self::$score_table)
				 ->join('users', 'users.id_user = '.self::$score_table.'.id_user');
		$where = "users.department = '".$department."'";
		$this->db->where($where);

		if($_GET['search']['value']){
			$this->db->like('skor.periode', $_GET['search']['value'])
					 ->or_like('skor.tanggal_penilaian', $_GET['search']['value'])
					 ->or_like('users.name_user', $_GET['search']['value'])
					 ->or_like('users.department', $_GET['search']['value'])
					 ->or_like('skor.total_skor', $_GET['search']['value']);
		}

		if($this->input->get('periode')) 
		{
			$where = "periode = '".($this->input->get('periode'))."'";
			$this->db->where( $where );
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
}

/* End of file M_nilai.php */
/* Location: ./application/models/manager/M_nilai.php */