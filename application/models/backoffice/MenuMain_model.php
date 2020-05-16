<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MenuMain_model extends CI_Model
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
        $this->db->order_by("order","ASC");
        $query = $this->db->get('sys_menu_group');
        return $query->result();
    }

    public function get_menu_aside_main()
    {
        $this->db->order_by("order","ASC");
        $query = $this->db->get('sys_menu_main');
        return $query->result();
    }

    public function get_menu_aside_sub()
    {
        $this->db->order_by("order","ASC");
        $query = $this->db->get('sys_menu_sub');
        return $query->result();
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
