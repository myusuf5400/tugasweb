<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Nama class       : Login
 * Jenis class      : Controller
 * Path class       : application/controllers/Login.php
 * Deskripsi class  : Class ini digunakan untuk keperluan login di website
 */

class Login extends CI_Controller
{

    /**
     * Fungsi construct
     * Selalu dieksekusi ketika class dipanggil
     */

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Fungsi index
     * Dijalankan pertama kali ketika halaman Login di website dipanggil
     *
     * @param $error berisi pesan error yang ditampilkan di index
     *        Default value adalah NULL
     **/

    public function index()
    {
        if($this->input->post('verified')!='true'){
            redirect(base_url());
        }

        $this->login_library->is_redirect();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' =>
            'You must provide a %s.'));

        if ($this->form_validation->run() == false) {
            echo $this->form_validation->error_string();
        } else {
            $username = $this->input->post('username', true);
            $password = md5($this->input->post('password', true));

            $this->load->model('user_model');
            $login = $this->user_model->check_login($username, $password);

            if ($login == 1) {
                $this->login_library->activate_login($username);
                echo 1;
            } else {
                $error = "Username atau Password salah";
                echo $error;
            }
        }
    }

    public function signout()
    {
        $this->login_library->signout();
    }
}
