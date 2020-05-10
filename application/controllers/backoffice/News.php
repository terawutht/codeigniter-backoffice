<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		if ( ! $this->session->userdata('logged_in'))
        {      
			redirect("backoffice/login");
        }

    }

	public function index()
	{
        $data['page_title'] = PROJECT_NAME." | News";
        $data['menu_aside_group'] = $this->Menu_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->Menu_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->Menu_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head',$data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view('backoffice/pages/news/index');
        $this->load->view('backoffice/template/footer');
    }
    
   
}