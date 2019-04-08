<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

	private static $table_users = 'users';

	public function profile($id_user){
		$this->db->where('id_user', $id_user);
		return $this->db->get(self::$table_users)->row();
	}

	public function cek_old(){
        $old = $this->input->post('old');    
        $this->db->where('pass',$old);
        $query = $this->db->get('users');
           return $query->result();
    }

    public function save_pass(){
        $pass = $this->input->post('new');
        $data = array (
         'pass' => $pass
         );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users', $data);
    }

}

/* End of file M_users.php */
/* Location: ./application/models/manager/M_users.php */