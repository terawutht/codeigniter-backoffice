<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    public $uesr_id;
    public function __construct()
    {
        parent::__construct();
        $this->uesr_id = $this->session->userdata('user_id');
    }

    public function verify_logged_in()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect("backoffice/login");
        }
    }

    public function response_json($status = 400, $data = null)
    {
        header('Content-type: application/json');
        $response = array();
        switch ($status) {
            case 200:
                $response =  array('status' => 200, 'data'=> $data);
                break;
            case 400:
                $response = array('status' => 400);
                break;
            default:
                $response = array('status' => 400);
        }
        echo json_encode($response);
    }
}
