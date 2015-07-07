<?php defined('SYSPATH') OR die('No direct access allowed.');
class Logout_Controller extends Public_Template_Controller {


	public function index() {
            $this->session = Session::instance();
            $this->session->destroy();
            url::redirect('login');
	}
} // End Welcome Controller