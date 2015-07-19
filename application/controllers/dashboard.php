<?php defined('SYSPATH') or die('No direct script access.');
class Dashboard_Controller extends Private_Template_Controller {
   
    private $total;
    private $month;
    private $year;

   public function __construct()
   {
        parent::__construct();
        $this->total = new Sales_Model();
        $this->month = new Sales_Model();
        $this->year  = new Sales_Model();
   }

    public function index()
    {
        $total_income   = $this->total->get_total_income();
        $monthly_income = $this->month->get_monthly_income(date("Y/m/d"));
        $yearly_income  = $this->year->get_yearly_income(date("Y/m/d"));

        $this->template->title         = 'Merchantilia';
        $this->template->scripts       = html::script('media/js/dashboard.js');
        $this->template->body->content = View::factory('dashboard')
                                       ->set('total_income',$total_income)
                                       ->set('monthly_income',$monthly_income)
                                       ->set('yearly_income',$yearly_income);
    }

    public function update()
    {
    
    	$this->auto_render = FALSE;

    	$total_income   = $this->total->get_total_income();
    	$monthly_income = $this->month->get_monthly_income(date("Y/m/d"));
    	$yearly_income  = $this->year->get_yearly_income(date("Y/m/d"));

    	$data = array(
    		'total' => $total_income,
    		'month' => $monthly_income,
    		'year' => $yearly_income
    		);
    	echo json_endcode($data);
    } 
}