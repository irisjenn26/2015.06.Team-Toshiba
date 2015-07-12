<?php defined('SYSPATH') OR die('No direc access allowed.');
class Send_Email_Controller extends Controller { 
	private $users_model;

	public function __construct(){
		parent::__construct();
			$this->users_model = new User_Model();
	}

	public function send_email($_subject, $_message, $_recipient){
		
		$swift = email::connect();

		$from = kohana::config("email.options.username");

		$users = $this->user_model->get_users();

		var_dump($users);

		$recipient = new Swift_RecipientList;



	}	
}