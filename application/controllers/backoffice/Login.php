<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //echo 'dsada';exit;
    }

    public function index()
    {
        $this->check_logged_in();
        $this->load->view('backoffice/pages/login/index');
    }

    public function check_login()
    {
        $this->check_logged_in();
        $post = $this->input->post();
        if (!empty($post)) {
            $user = array(
                'username'  => 'admin',
                'email'     => $post['email'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user);

            return redirect("backoffice/dashboard");
        }else{
            return show_404();
        }
    }

    public function logout()
    {
        $user = array('username', 'email','logged_in');
        $this->session->unset_userdata($user);
        redirect("backoffice/login");
    }

    public function check_logged_in()
    {
        if ($this->session->userdata('logged_in'))
        {      
			redirect("backoffice/dashboard");
        }
    }

}
