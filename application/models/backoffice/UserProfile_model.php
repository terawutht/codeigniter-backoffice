<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserProfile_model extends CI_Model
{
    var $table_name;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_user_profile';
    }

    public function get_all_entries()
    {
        $this->db->select("n.full_name,status,created_at,created_by,updated_at,updated_by,
        sys_user_group.name as group_name,
        sys_user_login.username as email");
        $this->db->from($this->table_name." n");
        $this->db->join('sys_user_login', "n.id = sys_user_login.user_profile_id", 'LEFT');
        $this->db->join('sys_user_group', "n.group_id = sys_user_group.id", 'LEFT');
        $this->db->order_by("n.id", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_status_by_id($id=null)
    {
        $this->db->select('status');
        $this->db->where("id",$id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    public function get_last_ten_entries()
    {
        $this->db->select("{$this->table_name}.id,full_name,status,created_at,created_by,updated_at,updated_by,sys_user_group.name as group_name,sys_user_login.username as email");
        $this->db->from($this->table_name);
        $this->db->join('sys_user_login', "{$this->table_name}.id = sys_user_login.user_profile_id", 'LEFT');
        $this->db->join('sys_user_group', "{$this->table_name}.group_id = sys_user_group.id", 'LEFT');
        $this->db->limit(10);
        $this->db->order_by("{$this->table_name}.id", 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_row_by_id($id=null){
        $this->db->select("{$this->table_name}.id,full_name,group_id,status,sys_user_login.username as email");
        $this->db->from($this->table_name);
        $this->db->join('sys_user_login', "{$this->table_name}.id = sys_user_login.user_profile_id", 'LEFT');
        $this->db->where("{$this->table_name}.id",$id);
        $query = $this->db->get();
        return $query->row();

    }

    public function insert_entry($post)
    {
        $this->data['full_name'] = $post['full_name'];
        $this->data['status'] = $post['status'];
        $this->data['group_id'] = $post['group_id'];
        $this->data['created_by'] = $this->uesr_id;
        $this->data['created_at'] = _get_datetime();
        $this->data['updated_at'] = null;
        $this->data['updated_by'] = null;
        $this->db->insert($this->table_name, $this->data);
        return ($this->db->affected_rows() != 1) ? 0 : $this->db->insert_id();
    }

    public function update_entry($post)
    {
        $this->data['full_name'] = $post['full_name'];
        $this->data['status'] = $post['status'];
        $this->data['group_id'] = $post['group_id'];
        $this->data['updated_at'] = _get_datetime();
        $this->data['updated_by'] = $this->uesr_id;

        $this->db->where('id', $post['id']);
        $this->db->update($this->table_name,$this->data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_status($id, $status)
    {
        $this->data['status'] = $status;
        $this->data['updated_at'] = _get_datetime();
        $this->data['updated_by'] = $this->uesr_id;
        $this->db->update($this->table_name, $this->data, $id);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
