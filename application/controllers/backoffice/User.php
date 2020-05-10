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
        $this->url = base_url()."backoffice/{$this->module}/";
        $this->load->model('User_model','main');
        $this->checkSessionLogin();
    }

    public function index()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module}";
        $data['menu_aside_group'] = $this->Menu_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->Menu_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->Menu_model->get_menu_aside_sub();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view('backoffice/pages/user/index');
        $this->load->view('backoffice/template/footer');
    }

    public function add()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module}";
        $data['menu_aside_group'] = $this->Menu_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->Menu_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->Menu_model->get_menu_aside_sub();

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
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            return redirect("{$this->url}add");
        } else {
            $result = $this->main->insert_entry($post);
            if ($result) {
                return redirect("{$this->url}");
            } else {
                return redirect("{$this->url}add");
            }
        }
    }

    public function list()
    {
        $list = $this->main->get_all_entries();
        header('Content-type: application/json');
        echo json_encode($list);
    }
    
    public function updateStatus()
    {
        header('Content-type: application/json');
        echo json_encode($this->input->post());

    }

    public function destroy($id = null)
    {
        // echo json_encode($list);
        $list = $this->main->delete_entry($id);    
        $result = array('status'=>200,'id'=>$id);
        header('Content-type: application/json');
        echo json_encode($result);
    }
}
