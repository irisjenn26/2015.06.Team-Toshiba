<?php defined('SYSPATH') or die('No direct script access.');
class Dashboard_Controller extends Private_Template_Controller {
   
    public function index()
    {
        $this->template->title = 'Login::Merchant';
        $this->template->body->content = View::factory('dashboard');
    }
    
}