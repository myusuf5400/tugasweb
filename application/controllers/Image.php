<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nama class       : Image
 * Jenis class      : Controller
 * Path class       : application/controllers/Image.php
 * Deskripsi class  : Class ini digunakan untuk menampilkan image
 */

class Image extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($name_image = null){
		if($name_image==null){
			redirect(base_url());
		}

		$this->load->model('image_model');
		$this->load->model('comment_model');
		$this->load->model('image_category_model');
		$this->load->model('tag_image_model');

		if(!$image = $this->image_model->get_image(humanize($name_image))){
			redirect(base_url());
		}

		$image_category =  $this->image_category_model->get_category($image->id_image);
		$image_tag =  $this->tag_image_model->get_tag($image->id_image);

		$data = array(
			'category' => $this->category_model->get_category(),
			'image' => $image,
			'image_category' => $image_category,
			'image_tag' => $image_tag,
			'title' => 'Image | '.$name_image,
			'user' => $this->login_library->get_username(),
			'comment' => $this->comment_model->get_comment($image->id_image),
			);

		$this->load->view('templates/header_view',$data);
		if($this->login_library->is_logged()){
			$this->load->view('templates/navbar_logged_view');
		}else{
			$this->load->view('templates/navbar_view');
		}
		$this->load->view('pages/image_view');
		$this->load->view('templates/sidebar_view');
		if(!$this->login_library->is_logged()){
			$this->load->view('templates/form_login_view');
			$this->load->view('templates/form_signup_view');
		}else{
			$this->load->view('templates/form_upload_view');
			$this->load->view('templates/form_setting_view');
		}
		$this->load->view('templates/footer_view');
	}
}