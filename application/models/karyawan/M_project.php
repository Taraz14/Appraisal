<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	private static $table_project = 'project AS p';
	private static $table_users = 'users AS u';
	private static $table_appraisal = 'appraisal';

	private $select_column_project = [
		'id_project',
		'id_user',
		'nama_pekerjaan',
		'keterlibatan',
		'keterangan'
	];

	private $select_project_join = [
		'p.id_project AS pid',
		'p.id_user AS pidu',
		'p.nama_pekerjaan AS peker',
		'p.keterlibatan AS plibat',
		'p.keterangan AS pengan',
		'u.id_user AS uid',
		'u.role AS urole',
		'u.department AS udepart',
		'u.status AS utus',
		'u.email AS umild',
		'u.name_user AS uname'
	];

    public function proj($id_user){
        $this->db->select($this->select_project_join)
		         ->join(self::$table_project, 'u.id_user = p.id_user')
		         ->where('u.id_user', $id_user);
        return $this->db->get(self::$table_users)->result();
    }

    public function app($id_user){
		$this->db->where('id_user', $id_user);
    	return $this->db->get(self::$table_appraisal)->row();
    }


}

/* End of file M_project.php */
/* Location: ./application/models/karyawan/M_project.php */