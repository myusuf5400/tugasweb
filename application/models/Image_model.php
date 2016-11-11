<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($id_user,$name_image,$description,$url_image){
		$data = array(
			'id_user' => $id_user,
			'name_image' => $name_image,
			'description' => $description,
			'url_image' => $url_image,
			'deleted' => 0,
			);

		if(!$this->db->insert('image', $data)){
			return 0;
		}else{
			return 1;
		}
	}

	public function get_id($name_image){
		$this->db->select('id_image');
		$this->db->where('name_image',$name_image);
		$query = $this->db->get('image');
		return $query->row()->id_image;
	}

	public function get_image_url($image_name = NULL){
		if($image_name == NULL){
			$this->db->select('url_image');
			$query = $this->db->get('image');
			return $query->result();
		}
		$this->db->where('image_name',$image_name);
		$query = $this->db->get('image');
		return $query->row();
	}
	// Category dan Tag

	public function get_row($filter = NULL){
		if($filter!=NULL){
			$this->db->where_in('id_image',$filter);
		}
		$query = $this->db->get('image');
		return $query->num_rows();
	}

	public function get_image_list($limit,$start, $filter = NULL){
		if($filter!=NULL){
			$this->db->where_in('id_image',$filter);
		}
		$this->db->order_by('timestamp_created', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('image');
		return $query->result();
	}

	public function get_image($name_image){
		$this->db->where('name_image',$name_image);
		$this->db->join('user','user.id_user=image.id_user');
		$query = $this->db->get('image');
		return $query->row();
	}

	// User
	public function get_row_user($filter = NULL){
		if($filter!=NULL){
			$this->db->where_in('id_user',$filter);
		}
		$query = $this->db->get('image');
		return $query->num_rows();
	}

	public function get_image_list_user($limit,$start, $filter = NULL){
		if($filter!=NULL){
			$this->db->where_in('id_user',$filter);
		}
		$this->db->order_by('timestamp_created', 'DESC');
		$this->db->limit($limit, $start);
		$query = $this->db->get('image');
		return $query->result();
	}

	public function delete($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->delete('image');
	}
}