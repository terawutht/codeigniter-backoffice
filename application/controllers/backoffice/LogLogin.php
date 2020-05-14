<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogLogin extends My_Controller
{
    var $url;
    var $module;

    public function __construct()
    {
        parent::__construct();
        $this->module = 'log_login';
        $this->url = base_url()."backoffice/log-login/";
        $this->load->model('LogLogin_model','main');
        $this->verify_logged_in();
    }

    public function show()
    {
        $data['page_title'] = PROJECT_NAME . " | Log login";
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view("backoffice/pages/{$this->module}/list");
        $this->load->view('backoffice/template/footer');
    }

    public function get_list()
    {
        $list = $this->main->get_all_entries();
        if($list){
            return $this->response_json(200, $list);
        }else{
            return $this->response_json(400);
        }
       
    }
    
}