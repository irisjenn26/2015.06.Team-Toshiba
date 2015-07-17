<?php defined('SYSPATH') OR die('No direct access allowed.');
class Log_Model extends Model {

    private $log_table;
    private $user_table;

    public function __construct()
    {
        parent::__construct();
        $this->log_table = 'tbl_logs';
        $this->user_table = 'tbl_users';
    }
    
    public function create($data)
    {
        $this->db->insert($this->log_table, $data);
    }

    public function get_logs()
    {
        $this->db->select('*');
        $this->db->from($this->log_table);
        $this->db->join($this->user_table,'tbl_users.id', 'tbl_logs.user_id');
        $this->db->orderby('date','DESC');
        $this->db->limit(15);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_all_logs() {
        $this->db->select('*');
        $this->db->from($this->log_table);
        $this->db->join($this->user_table,'tbl_users.id', 'tbl_logs.user_id');
        $this->db->orderby('date','DESC');
        $this->db->get();
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>