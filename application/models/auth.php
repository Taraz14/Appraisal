<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

    public function logcek($email, $pass){
		$this->db->where('email', $email);
		$this->db->where('pass', $pass);
		return $this->db->get('users');
	}

    public function passcek($pass){
		$this->db->where('pass', $pass);
		return $this->db->get('users');
	}

	public function cekemail($email) {
		$this->db->where('email', $email);
		return $this->db->get('users');
	}

}

/* End of file auth.php */
/* Location: ./application/models/auth.php */