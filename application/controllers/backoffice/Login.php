<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->verify_logged_in();
        $this->load->view('backoffice/pages/login/index');
    }

    public function verify_login()
    {
        $this->verify_logged_in();
        $post = $this->input->post();
        if (!empty($post)) {
            $user = $this->UserLogin_model->get_by_username($post['username']);
            if (password_verify($post['password'],$user->password)) {
                $user = array(
                    'user_id' =>$user->id,
                    'fullname'  => $user->full_name,
                    'email'     => $user->username,
                    'role'     => $user->group_id,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($user);
                $this->LogLogin_model->insert_entry("login","success");
                return redirect("backoffice/dashboard");
            }else{
                $this->LogLogin_model->insert_entry("login","Wrong password");
                return redirect("backoffice/login");
            }
        } else {
            return show_404();
        }
    }

    public function logout()
    {
        $this->LogLogin_model->insert_entry("logout","success");
        $user = array('user_id','fullname', 'email', 'role','logged_in');
        $this->session->unset_userdata($user);     
        redirect("backoffice/login");
    }

    public function verify_logged_in()
    {
        if ($this->session->userdata('logged_in')) {
            redirect("backoffice/dashboard");
        }
    }
}
