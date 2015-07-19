<?php defined('SYSPATH') OR die('No direct access allowed.');
class Client_Controller extends Public_Template_Controller {

			private $user_model;
    //private $user_edit_model;

	
	public function __construct()
	{
			parent::__construct();
		    $this->user_model = new User_Model();	
	}
    
     
	public function index()
    {
		$this->template->body = View::factory('create_client');
    } 
		
	public function create_client()
	{	
		$this->auto_render = FALSE;
		$data = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  4,
			'address'   =>  $this->input->post('address'),
			'password'  =>  $this->input->post('password'),
			'username'  =>  $this->input->post('username'), 
		);
		$repassword = $this->input->post('repassword');
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
		$this->user_model->create_user($data);
		$this->user_model->create_info($data_info);
		$this->user_model->create_comp($data_comp);
		

		url::redirect('user');
	}
        
    public function edit($id)
    {
       
    	$this->template->title   = 'Merchant::Update User';
        $user_data = $this->user_model->read($id);
        $this->template->body->content =view::factory('update_user_client')
        							   ->set('user_data', $user_data);
    }

    public function update($id)
    {   
        $this->auto_render = FALSE;
		$data = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  4,
			'address'   =>  $this->input->post('address'),
			'password'  =>  $this->input->post('password'),
			'username'  =>  $this->input->post('username'), 
		);

		$repassword = $this->input->post('repassword');
		
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
		$this->user_model->update($data);
		$this->user_model->update_info($data_info);
		$this->user_model->update_comp($data_comp);
		

		url::redirect('user');
    }

    public function pwd_check()
    {

    }
}