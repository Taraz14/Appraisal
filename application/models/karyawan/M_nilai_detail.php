<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai_detail extends CI_Model {

	protected static $appraisal_table = 'appraisal';
	// protected static $aspek_table = 'aspek';

	protected $select_column_app = [
		'jaspek.id_jAspek',
		'jaspek.judul_aspek',
		'aspek.id_jAspek',
		'aspek.aspek',
		'aspek.detail_aspek',
		'appraisal.id_aspek',
		'appraisal.id_user',
		'appraisal.tahun_periode',
		'appraisal.periode',
		'appraisal.nilai',
		'appraisal.tanggal_penilaian',
		'users.id_user',
		// 'skor.id_skor',
		// 'skor.id_user',
		// 'skor.periode'
	];

	protected $order_column = [
		'jaspek.judul_aspek',
		'aspek.aspek',
		'aspek.detail_aspek',
		'appraisal.tahun_periode',
		'appraisal.periode',
		'appraisal.nilai',
		'appraisal.tanggal_penilaian'
	];

	protected function det_nilai_setting($id_user){
		// $id_user = $this->session->userdata('id_user');
		$periode = $this->session->userdata('periode');
		// var_dump($id_user);
		$this->db->select($this->select_column_app)
				 ->from(self::$appraisal_table)
				 ->join('aspek', 'aspek.id_aspek = '.self::$appraisal_table.'.id_aspek', 'left')
				 ->join('jaspek', 'jaspek.id_jAspek = aspek.id_jAspek', 'left')
				 ->join('users', 'appraisal.id_user = users.id_user', 'left');
				 // ->join('skor', 'skor.id_user = users.id_user', 'left');

		$where_id = 'appraisal.id_user = "'.$id_user.'"';
		$this->db->where($where_id);

		// $where_per = 'appraisal.periode = "'.$periode.'"';
		// $this->db->where($where_per);

		// $where = "appraisal.periode = '".($this->input->get('periode'))."'";
		// $this->db->where($where);

		if(isset($_GET['order'])) {
			$this->db->order_by( $this->order_column[$_GET['order']['0']['column']], $_GET['order']['0']['dir'] );
		}
	}

	public function get_datatables($id_user){
		$this->det_nilai_setting($id_user);

		if ($this->input->get('length') !== 1) {
			$this->db->limit($this->input->get('length'), $this->input->get('start'));
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function count_all(){
		return $this->db->get(self::$appraisal_table)->num_rows();
	}

	public function fetch_count(){
		$this->db->select('*');
		$this->db->from(self::$appraisal_table);
		$query = $this->db->get();
		return $this->db->count_all_results();
	}

	public function filter($id_user){
		$this->det_nilai_setting($id_user);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function periode(){
		$this->db->select('*');
		$this->db->from(self::$appraisal_table);
		$this->db->group_by('periode');
		return $this->db->get()->result();
	}

}

/* End of file M_nilai_detail.php */
/* Location: ./application/models/karyawan/M_nilai_detail.php */