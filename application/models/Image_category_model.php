<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_category_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($id_image,$id_category){
		$data = array(
			'id_image' => $id_image,
			'id_category' => $id_category
			);
		$this->db->insert('image_category', $data);
	}

	public function get_category($id_image){
		$this->db->select('name_category');
		$this->db->where('id_image',$id_image);
		$this->db->join('category', 'image_category.id_category=category.id_category');
        $query = $this->db->get('image_category');
        return $query->result();
	}

	public function get_image($name_category){
		$this->db->select('id_image');
		$this->db->where('name_category',$name_category);
		$this->db->join('category', 'image_category.id_category=category.id_category');
		$query = $this->db->get('image_category');
		return $query->result();
	}
	public function delete($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->delete('image_category');
	}
}