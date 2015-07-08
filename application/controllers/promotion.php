<?php defined('SYSPATH') OR die('No direct access allowed.');
class Promotion_Controller extends Private_Template_Controller {

	private $promotion_model;
    private $promotion_view;

	public function index()
	{
		$this->template->title   = 'Promotions';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		$this->show_promotions_list();
	}

     private function show_promotions_list()
    { 
        $this->promotion_model = new Promotion_Model();
        $promotions_list = $this->promotion_model->get_promotions();
      
        $this->template->body->content = View::factory('admin/promotion')
                ->set('promotions_list', $promotions_list);
    }
    public function show_add()
    {
        $this->template->title = 'New Promotion';
        $this->template->body->content = View::factory('admin/create_promotion');

    } 
    
	public function create_promotion()
	{
		$this->auto_render   = FALSE;
		$this->promotion_model = new Promotion_Model();
		$data = array(
			'description'   => $this->input->post('date_requested'),
			'start_date'    =>  $this->input->post('start_date'),
			'end_date'      =>  $this->input->post('end_date'),
			'status'        =>  $this->input->post('status')
		);
		
		$this->promotion_model->create($data);

		url::redirect('admin/promotion');
	}
}