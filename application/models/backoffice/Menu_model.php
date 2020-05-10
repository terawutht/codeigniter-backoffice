<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        parent::__construct();
    }


    public function get_menu_aside_group()
    {
        return array
        (
            (object) array('id'=>1,'name'=>"Dashboard",'path'=>'backoffice/dashboard'),
            (object) array('id'=>2,'name'=>"News",'path'=>'backoffice/news'),
            (object) array('id'=>3,'name'=>"settings",'path'=>null),  
        );
    }

    public function get_menu_aside_main()
    {
        return array
        (
            (object) array('id'=>1,'name'=>"User",'group_id'=>3,'path'=>'backoffice/user'),
            (object) array('id'=>2,'name'=>"Permission",'group_id'=>3,'path'=>'backoffice/permission'),
            (object) array('id'=>3,'name'=>"Log",'group_id'=>3,'path'=>null),
        );
    }

    public function get_menu_aside_sub()
    {
        return array
        (
            (object) array('id'=>1,'name'=>"Activities",'menu_main_id'=>3,'path'=>'backoffice/log-activitie'),
            (object) array('id'=>2,'name'=>"Login",'menu_main_id'=>3,'path'=>'backoffice/log-login'),
        );
    }


    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
}
