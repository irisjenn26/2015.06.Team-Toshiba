<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Private_Template_Controller extends Public_Template_Controller {

function __construct(){
	parent::__construct();
	
   //load Javascript files array.
   $this->template->styles .= html::stylesheet( array ( '/media/css/jquery-ui.css',
                                                        '/media/css/jquery.dataTables.css',
                                                        'media/css/jquery.lightbox-0.5.css',
                                                        'media/css/jquery.fancybox.css'),
											                          array ( 'screen',
                                                        'screen',
                                                        'screen'),
                                                FALSE);
   // Load Javascript files array.
   $this->template->scripts .= html::script( array ( 'media/js/jquery-ui.js',
                                                     'media/js/jquery.dataTables.js',
                                                     'media/js/jquery.lightbox-0.5.js',
                                                     'media/js/jquery.fancybox.js',
                                                     'media/js/jquery.fancybox-buttons.js',
                                                     'media/js/jquery.fancybox-media.js',
                                                     'media/js/jquery.fancybox-thumbs.js',
                                                     'media/js/jquery.mousewheel-3.0.6.pack.js'), 
                                             FALSE);
   // Get current session information.
   $this->session = Session::instance()->get();
   
   //load title and the view, private_view_template.

   $this->template->body = View::factory('private_view_template');
}


} // End Welcome Controller