<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($id_image, $comment, $id_user){
		$data = array(
			'id_image' => $id_image,
			'comment' => $comment,
			'id_user' => $id_user
		);

		if(!$this->db->insert('comment', $data)){
			return 0;
		}else{
			return 1;
		}
	}

	public function get_comment($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->order_by('comment.timestamp_created', 'DESC');
		$this->db->join('user','user.id_user=comment.id_user');
		$query = $this->db->get('comment');
		return $query->result();
	}

	public function get_comment_last($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->order_by('comment.timestamp_created', 'DESC');
		$this->db->join('user','user.id_user=comment.id_user');
		$query = $this->db->get('comment');
		return $query->row();
	}

	public function delete($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->delete('comment');
	}
}