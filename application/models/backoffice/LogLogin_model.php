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

    public function get_list_by_filter($page)
    {
        $username = $this->input->get('username');
        $this->db->select("*");
        ($page > 1) ? $this->db->limit(10, ($page * 10)-10) : $this->db->limit(10);
        if ($username) $this->db->like('username', $username);
        $this->db->order_by("id", "desc");
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_num_rows()
    {
        $query = $this->db->get($this->table_name);
        return $query->num_rows();
    }

    public function get_all_entries()
    {
        $this->db->select("*");
        $this->db->order_by("{$this->table_name}.id", "desc");
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    public function get_last_ten_entries()
    {
        $this->db->order_by("{$this->table_name}.id", "desc");
        $query = $this->db->get($this->table_name, 10);
        return $query->result();
    }

    public function insert_entry($action = '', $status = '')
    {
        $username = '';
        if (!empty($this->input->post('username'))) {
            $username = $this->input->post('username');
        } elseif ($this->session->has_userdata('email')) {
            $username = $this->session->userdata('email');
        }
        $this->data['username'] = $username;
        $this->data['action'] = $action;
        $this->data['status'] = $status;
        $this->data['date_time'] = _get_datetime();
        $this->db->insert($this->table_name, $this->data);
    }

    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
