<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Nama class       : User
 * Jenis class      : Controller
 * Path class       : application/controllers/User.php
 * Deskripsi class  : Class ini digunakan untuk keperluan user di website
 */

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('date');
	}

	public function update(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_filename']			= 50;
		$config['file_name']			= 'avatar_'.$this->login_library->get_username().now();

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')){
			echo $this->upload->display_errors();

		}else{
			$data = array('upload_data' => $this->upload->data());
			$url_avatar = $this->upload->data('file_name');
			$url_avatar =$this->create_thumbnail($url_avatar);
			$this->load->model('user_model');
			if($this->user_model->update_avatar($url_avatar,$this->login_library->get_id())){
				$this->login_library->set_avatar($url_avatar);
				echo "Avatar Updated";
			}else{
				echo "Error";
			}
		}
	}

	public function create_thumbnail($name_image){

		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$name_image;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['height']         = 200;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		if($this->image_lib->resize()){
			$this->load->helper('file');
			return str_replace('.','_thumb.',$name_image);
		}
	}
}