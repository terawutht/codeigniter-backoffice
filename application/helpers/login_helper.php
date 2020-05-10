<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function _check_login() {
    $ci = get_instance();
    $is_login = $ci->session->has_userdata('logged_in');
    if($is_login) {
        return true;
    } else {
        return false;
    }	
}