<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manager extends CI_Model {

	private static $table_appraisal = 'appraisal AS a';
	private static $table_user = 'users';
	private static $table_aspek_join = 'aspek AS as';
	private static $table_jaspek = 'jaspek AS j';
	private static $table_skor = 'skor';

	private $select_column_user = [
		'id_user',
		'role',
		'email',
		'status',
		'department',
		'name_user'
	];

	private $order_column_user = [
		NULL,
		'name_user',
		'role',
		'department',
		'status',
		'email'
	];

	private $select_appraisal = [
		'id_appraisal',
		'id_aspek',
		'id_user',
		'tahun_periode',
		'periode',
		'nilai',
		'tanggal_penilaian'
	];

	private $select_aspek = [
		'id_aspek',
		'id_jAspek',
		'aspek',
		'detail_aspek',
		'bobot'
	];

	private $select_appraisal_join = [
		'a.id_appraisal AS aid',
		'a.id_aspek AS aidas',
		'a.id_user AS aidu',
		'a.tahun_periode AS atahun',
		'a.periode AS aperiod',
		'a.nilai AS anil',
		'a.tanggal_penilaian AS atang',
		'u.id_user AS uid',
		'u.role AS urole',
		'u.department AS udepart',
		'u.status AS utus',
		'u.email AS umild',
		'as.id_aspek AS asid',
		'as.id_jAspek AS ajas',
		'as.aspek AS asas',
		'as.detail_aspek AS asdet',
		'as.bobot AS asbot',
		's.id_skor AS sid',
		's.id_user AS sidu',
		's.total_skor AS stot'
	];

	private $select_aspek_join = [
		'as.id_jAspek AS ajas',
		'as.aspek AS asas',
		'as.detail_aspek AS asdet',
		'j.judul_aspek AS jud'
	];

	private $select_aspek_isi = [
		'as.id_jAspek AS ajas', 
		'as.id_aspek AS asid',
		'as.aspek AS asas',
		'as.detail_aspek AS asdet',
		'j.judul_aspek AS jud'
	];

	public function get_name_user(){
		$this->db->select('id_user, name_user');
		$this->db->from(self::$table_user);
		return $this->db->get()->result();
	}	

	public function get_name_penilai($id_user){
		$this->db->where('id_user', $id_user);
		return $this->db->get(self::$table_user)->row();
	}

	public function get_appraisal_join($id_user){
		$this->db->select($this->select_appraisal_join)
					->join('aspek AS as', 'a.id_aspek = as.id_aspek')
					->join('users AS u', 'a.id_user = u.id_user')
					->join('skor AS s', 'u.id_user = s.id_user')
					->where('u.id_user', $id_user)
					->order_by('atang', 'asc');
		return $this->db->get(self::$table_appraisal)->result();
	}

	public function get_aspek(){
		$this->db->select($this->select_aspek_join)
					->from(self::$table_aspek_join)
					->join('jaspek AS j', ' as.id_jAspek = j.id_jAspek ', 'left')
					->order_by('ajas', 'asc')
					->group_by('jud');
		return $this->db->get()->result();
	}

	public function get_aspek_isi(){
		$this->db->select($this->select_aspek_isi)
					->from(self::$table_aspek_join)
					->join('jaspek AS j', ' as.id_jAspek = j.id_jAspek ', 'left')
					->order_by('ajas', 'asc');
		return $this->db->get()->result();
	}

    public function insert_nilai($data){
        $this->db->insert_batch('appraisal', $data);
        $data['id_as'] = $this->db->insert_id();
    }

    public function total_score_insert($data_score){
    	$this->db->insert('skor', $data_score);
    }

}

/* End of file M_manager.php */
/* Location: ./application/models/manager/M_manager.php */