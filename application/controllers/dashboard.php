<?php defined('SYSPATH') or die('No direct script access.');
class Dashboard_Controller extends Private_Template_Controller {
   
    public function index()
    {
        $this->template->title = 'Merchantilia';
        $this->template->scripts = html::script('media/js/dashboard.js');
        $this->template->body->content = View::factory('dashboard');
    }

    public function update()
    {
    
    	$this->auto_render = FALSE;
    	$total = new Sales_MOdel();
    	$month = new Sales_MOdel();
		$year = new Sales_MOdel();

    	$total_income = $total->get_total_income();
    	$monthly_income = $month->get_monthly_income($month);
    	$yearly_income = $year->get_yearly_income($year);

    	$data = array(
    		'total' => $total_income,
    		'month' => $monthly_income,
    		'year' => $yearly_income
    		);
    	echo json_endcode($data);
    } 
}