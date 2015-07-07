<?php defined('SYSPATH') OR die('No direct access allowed.');
class Promotion_Model extends Model {

    private $promotion_table;
    private $user_table;

    public function __construct()
    {
        parent::__construct();
        $this->promotion_table = 'tbl_promotions';
        $this->user_table = 'tbl_users';
    }

    public function create($data)
    {
        $this->db->insert($this->promotion_table, $data);
    }
    
    public function read($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->promotion_table);
        return $query->result_array();
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->promotion_table, $data, array('id' => $id));
    }
    
    public function get_promotions()
    {
        $this->db->select('*');
        $this->db->from($this->promotion_table);
        $this->db->join($this->user_table,'tbl_users.id', 'tbl_promotions.user_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}