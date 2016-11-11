<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nama class       : Gallery
 * Jenis class      : Controller
 * Path class       : application/controllers/Gallery.php
 * Deskripsi class  : Class ini digunakan untuk menampilkan image pengguna
 */

class Gallery extends CI_Controller {

	/**
	 * Fungsi construct
	 * Selalu dieksekusi ketika class dipanggil
	 */

	public function __construct(){
		Parent::__construct();
	}

	public function index($page = 1){
		$data = array(
			'category' => $this->category_model->get_category(),
			'tag' => $this->tag_model->get_tag(),
			'title' => 'Gallery'
			);

		$this->load->view('templates/header_view',$data);
		if($this->login_library->is_logged()){
			$this->load->view('templates/navbar_logged_view');
		}else{
			$this->load->view('templates/navbar_view');
		}

		$this->load->view('pages/gallery_view',$this->pagination($page));
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

	public function pagination($page){

		$this->load->model('image_model');
		$this->load->library('pagination');

		$config = array();

		//pagination settings

		$config['base_url'] = base_url().'gallery';

		$filter = array(
			'id_user' => $this->login_library->get_id()
			);

		$config['total_rows'] = $this->image_model->get_row_user($filter);
		$config['per_page'] = '9';
		$config['use_page_numbers'] = true;

		//config for bootstrap

		$this->pagination->initialize($config);

		$data['page'] = $page-1;

		$data['image_list'] = $this->image_model->get_image_list_user($config['per_page'], 9*$data['page'], $filter);
		$data['pagination'] = $this->pagination->create_links();

		return $data;
	}

	public function delete($id_image){
		$this->load->model('tag_image_model');
		$this->load->model('image_model');
		$this->load->model('image_category_model');
		$this->load->model('comment_model');
		$this->tag_image_model->delete($id_image);
		$this->image_category_model->delete($id_image);
		$this->comment_model->delete($id_image);
		$this->image_model->delete($id_image);
		redirect(site_url('gallery'));
	}
}