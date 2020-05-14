<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends My_Controller
{
    var $url;
    var $module;

    public function __construct()
    {
        parent::__construct();
        $this->module = 'user';
        $this->url = base_url()."backoffice/user/";
        $this->load->model('UserProfile_model','main');
        $this->verify_logged_in();
    }

    public function show()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module}";
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view("backoffice/pages/{$this->module}/list");
        $this->load->view('backoffice/template/footer');
    }

    public function create()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module}";
        $data['action_url'] = base_url().SYSTEM_NAME."/{$this->module}/store";
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view("backoffice/pages/{$this->module}/add");
        $this->load->view('backoffice/template/footer');
    }

    public function store()
    {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->LogActivity_model->insert_entry("insert","fail");
            return redirect("{$this->url}add");
        } else {
            $id = $this->main->insert_entry($post);
            $success = $this->UserLogin_model->insert_entry($post,$id);
            if ($success) {
                $this->LogActivity_model->insert_entry("insert","success");
                return redirect("{$this->url}view");
            } else {
                $this->LogActivity_model->insert_entry("insert","fail");
                return redirect("{$this->url}add");
            }
        }
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
    
    public function update_status($id = null,$status=null)
    {
        $success = $this->main->update_status($id,$status);
        if($success){
            $this->LogActivity_model->insert_entry("update_status","success");
            return $this->response_json(200);
        }else{
            $this->LogActivity_model->insert_entry("update_status","fail");
            return $this->response_json(400);
        }
    }

    public function destroy($id = null)
    {
        $success = $this->main->delete_entry($id);
        if($success){
            $this->LogActivity_model->insert_entry("delete","success");
            return $this->response_json(200, array('id'=>$id));
        }else{
            $this->LogActivity_model->insert_entry("delete","fail");
            return $this->response_json(400);
        }
    }
}
