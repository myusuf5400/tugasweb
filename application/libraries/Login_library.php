<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_library {

	public function __construct()
	{
            // Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}

	public function activate_login($username){
		$this->CI->load->model('user_model');

		$avatar;

		if($this->CI->user_model->get_avatar($username)==NULL){
			$avatar = 'default_avatar.png';
		}else{
			$avatar = $this->CI->user_model->get_avatar($username);
		};

		$data = array(
			'id_user' => $this->CI->user_model->get_id($username),
			'avatar' => $avatar,
			'username' => $username,
			'status' => 1,
			);

		$this->CI->session->set_userdata($data);
	}

	public function is_redirect(){
		if($this->is_logged()){ // Mengecek status login
			redirect(site_url()); // Meredirect ke halaman home
		}
	}

	public function blocked(){
		if(!$this->is_logged()){
            redirect(site_url()); // Meredisrect ke halaman home
        }
    }

    public function is_logged(){
    	return $this->CI->session->userdata('status');
    }

    public function signout(){
    	$this->CI->session->sess_destroy();
    	redirect(site_url());
    }

    public function get_username(){
    	return $this->CI->session->userdata('username');
    }

    public function get_id(){
    	return $this->CI->session->userdata('id_user');
    }

    public function get_avatar(){
    	return $this->CI->session->userdata('avatar');
    }

    public function set_avatar($url_avatar){
    	$this->CI->session->set_userdata('avatar',$url_avatar);
    }
}
