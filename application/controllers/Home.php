<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nama class       : Home
 * Jenis class      : Controller
 * Path class       : application/controllers/Home.php
 * Deskripsi class  : Class ini digunakan untuk keperluan halaman home
 */

class Home extends CI_Controller {

	/**
	 * Fungsi construct
	 * Selalu dieksekusi ketika class dipanggil
	 */

	public function __construct(){
		Parent::__construct();
	}

	/**
	 * index function
	 * Dijalankan pertama kali ketika halaman home di website dipanggil
	 **/

	public function index($page = 1){
		$data = array(
			'category' => $this->category_model->get_category(),
			'tag' => $this->tag_model->get_tag(),
			'title' => 'Gallery Art Website',
			);

		$this->load->view('templates/header_view',$data);
		if($this->login_library->is_logged()){
			$this->load->view('templates/navbar_logged_view');
		}else{
			$this->load->view('templates/navbar_view');
		}

		$this->load->view('pages/home_view',$this->pagination($page));
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

		$config['base_url'] = base_url();
		$config['total_rows'] = $this->image_model->get_row();
		$config['per_page'] = '9';
		$config['use_page_numbers'] = true;

		//config for bootstrap

		$this->pagination->initialize($config);

		$data['page'] = $page-1;

		$data['image_list'] = $this->image_model->get_image_list($config['per_page'], 9*$data['page']);
		$data['pagination'] = $this->pagination->create_links();

		return $data;
	}

}