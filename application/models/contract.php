<?php defined('SYSPATH') OR die('No direct access allowed.');
class Contract_Model extends Model {

    private $contract_table;

    public function __construct()
    {
        parent::__construct();
        $this->contract_table = 'tbl_contracts';
    }

    public function create($data)
    {
        $this->db->insert($this->contract_table, $data);
    }
    
    public function read($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->contract_table);
        return $query->result_array();
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->contract_table, $data, array('id' => $id));
    }
    
    public function get_contract()
    {
        $this->db->select('*');
        $this->db->from($this->contract_table);
        $query = $this->db->get();
        return $query->result_array();
    }

}