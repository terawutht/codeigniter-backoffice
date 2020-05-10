<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $full_name;
    public $email;
    public $status;
    public $create_at;
    public $create_by;
    public $update_at;
    public $update_by;

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_entries()
    {
        $query = $this->db->get('user_profile');
        return $query->result();
    }


    public function get_last_ten_entries()
    {
        $query = $this->db->get('user_profile', 10);
        return $query->result();
    }

    public function insert_entry($post)
    {
      
            $this->full_name    = $post['full_name'];
            $this->email = $post['email'];
            $this->status = $post['status'];
            $this->create_by = $this->uesr_id;
            $this->create_at = time();
            $this->update_at = null;
            $this->update_by = null;
            $this->db->insert('user_profile', $this);
            return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('user_profile', $this, array('id' => $_POST['id']));
    }
    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_profile');
    }
}
