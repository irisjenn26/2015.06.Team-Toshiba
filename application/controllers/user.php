<?php defined('SYSPATH') OR die('No direct access allowed.');
class User_Controller extends Private_Template_Controller {

	private $user_model;
	
	function __construct(){
		parent::__construct();
		
	    $this->template->body->content = view::factory('user_list');
	    $this->user_model = new User_Model();	
	}
    
    public function index()
	{
		 $this->template->title = 'User List';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		 $this->show_users_list();

		
	}
	
	private function show_users_list()
        { 
        $users_list = $this->user_model->get_users();
        $this->template->body->content = View::factory('user_list')
             					       ->set('users_list', $users_list);
        }
   
	public function view($id)
        {
        $user_information = $this->user_model->read($id);
        $this->template->body->content = view::factory('view_user')
                                       ->set('user_information',$user_information);
        } 
	
	public function create_clerk()
	{	
		
		$data = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  $this->input->post('acct_type'),
			'address'   =>  $this->input->post('address'),
			'password'  =>  md5(sha1($this->input->post('password'))),
			'username'  =>  $this->input->post('username'),
			'delstatus'         =>  'true' 
		);
		$errors = array(
			'firstname' =>  '',
			'lastname'  =>  '',
			'group_id'  =>  '',
			'address'   =>  '',
			'password'  =>  '',
			'username'  =>  '', 
		);

		if(isset($data)){

				$post = new Validation($data);

				$post->pre_filter('trim', TRUE);
				$post->pre_filter('ucfirst', 'firstname');
				$post->pre_filter('ucfirst', 'lastname');
				
				$post->add_rules('firstname', 'required', 'alpha');
				$post->add_rules('lastname',  'required', 'alpha');
				$post->add_rules('group_id',  'required');
				$post->add_rules('address',   'required', 'standard_text');
				$post->add_rules('password',  'required', 'alpha_numeric');
				$post->add_rules('username',  'required', 'alpha_dash');
				
				if($post->validate())
				{
					//$repassword = $this->input->post('repassword');
					$this->user_model->create_user($data);
					url::redirect('user');
				}
				else
				{
					$data = arr::overwrite($data, $post->as_array());
                	$data = arr::overwrite($errors, $post->errors('form_error_messages'));
                	url::redirect('user');
				}
		}	
	}
	
	        
    public function edit($id)
    {

    	$this->template->title   = 'Merchant::Update User';
        $user_data = $this->user_model->read($id);
        $this->template->body->content =View::factory('update_user_employees')
        							   ->set('user_data', $user_data);
    }

    public function update($id)
    {   
        $data = array(
			'firstname' =>  $this->input->post('firstname'),
			'lastname'  =>  $this->input->post('lastname'),
			'group_id'  =>  $this->input->post('acct_type'),
			'address'   =>  $this->input->post('address'),
			'password'  =>  md5(sha1($this->input->post('password'))),
			'username'  =>  $this->input->post('username'), 
		);
		$errors = array(
			'firstname' =>  '',
			'lastname'  =>  '',
			'group_id'  =>  '',
			'address'   =>  '',
			'password'  =>  '',
			'username'  =>  '', 
		);

		if(isset($data)){

				$post = new Validation($data);

				$post->pre_filter('trim', TRUE);
				$post->pre_filter('ucfirst', 'firstname');
				$post->pre_filter('ucfirst', 'lastname');
				
				$post->add_rules('firstname', 'required', 'alpha');
				$post->add_rules('lastname',  'required', 'alpha');
				$post->add_rules('group_id',  'required');
				$post->add_rules('address',   'required', 'standard_text');
				$post->add_rules('password',  'required', 'alpha_numeric');
				$post->add_rules('username',  'required', 'alpha_dash');
				
				if($post->validate())
				{
					//$repassword = $this->input->post('repassword');
					$this->user_model->update($id,$data);
        			url::redirect('/user');
				}
				else
				{
					$data = arr::overwrite($data, $post->as_array());
                	$data = arr::overwrite($errors, $post->errors('form_error_messages'));
                	url::redirect('user');
				}
		}	            
    }
}