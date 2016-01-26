<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  	function __construct() {
    		parent::__construct();

        $this->load->model('m_sdpa');

  	}

  	function index() {
        $session = $this->session->userdata('isLogin'); //mengabil dari session apakah sudah login atau belum

        if($session == FALSE) {

            $this->load->view('sdpa_bl/login');

        } else {

            redirect('dashboard');

        }
    }

    function do_login() {
        $this->load->library('user_agent');

        date_default_timezone_set("Asia/Jakarta");

        $ses      = session_id();

        $ip       = $_SERVER['REMOTE_ADDR'];

        $browser  = $this->agent->browser();
        $brover   = $this->agent->version();

        $tgl      = date('Y-m-d H:i:s');
        $logData  = array(
                        'sess_id' 	=> $ses,
                        'ip_add' 		=> $ip,
                        'browser' 	=> $browser." ".$brover,
                        'last_log'	=> $tgl
                    );

        $id_user 	= $this->input->post("nip");
        $password = $this->input->post("pass");

        $cek      = $this->m_sdpa->cek_user($id_user,md5($password)); //melakukan persamaan data dengan database

        if(count($cek) == 1) {
            foreach ($cek as $cek2) {
                $level = $cek2['level']; //mengambil data(level/hak akses) dari database
            }

            $this->session->set_userdata(array(
                'isLogin' => TRUE, //set data telah login
                'u_id'    => $id_user, //set session id_user
                'lvl'     => $level
            ));

            $this->m_sdpa->update_data("user", $logData, array('id_user' => $id_user));
            // $this->dashboard;
          	redirect('dashboard','refresh');

        } else {

            echo "<script>alert('Gagal Login!')</script>";
            redirect('login','refresh');

        }
    }
}
