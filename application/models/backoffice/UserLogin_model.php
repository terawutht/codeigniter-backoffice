<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserLogin_model extends CI_Model
{
    var $table_name;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->table_name ='sys_user_login';
    }


    public function get_all_entries()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_by_username($username='')
    {
        $this->db->select("{$this->table_name}.id,username,password,sys_user_profile.full_name,group_id");
        $this->db->from($this->table_name);
        $this->db->join('sys_user_profile',"{$this->table_name}.user_profile_id = sys_user_profile.id",'LEFT');
        $this->db->where("{$this->table_name}.username",$username);
        $this->db->where("sys_user_profile.status",'enable');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get($this->table_name, 10);
        return $query->result();
    }

    public function insert_entry($post,$user_id=null)
    { 
            $this->data['username'] = $post['email'];
            $this->data['password'] = password_hash($post['password'], PASSWORD_BCRYPT, array('cost'=>12));
            $this->data['user_profile_id'] = $user_id;
            $this->db->insert($this->table_name, $this->data);
            return ($this->db->affected_rows() != 1) ? false : true ;
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update($this->table_name, $this, array('id' => $_POST['id']));
    }
    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
    }
}
