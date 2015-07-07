<?php defined('SYSPATH') or die('No direct access allowed.');

class Sales_Model extends Model
{
    private $sales_table;
    private $requests_table;
    private $users_table;
    
    public function __construct() 
    {
            parent::__construct();
        $this->sales_table = 'tbl_invoices';
        $this->requests_table = 'tbl_requests';
        $this->users_table = 'tbl_users';
    }
    
    public function create($data) 
    {
        $this->db->insert($this->sales_table, $data);
    }
    
    public function read($id) 
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->sales_table);
        return $query->result_array();
    }
    
    public function update($id, $data)
    {
        $this->db->update($this->sales_table, $data, array('id' => $id));
    }
    
    public function get_sales() 
    {
        $this->db->select('*');
        $this->db->from($this->sales_table);
        $this->db->join($this->requests_table, 'tbl_request.id');
        $this->db->join($this->users_table,'tbl_users.id');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_total_income()
    {
        $query = $db->query('SELECT CASE STATUS WHEN "P" THEN SUM(total_amount) END FROM tbl_invoices ');
        return $query;
    }

    public function get_monthly_income($month)
    {
        $query = $db->query("SELECT CASE EXTRACT(MONTH FROM date_purchased) WHEN '$month' THEN SUM(total_amount) END FROM tbl_invoices");
        return $query;
    }
    public function get_yearly_income($year)
    {
        $query = $db->query("SELECT CASE EXTRACT(YEAR FROM date_purchased) WHEN '$year' THEN SUM(total_amount) END FROM tbl_invoices");
        return $query;
    }
}
?>

