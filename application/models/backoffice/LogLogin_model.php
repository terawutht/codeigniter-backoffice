<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LogLogin_model extends CI_Model
{
    var $table_name;
    var $data;

    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'sys_log_login';
    }

    public function get_all_entries()
    {
        $this->db->select("*");
        $this->db->order_by("{$this->table_name}.id","desc");
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
        $this->data['username'] = !empty($this->input->post('username'))?$this->input->post('username'):NULL;
        $this->data['action'] = $action;
        $this->data['status'] = $status;
        $this->data['user_id'] = $this->session->has_userdata('user_id')?$this->session->userdata('user_id'):NULL; 
        $this->data['date'] = _get_datetime();
        $this->db->insert($this->table_name, $this->data);
    }

    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}