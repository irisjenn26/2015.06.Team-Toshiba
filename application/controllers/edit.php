<?php defined('SYSPATH') or die('No direct script access.')
	class Edit_Controller extends Private_Template_Controller {
		function __construct(){
			parent::__construct();
			this->template->script = html::script('media/js/.js');
		}
		// edit and save of user
		public function edit_user()
		{
			$this->auto_render = FALSE;
			$this->user_models = new User_Model();
			$user = $this->user_model->get_user($id);

			$params = array(
						'firstname'		=> $user->firstname,
						'lastname' 		=> $user->lastname,
						'group_id' 		=> $user->acct_type,
						'address'		=> $user->address,
						'password'		=> $user->password,
						'username'		=> $user->username,
						'country'		=> $user->country,
						'postalcode'	=> $user->postalcode,
						'town_city'		=> $user->town_city,
						'address'		=> $user->comp_address,
						'contact_no'	=> $user->contact_no,
						'email'			=> $user->email,
						'name'			=> $user->comp_name
				);
			$this->template->body->content = View::factory('create_user', $params);
		}

		public function save_user()
		{
			$this->auto_render = FALSE;
			$this->user_model  = new User_Model();
			$data_user = array(
				'firstname' =>  $this->input->post('firstname'),
				'lastname'  =>  $this->input->post('lastname'),
				'group_id'  =>  $this->input->post('acct_type'),
				'address'   =>  $this->input->post('address'),
				'password'  =>  $this->input->post('password'),
				'username'  =>  $this->input->post('username'), 
			);
			$repassword = $this->input->post('repassword');
			//$pass_check =
			//var_dump($data_user);
			$data_info = array(
				'country'    => $this->input->post('country'),
				'postalcode' => $this->input->post('postalcode'),
				'town_city'  => $this->input->post('town_city'), 
				);
				$data_comp = array(
				'address'    => $this->input->post('comp_address'),
				'contact_no' => $this->input->post('contact_no'),
				'email'      => $this->input->post('email'),
				'name'       => $this->input->post('comp_name')
				);
			$this->user_model->create_user($data_user);
			$this->user_model->create_info($data_info);
			$this->user_model->create_comp($data_comp);
			

			url::redirect('../user');
		}

		// edit and save of supply
		public function edit_supply()
		{
			$this->auto_render = FALSE;
			$this->supply_models = new Supply_Model();
			$supply = $this->supply_model->get_supply($id);

			$params = array(
						'date_acquired'		=> $supply->date_acquired,
						'number_of_supply' 	=> $supply->number,
						'hardware_type' 	=> $supply->hardware_type,
						'item'				=> $supply->item,
						'manufacturer'		=> $supply->manufacturer,
						'description'		=> $supply->description,
						'status'			=> $supply->status,
						'price'				=> $supply->price
						);
			$this->template->body->content = View::factory('create_supply', $params);
		}

		public function save_supply()
		{
			$this->auto_render = FALSE;
	        $this->supply_model  = new Supply_Model();
	              
	        $data_supply = array(
	            'date_acquired'     =>  $this->input->post('date_acquired'),
	            'number_of_supply'  =>  $this->input->post('number'), 
	            'hardware_type'     =>  $this->input->post('hardware_type'),
	            'item'              =>  $this->input->post('item'),
	            'manufacturer'      =>  $this->input->post('manufacturer'),
	            'description'       =>  $this->input->post('description'),
	            'status'            =>  $this->input->post('status'),  
	            'price'             =>  $amount = $this->input->post('price')
	        );
	        $this->supply_model->create($data_supply);
	        url::redirect('../supply');
		}
		// edit and save of request
		public function edit_request()
		{
			$this->auto_render = FALSE;
			$this->request_model = new Request_Model();
			$request = $this->request_model->get_request($id);

			$params = array(
						'date_requested'		=> $request->date_requested,
						'date_needed' 			=> $request->date_needed,
						'delivery_address' 		=> $request->delivery_address,
						'request_item'			=> $request->request_item,
						'quantity'				=> $request->quantity
				);
			$this->template->body->content = View::factory('create_request', $params);
		}

		public function save_request()
		{
			$this->auto_render   = FALSE;
			$this->request_model = new Request_Model();
			$data = array(
				'date_requested'   => $this->input->post('date_requested'),
				'date_needed'      =>  $this->input->post('date_needed'),
				'delivery_address' =>  $this->input->post('delivery_address'),
				'request_item'     =>  $this->input->post('request_item'),
				'quantity'         =>  $this->input->post('quantity')
			);
			
			$this->request_model->create($data);

			url::redirect('../request');
		}

		// edit and save of invoice
		public function edit_invoice()
		{

		}

		public function save_invoice()
		{

		}

		// edit and save of promotion
		public function edit_promotion()
		{

		}

		public function save_promotion()
		{

		}

	}