<?php
defined('BASEPATH') or exit('No direct script access allowed');

class My_Controller extends CI_Controller
{
    var $uesr_id;
    public function __construct()
    {
        $this->uesr_id = 1 ;
        parent::__construct();
      
    }

    public function checkSessionLogin(){
        if (!$this->session->userdata('logged_in')) {
            redirect("backoffice/login");
        }
    }

















}