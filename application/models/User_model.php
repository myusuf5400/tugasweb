<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * Function untuk menginsert data user ke database
     **/

    public function insert($firstname,$lastname,$username,$password,$email){
        $data = array(
            'first_name' => $firstname,
            'last_name' => $lastname,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'deleted' => 0,
            'level' => 0,
            );

        if(!$this->db->insert('user', $data)){
            return false;
        }else{
            return true;
        }
    }

    public function check_login($username,$password){

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('deleted', 0);

        $query = $this->db->get('user');

        return $query->num_rows();
    }

    public function get_username($username = NULL){
        if($username == NULL){
            $this->db->select('username');
            $query = $this->db->get('user');
            return $query->result();
        }

        $this->db->where('username',$username);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function check_username($username){
        $this->db->where('username',$username);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function get_email($email = NULL){
        if($email == NULL){
            $this->db->select('email');
            $query = $this->db->get('user');
            return $query->result();
        }

        $this->db->where('email',$email);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function check_email($email = NULL){
        $this->db->where('email',$email);
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function get_id($username){
        $this->db->select('id_user');
        $this->db->where('username',$username);
        $query = $this->db->get('user');
        return $query->row()->id_user;
    }

    public function get_avatar($username){
        $this->db->select('url_avatar');
        $this->db->where('username',$username);
        $query = $this->db->get('user');
        return $query->row()->url_avatar;
    }

    public function update_avatar($url_avatar,$id_user){
        $this->db->set('url_avatar', $url_avatar);
        $this->db->where('id_user',$id_user);
        if($this->db->update('user')){
            return true;
        }else{
            return false;
        }
    }

}