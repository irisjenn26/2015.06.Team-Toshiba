<?php defined('SYSPATH') or die('No direct access allowed.');

class Manufacturer_Model extends Model
{
    private $man_table;
    
    public function __construct() 
    {
            parent::__construct();
        $this->man_table = 'tbl_manufacturers';
    }
    
    public function create($manufacturer) 
    {
        $this->db->insert($this->man_table, $manufacturer);
    }
    
    public function read($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->man_table);
        return $query->result_array();
    }
    
    public function update($id, $manufacturer)
    {
        $this->db->update($this->man_table, $manufacturer, array('id' => $id));
    }
    
    public function get_manufacturer() 
    {
        $this->db->select('*');
        $this->db->from($this->man_table);
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>

