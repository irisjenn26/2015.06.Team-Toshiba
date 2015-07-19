<?php defined('SYSPATH') or die('No direct script access.');
class Login_Controller extends Public_Template_Controller {
	
    private $login_model;
    private $user_model;
    private $login_view;
    private $error;
    private $users_model;
    private $role;

    public function __construct()
    {
        parent::__construct();
        
        $this->user_model = new Tbl_User_Model();
        $this->role = new Group_Model();
       
    }
	
    public function index()
	{


        $this->template->title = 'Login::Merchant';
        //$this->template->scripts = html::script('media/js/login.js');
        $this->template->body = View::factory('login');
	}
    
    public function logout()
    {
            $this->session = Session::instance();
            $this->session->destroy();
            url::redirect('login');
    }
    
    public function process_login()
    {   
        $this->auto_render = FALSE;
        $username    = $this->input->post('username');
        $get_user    = $this->user_model->get_user($username);
        $password    = $this->input->post('password');    
        $pass = $get_user->password; 
        $role_name = $role->read($get_user->group_id);
                
                if($pass == $password)
                {
                $this->session->set(array(
                        'id'         => $get_user->id,
                        'group_id'   => $get_user->group_id,
                        'username'   => $get_user->username,
                        'firstname'  => $get_user->firstname,
                        'lastname'   => $get_user->lastname,
                        //'permission' => $get_user->permission,
                        'name'       => $get_user->name,
                        'role'       => $role_name[0]->name
                ));
                $this->session->set('permission',$get_user->permission);
                url::redirect('dashboard');
                } 
                else
                {
                    $error = 'Password Incorrect';
                    echo javascript::alert($error);
                }
    }

    public function pass()
    {
        $this->template->title = 'Login::Merchant';
        $this->template->body = View::factory('forget_pass');       
    }

    public function forget_pass()
    {
            //$this->users_model = new User_Model();
            
            $email =  $this->input->post('email');
            //var_dump($email);
            
            $this->user_model = new Tbl_User_Model();
            $get_email = $this->user_model->get_email($email);
            var_dump($get_email);
            
            //$this->users_model->update();
            
            if($get_email->loaded == TRUE){
                $send_mail = new Email_Controller();
                $subject = "Merchantilia::Forgot Password";
                $message = "Click on link to change Password
                            <br/> 
                            <a href ='localhost/2015.06.toshiba/users'> 
                            Click Here </a>";
                $send_mail->send_password($subject, $message, $email);
            
            }
            else
            {
                echo "we can't process your request right now";

            }
    }
}