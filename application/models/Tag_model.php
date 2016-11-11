<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_tag($tag = NULL){
		if($tag==NULL){
			$this->db->order_by('number_images', 'DESC');
			$this->db->limit(40);
			$query = $this->db->get('tag');
			return $query->result();
		}

		$this->db->cache_on();
		$this->db->limit(5);
		$this->db->select('name_tag');
		$this->db->like('name_tag', $tag);
		if(!$query = $this->db->get('tag')){
			return "Error";
		}else{
			return $query->result();
		}
	}

	public function get_id($tag){
		$this->db->select('id_tag');
		$this->db->where('name_tag', $tag);
		if(!$query = $this->db->get('tag')){
			return "Error";
		}else{
			return $query->row()->id_tag;
		}
	}

	public function check_tag($name_tag){
		$this->db->where('name_tag', $name_tag);
		if(!$query = $this->db->get('tag')){
			return "Error";
		}else{
			return $query->num_rows();
		}
	}

	public function insert($tag_name){
		$data = array(
			'name_tag' => $tag_name
			);
		if(!$this->db->insert('tag', $data)){
            return 0;
        }else{
            return 1;
        }
	}
	
}