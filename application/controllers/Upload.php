<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nama class       : Upload
 * Jenis class      : Controller
 * Path class       : application/controllers/Upload.php
 * Deskripsi class  : Class ini digunakan untuk keperluan upload image
 */

class Upload extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('date');
		$this->login_library->blocked();
	}

	public function index(){
		if($this->input->post('verified')!='true'){
			redirect(base_url());
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Decription', 'required');
		$this->form_validation->set_rules('checkbox-category[]', 'Category', 'required');
		$this->form_validation->set_rules('tag[]', 'Tag', 'required');

		$status = true;

		if ($this->form_validation->run() == false) {
			echo $this->form_validation->error_string();
		} else {
			$this->load->model('image_model');
			$this->load->model('image_category_model');
			$this->load->model('tag_model');
			$this->load->model('tag_image_model');

			$name_image = $this->input->post('title', true);
			$description = $this->input->post('description', true);
			$category = $this->input->post('checkbox-category[]',true);
			$tag = explode(', ',$this->input->post('tag[]'));
			$id_user = $this->login_library->get_id();

			//Upload

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_filename']			= 50;
			$config['file_name']			= $this->login_library->get_username().now();
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
				// $error = array('error' => $this->upload->display_errors());

				$status = false;
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				$image_url = $this->upload->data('file_name');
			}

			if(!$this->image_model->insert($id_user,$name_image,$description,$image_url)){
				$status = false;
				echo 0;
			}
			$id_image = $this->image_model->get_id($name_image);
			foreach ($category as $id_category) {
				$this->image_category_model->insert($id_image,$id_category);
			}

			foreach ($tag as $name_tag) {
				if($this->tag_model->check_tag($name_tag)==0){
					$this->tag_model->insert($name_tag);
					$id_tag = $this->tag_model->get_id($name_tag);
					$this->tag_image_model->insert($id_image,$id_tag);
				}else{
					$id_tag = $this->tag_model->get_id($name_tag);
					$this->tag_image_model->insert($id_image,$id_tag);
				}
			}

			$this->create_thumbnail($image_url);

			if($status==true){
				echo 1;
			}
		}
	}

	public function search_tag(){
		$this->load->model('tag_model');

		$tag = $this->input->get('term');

		if($tag!=NULL){
			$array = array();

			foreach ($this->tag_model->get_tag($tag) as $row) {
				$array[] = $row->name_tag;
			};

			echo json_encode($array);
		}else{
			redirect(base_url());
		}
	}

	public function create_thumbnail($name_image){

		$config['image_library'] = 'gd2';
		$config['source_image'] = './uploads/'.$name_image;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['height']         = 250;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		if (!$this->image_lib->resize())
		{
			echo $this->image_lib->display_errors();
		}
	}
}
