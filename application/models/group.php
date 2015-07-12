<?php defined('SYSPATH') or die('No direct access allowed.');

class Group_Model extends Model
{
    private $group_table;
    
    public function __construct() 
    {
            parent::__construct();
        $this->group_table = 'tbl_groups';
    }
    
    public function create($data) 
    {
        $this->db->insert($this->group_table, $data);
    }
    
    public function read($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->group_table);
        return $query->result_array();
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->group_table, $data, array('id' => $id));
    }
    
    public function get_groups() 
    {
        $this->db->select('*');
        $this->db->from($this->group_table);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>

