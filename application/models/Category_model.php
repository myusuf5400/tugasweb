<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_category(){
		$this->db->cache_on();
		$query = $this->db->get('category');
		return $query->result();
	}

	public function insert($name_category){
		$data = array(
			'name_category' => $name_category
			);
		if(!$this->db->insert('category', $data)){
			return 0;
		}else{
			return 1;
		}
	}
}
