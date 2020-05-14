<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $data['page_title'] = PROJECT_NAME." | Dashboard";
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();




        $this->load->view('backoffice/template/head',$data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view('backoffice/pages/dashboard/index');
        $this->load->view('backoffice/template/footer');
    }
    
   
}