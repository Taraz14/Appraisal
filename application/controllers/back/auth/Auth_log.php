<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_log extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('auth');
		$this->load->model('M_users');
	}

	public function auth_login(){
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$check = $this->auth->logcek($email, $pass);

		if($check->num_rows() > 0){
			foreach ($check->result() as $data) {
				$row = array('users'	=> TRUE,
							'id_user'	=> $data->id_user,
							'email'		=> $data->email,
							'role'		=> $data->role,
							'department' => $data->department);
				$this->session->set_userdata($row);
			}
			
			if($this->session->userdata('role') == 'karyawan'){
				redirect('karyawan');
			}
			elseif ($this->session->userdata('role') == 'manager') {
				redirect('manager');
			}
			elseif ($this->session->userdata('role') == 'pnc') {
				redirect('pnc');
			}
		}
		else{
			$this->session->set_flashdata('notif', 'Email or Password incorrect');
			redirect('welcome');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function pass_change_process(){
		$this->form_validation->set_rules('new','New','required|alpha_numeric');
		$this->form_validation->set_rules('re_new', 'Retype New', 'required|matches[new]');
		if($this->form_validation->run() == FALSE){
			redirect('manager/ubahpass');
        }
        else {
            $cek_old = $this->M_users->cek_old();
            if ($cek_old == False){
                $this->session->set_flashdata('error','Old password not match!' );
                
                if($this->session->userdata('role') == 'karyawan'){
				redirect('back/karyawan/karyawan');
				}
				elseif ($this->session->userdata('role') == 'manager') {
					redirect('manager/pass');
				}
				elseif ($this->session->userdata('role') == 'pnc') {
					redirect('back/pnc/pnc');
				}
            }
            else {
                $this->M_users->save_pass();
                $this->session->sess_destroy();
                $this->session->set_flashdata('error','Your password success to change, please relogin !' );
                
                redirect('welcome');
            }
        }
    }


}

/* End of file Login.php */
/* Location: ./application/controllers/back/auth/Login.php */