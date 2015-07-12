<?php defined('SYSPATH') OR die('No direct access allowed.');
class User_Controller extends Private_Template_Controller {

	private $user_model;
        private $user_edit_model;

	
function __construct(){
	parent::__construct();
	
	//$this->template->scripts = script();
    //$this->template->body->content = View::factory('client/register');
    $this->template->body->content = view::factory('user_list');
    //$this->template->body->content .= View::factory('client/register')->render(TRUE);
	
}
    
    public function index()
	{
		 $this->template->title = 'User List';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		 $this->show_users_list();

		
	}
	
	 public function show_user()
	{
		$this->template->title = 'User Registration';
		$this->template->body->content = View::factory('create_user');

	}
	
	 private function show_users_list()
    { 
        $this->user_model = new User_Model();
        $users_list = $this->user_model->get_users();
      
        $this->template->body->content = View::factory('user_list')
             ->set('users_list', $users_list);
   }
   
	//public function show_create()
	//{
//		$this->template->title = 'User Registration';
//		$this->template->body->content = View::factory('client/register')->render();

//	}
	
	public function create_clerk()
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
		$this->user_model->create_user($data_user);
		
		url::redirect('user');
	}
	
public function create_client()
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
		

		url::redirect('user');
	}
        
         public function show_update_editor($id)
    {
        
        $user_data = $this->user_model->read($id);
        $this->template->body->content =view::factory('update_user',$user_data);
    }

    public function update()
    {   $user_edit_model = new Tbl_User_Model();
                $firstname      = $this->input->post('firstname');
                $lastname       = $this->input->post('lastname');
                $address        = $this->input->post('address');
                $del_status        = $this->input->post('del_status');
            
        $user_edit_model->update($this->input->post('id'),$firstname, $lastname, $address, $del_status);
        url::redirect('user_list');
    }
}