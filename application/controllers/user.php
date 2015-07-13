<?php defined('SYSPATH') OR die('No direct access allowed.');
class User_Controller extends Private_Template_Controller {

	private $user_model;
    //private $user_edit_model;

	
function __construct(){
	parent::__construct();
	//$this->user_edit_model = new Tbl_User_Model();
	//$this->template->scripts = script();
    //$this->template->body->content = View::factory('client/register');
    //$this->template->body->content .= View::factory('client/register')->render(TRUE);
    $this->template->body->content = view::factory('user_list');
    $this->user_model = new User_Model();	
}
    
    public function index()
	{
		 $this->template->title = 'User List';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		 $this->show_users_list();

		
	}
	
	// public function show_user()
	// {
	// 	$this->template->title = 'User Registration';
	// 	$this->template->body->content = View::factory('create_user');
	// }
	
	 private function show_users_list()
    { 
        $users_list = $this->user_model->get_users();
        $this->template->body->content = View::factory('user_list')
             					       ->set('users_list', $users_list);
   }
   
	//public function show_create()
	//{
	//	$this->template->title = 'User Registration';
	//	$this->template->body->content = View::factory('client/register')->render();
	//}
	
	public function create_clerk()
	{	
		$this->auto_render = FALSE;
		$this->user_model  = new User_Model();
		$data_user = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  $this->input->post('acct_type'),
			'address'   =>  $this->input->post('address'),
			'password'  =>  md5(sha1($this->input->post('password'))),
			'username'  =>  $this->input->post('username'), 
		);
		$repassword = $this->input->post('repassword');
		$this->user_model->create_user($data_user);
		
		url::redirect('user');
	}
	
    public function edit($id)
    {
        // $this->user_model = new User_Model();
        // $users_list = $this->user_model->get_users();
        // $this->template->body->content = View::factory('user_list')
        //      ->set('users_list', $users_list);

    	$this->template->title   = 'User::Update';
        $user_data = $this->user_model->read($id);
        $this->template->body->content =view::factory('update_user_employees')
        							   ->set('user_data', $user_data);
    }

    public function update($id)
    {   
        $data_user = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  $this->input->post('acct_type'),
			'address'   =>  $this->input->post('address'),
			'password'  =>  md5(sha1($this->input->post('password'))),
			'username'  =>  $this->input->post('username'), 
		);            
        $this->user_model->update($id,$data_user);
        url::redirect('/user');
    }
}