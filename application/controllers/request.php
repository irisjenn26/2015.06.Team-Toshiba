<?php defined('SYSPATH') OR die('No direct access allowed.');
class Request_Controller extends Private_Template_Controller {

	private $request_model;
    private $requests_view;

	public function index()
	{
		$this->template->title   = 'Request';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		$this->show_requests_list();
	}

     private function show_requests_list()
    { 
        $this->request_model = new Request_Model();
        $requests_list = $this->request_model->get_requests();
      
        $this->template->body->content = View::factory('request')
                ->set('requests_list', $requests_list);
    }
    public function show_add()
    {
        $this->template->title = 'New Request';
        $this->template->body->content = View::factory('create_request');

    } 
    
	public function create_request()
	{
		$this->auto_render   = FALSE;
		$this->request_model = new Request_Model();
		$data = array(
			'date_requested'   => $this->input->post('date_requested'),
			'date_needed'      =>  $this->input->post('date_needed'),
			'delivery_address' =>  $this->input->post('delivery_address'),
			'request_item'     =>  $this->input->post('request_item'),
			'quantity'         =>  $this->input->post('quantity'), 
		);
		
		$this->request_model->create($data);

		url::redirect('request');
	}
}