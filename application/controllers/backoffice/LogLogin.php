<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogLogin extends My_Controller
{
    var $url;
    var $module_name;
    var $module_file;
    var $module_title;

    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'log-login';
        $this->module_file = 'log_login';
        $this->module_title = 'Log login';
        $this->url = base_url()."backoffice/log-login/";
        $this->load->model('LogLogin_model','main');
        $this->verify_logged_in();
    }

    public function show()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module_title}";
        $data['num_rows'] = $this->main->get_num_rows();
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view("backoffice/pages/{$this->module_file}/list");
        $this->load->view('backoffice/template/footer');
    }

    public function get_list()
    {
        $page = $this->input->get('page')?$this->input->get('page'):1;
        $list = $this->main->get_list_by_filter($page);
        if($list){
            return $this->response_json(200, $list);
        }else{
            return $this->response_json(400);
        }
       
    }

    public function get_num_rows()
    {
        $number = $this->main->get_num_rows();
        if($number){
            return $this->response_json(200, $number);
        }else{
            return $this->response_json(400);
        }
       
    }
    
}