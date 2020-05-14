<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LogActivity_model extends CI_Model
{
    var $table_name;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_log_activity';
    }

    public function get_all_entries()
    {
        $this->db->select("{$this->table_name}.*,sys_user_profile.full_name");
        $this->db->from($this->table_name);
        $this->db->join('sys_user_login',"{$this->table_name}.created_by = sys_user_login.id",'LEFT');
        $this->db->join('sys_user_profile',"sys_user_login.user_profile_id = sys_user_profile.id",'LEFT');
        $this->db->order_by("{$this->table_name}.id","desc");
        $query = $this->db->get();
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
