<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_image_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function insert($id_image,$id_tag){
		$data = array(
			'id_image' => $id_image,
			'id_tag' => $id_tag
			);
		$this->db->insert('tag_image', $data);
	}

	public function get_tag($id_image){
		$this->db->select('name_tag');
		$this->db->where('id_image',$id_image);
		$this->db->join('tag', 'tag_image.id_tag=tag.id_tag');
		$query = $this->db->get('tag_image');
		return $query->result();
	}

	public function get_image($name_tag){
		$this->db->select('id_image');
		$this->db->where('name_tag',$name_tag);
		$this->db->join('tag', 'tag_image.id_tag=tag.id_tag');
		$query = $this->db->get('tag_image');
		return $query->result();
	}

	public function delete($id_image){
		$this->db->where('id_image',$id_image);
		$this->db->delete('tag_image');
	}
}