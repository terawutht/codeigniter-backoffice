<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserGroup_model extends CI_Model
{
    var $table_name;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_user_group';
    }

    public function get_all_entries()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_all_at_enable()
    {
        $this->db->where('status','enable');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get($this->table_name, 10);
        return $query->result();
    }

    public function insert_entry($action = '', $status = '')
    {
        $this->data['module'] = $this->module;
        $this->data['action'] = $action;
        $this->data['status'] = $status;
        $this->data['created_by'] = $this->uesr_id;
        $this->data['created_at'] = _get_datetime();
        $this->db->insert($this->table_name, $this->data);
    }

    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}