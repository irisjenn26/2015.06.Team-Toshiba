<?php defined('SYSPATH') OR die('No direct access allowed.');
class User_Model extends Model {

		private $info_table;
		private $user_table;
		private $comp_table;
		private $group_table;

		public function __construct()
		{
			parent::__construct();
			$this->info_table = 'tbl_clients_info';
			$this->user_table = 'tbl_users';
			$this->comp_table = 'tbl_companies';
			$this->group_table = 'tbl_groups';
		}

		public function create_user($data_user)
		{
			$this->db->insert($this->user_table, $data_user);
		}
		
        public function create_comp($data_comp)
		{
			$this->db->insert($this->comp_table, $data_comp);
		}
		
        public function create_info($data_info)
		{
			$this->db->insert($this->info_table, $data_info);
		}
		
        public function read($id) 
    	{
	        $this->db->where('id', $id);
	        $query = $this->db->get($this->user_table);
        return $query->result_array();
    	}
    	
        public function update($id, $data)
    	{
        	$this->db->update($this->user_table, $data, array('id' => $id));
    	}

    	public function update_password($id,$email)
    	{
    		$this->db->update($this->user_table, $email, array('id' => $id));
    	}
		
        public function get_users() 
    	{
	        $this->db->select('tbl_users.id as id, tbl_users.firstname as firstname, tbl_users.lastname as lastname, tbl_users.username as username,tbl_groups.name as name');
	        $this->db->from($this->user_table);
			$this->db->join($this->group_table, 'tbl_groups.id', 'tbl_users.group_id');
	        $query = $this->db->get();
	        return $query->result_array();
    	}
}