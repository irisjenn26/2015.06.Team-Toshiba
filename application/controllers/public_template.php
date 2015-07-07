<?php defined('SYSPATH') or die('No direct script access.');
class Public_Template_Controller extends Template_Controller {
	public $template = 'public_view_template';
    
   // $this->check_login();
    public function __construct()
    {
        parent::__construct();
        
        //load css files array.
        $this->template->styles = html::stylesheet(array('media/css/tooplate_style.css',
                                                         'media/css/nivo-slider.css', 
                                                         'media/css/kube.min.css'),
                                                   array('screen',
                                                         'screen',
                                                         'screen')
                                                   ,FALSE);
        //load javascript files array.
        $this->template->scripts = html::script(array(
            'media/js/jquery-1.11.3.js',
            'media/js/jquery.js',
            'media/js/jquery.nivo.slider.js'), 
            FALSE);

        //start new session.
        $this->session = Session::instance(); 
        
    }
    
}