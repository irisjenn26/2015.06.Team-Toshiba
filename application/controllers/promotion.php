<?php defined('SYSPATH') OR die('No direct access allowed.');
class Promotion_Controller extends Private_Template_Controller {

    private $promotion_model;

    public function __construct()
    {
    	parent::__construct();
    	$this->promotion_model = new Promotion_Model();
        //$this->promo_model = new tbl_promotion_Model();
    	
    }

	public function index()
	{
		$this->template->title      = 'Promotions';
		//$this->template->scripts .= html::script("media/js/create_request.js");
		$this->show_promotions_list();
	}

     private function show_promotions_list()
    { 
        
        $promotions_list = $this->promotion_model->get_promotions();
        $this->template->body->content = View::factory('promotion')
                                       ->set('promotions_list', $promotions_list);
    }
    // public function show_add()
    // {
    //     $this->template->title = 'New Promotion';
    //     $this->template->body->content = View::factory('create_promotion');

    // } 
    public function view($id)
    {
        $promo_information = $this->promotion_model->read($id);
        $this->template->body->content = view::factory('view_promo')
                                       ->set('promo_information',$promo_information);
    } 
 
    public function edit($id)
    {
        $this->template->title = "Merchant::Update Promotion";
        $promo_data = $this->promotion_model->read($id);
        $this->template->body->content = view::factory('update_promotion',$promo_data)
                                       ->set('promo_data', $promo_data);
    }


	public function create_promotion()
	{
		$this->auto_render   = FALSE;
		$data = array(
            'user_id'           =>  $_SESSION['id'],
			'promotion_title'	=>  $this->input->post('promotion_title'),
			'description'   	=>  $this->input->post('description'),
			'start_date'    	=>  $this->input->post('start_date'),
			'end_date'      	=>  $this->input->post('end_date'),
			'status'        	=>  $this->input->post('status'),
            'discount'          =>  $this->input->post('discount')
		);
        $recipient = $_SESSION['email'];
		$this->promotion_model->create($data);

        $this->set_mail($recipient,$data);
		url::redirect('/promotion');
	}

    public function set_mail($recipient,$data)
    {
            $send_mail = new Email_Controller();
            $subject = "A new Promotion has come your way";
            foreach($data as $information){
                $information->start_date;
                $information->end_date;
                $information->promotion_title;
                $information->description;
                $information->discount;
            }
            $date = new DateTime($information->start_date);
            $message = "This".$date->format('F j ,Y')." get a chance to buy our products at a low price of".
            $information->discount." until ".$information->end_date; 
            $send_mail->send_promotions($subject, $message, $recipient);
    }
        
    
    public function update($id)
    {   
        var_dump($id);
        $data = array(
            'user_id'           =>  $_SESSION['id'],
            'promotion_title'   =>  $this->input->post('promotion_title'),
            'description'       =>  $this->input->post('description'),
            'start_date'        =>  $this->input->post('start_date'),
            'end_date'          =>  $this->input->post('end_date'),
            'status'            =>  $this->input->post('status'),
            'discount'          =>  $this->input->post('discount')
        );
            
        $this->promotion_model ->update($id,$data);
        url::redirect('/promotion');
    }
}