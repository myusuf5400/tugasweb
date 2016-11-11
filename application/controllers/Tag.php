<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nama class       : Tag
 * Jenis class      : Controller
 * Path class       : application/controllers/Tag.php
 * Deskripsi class  : Class ini digunakan untuk menampikan image berdasarkan tag
 */

class Tag extends CI_Controller {

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

	public function index($tag, $page = 1){
		$data = array(
			'category' => $this->category_model->get_category(),
			'tag' => $this->tag_model->get_tag(),
			'title' => 'Tag | '.$tag,
			);

		$this->load->view('templates/header_view',$data);
		if($this->login_library->is_logged()){
			$this->load->view('templates/navbar_logged_view');
		}else{
			$this->load->view('templates/navbar_view');
		}

		$this->load->view('pages/home_view',$this->pagination($tag,$page));
		$this->load->view('templates/sidebar_view');
		if(!$this->login_library->is_logged()){
			$this->load->view('templates/form_login_view');
			$this->load->view('templates/form_signup_view');
		}else{
			$this->load->view('templates/form_upload_view');
		}
		$this->load->view('templates/footer_view');

		// print_r($this->pagination($tag,$page));
	}

	public function pagination($tag, $page){

		$this->load->model('image_model');
		$this->load->model('tag_image_model');
		$this->load->library('pagination');

		$config = array();

		//pagination settings

		$config['base_url'] = base_url().'tag';

		$filter = array(0);

		foreach ($this->tag_image_model->get_image($tag) as $row) {
			$filter[] = $row->id_image;
		}
		$config['total_rows'] = $this->image_model->get_row($filter);
		$config['per_page'] = '9';
		$config['use_page_numbers'] = true;

		//config for bootstrap

		$this->pagination->initialize($config);

		$data['page'] = $page;

		$data['image_list'] = $this->image_model->get_image_list($config['per_page'], 9*$data['page'], $filter);
		$data['pagination'] = $this->pagination->create_links();

		return $data;
	}

	public function test(){
		$this->load->library('login_library');
		echo $this->login_library->get_id();
	}
}