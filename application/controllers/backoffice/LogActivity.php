<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LogActivity extends My_Controller
{
    var $url;
    var $module_name;
    var $module_file;
    var $module_title;

    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'log-activity';
        $this->module_file = 'log_activity';
        $this->module_title = 'Log activity';
        $this->url = base_url()."".SYSTEM_NAME."/".$this->module_name."/";
        $this->load->model('LogActivity_model','main');
        $this->verify_logged_in();
    }

    public function show()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module_title}";
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
        $list = $this->main->get_last_ten_entries();
        if($list){
            return $this->response_json(200, $list);
        }else{
            return $this->response_json(400);
        }
       
    }
    
}
