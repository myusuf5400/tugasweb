<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Nama class       : Signup
 * Jenis class      : Controller
 * Path class       : application/controllers/Signup.php
 * Deskripsi class  : Class ini digunakan untuk keperluan signup di website
 */


class Signup extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->login_library->is_redirect();
		if($this->input->post('verified')!='true'){
			redirect(base_url());
		}
	}

	public function index(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha_numeric');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha_numeric');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|alpha_numeric|callback_check_username');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|alpha_numeric');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'callback_check_passconf['.$this->input->post('password').']');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');

        if ($this->form_validation->run() == FALSE){
           	echo $this->form_validation->error_string();
        }else{
        	$firstname = $this->input->post('firstname',TRUE);
        	$lastname = $this->input->post('lastname',TRUE);
        	$username = $this->input->post('username',TRUE);
			$password = md5($this->input->post('password',TRUE));
			$email = $this->input->post('email',TRUE);

        	if($this->user_model->insert($firstname,$lastname,$username,$password,$email)){
        		echo 1;
        	}else{
        		echo "Signup error";
        	}
        }
	}

	public function check_username($username){
		if($this->user_model->check_username($username)==0){
			return true;
		}else{
			$this->form_validation->set_message('check_username','Username already used');
			return false;
		}
	}

	public function check_email($email){
		if($this->user_model->check_email($email)==0){
			return true;
		}else{
			$this->form_validation->set_message('check_email','Email already used');
			return false;
		}
	}

	public function check_passconf($passconf,$password){
		if($password==$passconf){
			return true;
		}else{
			$this->form_validation->set_message('check_passconf','Password confirmation not same');
			return false;
		}
	}
}