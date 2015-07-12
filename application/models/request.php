<?php defined('SYSPATH') OR die('No direct access allowed.');
class Request_Model extends Model {

    private $request_table;
    private $user_table;

    public function __construct()
    {
        parent::__construct();
        $this->request_table = 'tbl_requests';
        $this->user_table = 'tbl_users';
    }

    public function create($data)
    {
        $this->db->insert($this->request_table, $data);
    }
    
    public function read($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->request_table);
        return $query->result_array();
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->request_table, $data, array('id' => $id));
    }
    
    public function get_requests()
    {
        $this->db->select('*');
        $this->db->from($this->request_table);
        $this->db->join($this->user_table,'tbl_users.id', 'tbl_requests.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>