	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Nama class       : Comment
	 * Jenis class      : Controller
	 * Path class       : application/controllers/Comment.php
	 * Deskripsi class  : Class ini digunakan untuk keperluan comment di website
	 */

	class Comment extends CI_Controller {

		/**
		 * Fungsi construct
		 * Selalu dieksekusi ketika class dipanggil
		 */

		public function __construct(){
			Parent::__construct();
		}

		public function add_comment(){
			$this->load->model('comment_model');
			$id_image = $this->input->post('id_image');
			$comment = $this->input->post('comment');
			$id_user = $this->login_library->get_id();
			if($this->comment_model->insert($id_image,$comment,$id_user)){
				echo $this->encode_comment($this->comment_model->get_comment_last($id_image));
			}else{
				echo 0;
			}
		}

		public function encode_comment($data){
			$this->load->library('login_library');
			return "<div class='container-comment'><img width='75px' height='75px' class='img-circle' src='".base_url().'uploads/'.$data->url_avatar."'> <div class='popover fade right in'><div class='arrow' style='top: 50%;'></div><div class='popover-content'><timestamp>".$data->timestamp_created."</timestamp> <comment>".$data->comment."</comment></div></div></div>";
		}
	}