<?php defined('SYSPATH') OR die('No direct access allowed.');
class Request_Controller extends Private_Template_Controller {

	private $request_model;

	public function index()
	{
		$this->template->title   = 'Request';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		$this->template->body->content = View::factory('admin/create_request');
	}

	public function request_supply()
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