<?php defined('SYSPATH') OR die('No direct access allowed.');
class Request_Controller extends Private_Template_Controller {

	private $request_model;
    private $requests_view;

    public function __construct(){
    	parent::__construct();
    	$this->request_model = new Request_Model();
    }

	public function index()
	{
		$this->template->title   = 'Request';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		$this->show_requests_list();
	}

    private function show_requests_list()
    { 
        
        $requests_list = $this->request_model->get_requests();
        $this->template->body->content = View::factory('request')
                ->set('requests_list', $requests_list);
    } 
    
	public function create_request()
	{
		$this->auto_render   = FALSE;
		$data = array(
			'date_requested'   =>  $this->input->post('date_requested'),
			'date_needed'      =>  $this->input->post('date_needed'),
			'user_id'		   =>  $_SESSION['id'],
			'delivery_address' =>  $this->input->post('delivery_address'),
			'request_item'     =>  $this->input->post('request_item'),
			'quantity'         =>  $this->input->post('quantity'),
			'delstatus'        =>  'true' 
		);
		$errors = array(
			'date_requested'   =>  '',
			'date_needed'      =>  '',
			'delivery_address' =>  '',
			'request_item'     =>  '',
			'quantity'         =>  '' 
		);

			if(isset($data))
			{
				$post = new Validation($data);

				$post->pre_filter('trim', TRUE);
				$post->pre_filter('ucfirst', 'request_item');

				$post->add_rules('date_requested', 'required');
				$post->add_rules('date_needed', 'required');
				$post->add_rules('delivery_address', 'required', 'standard_text');
				$post->add_rules('request_item', 'required');
				$post->add_rules('quantity', 'required', 'numeric');
					
				if($post->validate())
				{
					$this->request_model->create($data);
					url::redirect('request');
				}
				else
				{
					$data = arr::overwrite($data, $post->as_array());
                	$data = arr::overwrite($errors, $post->errors('form_error_messages'));
                	url::redirect('request');
				}
			}
	}

	public function edit($id)
    {	
    	$this->template->title   = 'Merchant::Update Request';
        $request_data = $this->request_model->read($id);
        $this->template->body->content =view::factory('update_request')->set('request_data',$request_data);
    }

    public function update($id)
    {   
            $this->auto_render   = FALSE;
		$data = array(
			'date_requested'   =>  $this->input->post('date_requested'),
			'date_needed'      =>  $this->input->post('date_needed'),
			'user_id'		   =>  $_SESSION['id'],
			'delivery_address' =>  $this->input->post('delivery_address'),
			'request_item'     =>  $this->input->post('request_item'),
			'quantity'         =>  $this->input->post('quantity'),
			'delstatus'        =>  'true' 
		);
		$errors = array(
			'date_requested'   =>  '',
			'date_needed'      =>  '',
			'delivery_address' =>  '',
			'request_item'     =>  '',
			'quantity'         =>  '' 
		);

			if(isset($data))
			{
				$post = new Validation($data);

				$post->pre_filter('trim', TRUE);
				$post->pre_filter('ucfirst', 'request_item');

				$post->add_rules('date_requested', 'required');
				$post->add_rules('date_needed', 'required');
				$post->add_rules('delivery_address', 'required', 'standard_text');
				$post->add_rules('request_item', 'required');
				$post->add_rules('quantity', 'required', 'numeric');
					
				if($post->validate())
				{
					$this->request_model->update($id,$data);
        			url::redirect('request');
				}
				else
				{
					$data = arr::overwrite($data, $post->as_array());
                	$data = arr::overwrite($errors, $post->errors('form_error_messages'));
                	url::redirect('request');
				}
			}
    }
    
    public function send_mail()
    {

    }
}