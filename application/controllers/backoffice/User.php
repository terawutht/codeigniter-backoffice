<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends My_Controller
{
    var $module_name;
    var $module_file;
    public $module_title;
    var $url;

    public function __construct()
    {
        parent::__construct();
        $this->module_name = 'user';
        $this->module_file = 'user';
        $this->module_title = 'User';
        $this->url = base_url() . "" . SYSTEM_NAME . "/" . $this->module_name . "/";
        $this->load->model('UserProfile_model', 'main');
     //   $this->verify_logged_in();
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

    public function create()
    {
        $data['page_title'] = PROJECT_NAME . " | {$this->module_title}";
        $data['action_url'] = $this->url . "/store";
        $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
        $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
        $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

        $data['group'] = $this->UserGroup_model->get_all_at_enable();

        $this->load->view('backoffice/template/head', $data);
        $this->load->view('backoffice/template/nav');
        $this->load->view('backoffice/template/aside');
        $this->load->view("backoffice/pages/{$this->module_file}/add");
        $this->load->view('backoffice/template/footer');
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        if ($id) {
            $data['page_title'] = PROJECT_NAME . " | {$this->module_title}";
            $data['action_url'] = $this->url . "/update";
            $data['menu_aside_group'] = $this->MenuMain_model->get_menu_aside_group();
            $data['menu_aside_main'] = $this->MenuMain_model->get_menu_aside_main();
            $data['menu_aside_sub'] = $this->MenuMain_model->get_menu_aside_sub();

            // $data['row'] = $this->main->get_row_by_id($id);
            $data['id'] = $id;

            $this->load->view('backoffice/template/head', $data);
            $this->load->view('backoffice/template/nav');
            $this->load->view('backoffice/template/aside');
            $this->load->view("backoffice/pages/{$this->module_file}/edit");
            $this->load->view('backoffice/template/footer');
        } else {
            return redirect("{$this->url}view");
        }
    }


    public function store()
    {
        $post = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('full_name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->LogActivity_model->insert_entry("insert", "fail");
            return redirect("{$this->url}add");
        } else {
            $id = $this->main->insert_entry($post);
            $success = $this->UserLogin_model->insert_entry($post, $id);
            if ($success) {
                $this->LogActivity_model->insert_entry("insert", "success");
                return redirect("{$this->url}view");
            } else {
                $this->LogActivity_model->insert_entry("insert", "fail");
                return redirect("{$this->url}add");
            }
        }
    }

    public function update()
    {
        $post = $this->input->post();
        if ($post) {
            $id = $post['id'];
            $this->load->library('form_validation');
            $this->form_validation->set_rules('full_name', 'Username', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('group_id', 'Group', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->LogActivity_model->insert_entry("update", "fail");
                return redirect("{$this->url}edit/{$id}");
            } else {
                $success = $this->main->update_entry($post);
                if ($success) {
                    $this->LogActivity_model->insert_entry("update", "success");
                    return redirect("{$this->url}view");
                } else {
                    $this->LogActivity_model->insert_entry("update", "fail");
                    return redirect("{$this->url}edit/{$id}");
                }
            }
        } else {
            return show_404();
        }
    }

    public function verify_form_add()
    {
        $post = $this->input->post();
        if ($post) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('full_name', 'Fullname', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->LogActivity_model->insert_entry("update", "fail");
                return $this->response_json(400,'post fail');
            } else {
                $is_duplicate_email = $this->main->verify_email($post['email']);
                $is_duplicate_fullname = $this->main->verify_fullname($post['full_name']);
                return $this->response_json(200, array(
                    'email' => $is_duplicate_email,
                    'full_name' => $is_duplicate_fullname
                ));
            }
        } else {
            return $this->response_json(400);
        }
    }

    public function get_list()
    {
        $list = $this->main->get_last_ten_entries();
        if ($list) {
            return $this->response_json(200, $list);
        } else {
            return $this->response_json(400);
        }
    }

    public function get_row()
    {
        $id = $this->input->get('id');
        $row = $this->main->get_row_by_id($id);
        if ($row) {
            return $this->response_json(200, $row);
        } else {
            return $this->response_json(400);
        }
    }

    public function update_status($id = null, $status = null)
    {
        // $success = $this->main->update_status($id,$status);
        // if($success){
        //     $this->LogActivity_model->insert_entry("update status","success");
        //     return $this->response_json(200);
        // }else{
        //     $this->LogActivity_model->insert_entry("update status","fail");
        return $this->response_json(400);
        // }
    }

    public function destroy($id = null)
    {
        $success = $this->main->delete_entry($id);
        if ($success) {
            $this->LogActivity_model->insert_entry("delete", "success");
            return $this->response_json(200, array('id' => $id));
        } else {
            $this->LogActivity_model->insert_entry("delete", "fail");
            return $this->response_json(400);
        }
    }
}
