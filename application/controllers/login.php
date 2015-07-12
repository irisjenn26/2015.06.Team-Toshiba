<?php defined('SYSPATH') or die('No direct script access.');
class Login_Controller extends Public_Template_Controller {
	
    private $login_model;
    private $login_view;
    private $error;

	
    public function index()
	{

        $this->template->title = 'Login::Merchant';
        $this->template->scripts = html::script('media/js/login.js');
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
        $this->user_model = new Tbl_User_Model();
        $get_user    = $this->user_model->get_user($username);
        
        $password    = $this->input->post('password');    
        //if ($get_user->loaded == TRUE)
        //{
           
                $pass = $get_user->password;
                
                if($pass == $password)
                {
                $this->session->set(array(
                        'id'         => $get_user->id,
                        'group_id'   => $get_user->group_id,
                        'username'   => $get_user->username,
                        'firstname'  => $get_user->firstname,
                        'lastname'   => $get_user->lastname,
                        'permission' => $get_user->permission
                ));
                $permission =$_SESSION['permission'];
                $perArr = json_decode($permission,true);
                        if(in_array("Can_view_Dashboard",$perArr)){
                            url::redirect('dashboard');
                        }
                        else
                        {
                             url::redirect('supply');
                        }
                } 
                else
                {
                    $error = 'Password Incorrect';
                    echo javascript::alert($error);
                }

        /*}
        else if (! $username && ! $password)
        {
                    $error = ' Please Input Username and Password';
                    //echo javascript::alert(' Please Input Username and Password');
            }
            else
            {
                    $error = 'Username Incorrect';
            }*/
    }
}