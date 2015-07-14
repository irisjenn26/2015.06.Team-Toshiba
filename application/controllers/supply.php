<?php defined('SYSPATH') OR die('No direct access allowed.');

class Supply_Controller extends Private_Template_Controller
{
    private $supply_model;
    private $request_model;
    private $supplies_model;
    private $sales_model;

    public function __construct()
    {
        parent::__construct();
            $this->supply_model  = new Supply_Model();
            $this->request_model = new Request_Model();
            $this->sales_model   = new Sales_Model();
			//$this->supplies_model = new Tbl_Supply_Model();
            
    }
    public function index()
    {
        $this->template->title = "Merchant::Supplies";
        $this->show_supplies_list();
    }
    
    private function show_supplies_list()
    { 
        
        $supplies_list = $this->supply_model->get_supplies();
        
        $this->template->body->content = View::factory('supply')
                ->set('supplies_list', $supplies_list);
    }
 public function view($id)
    {
        $supplies_information = $this->supply_model->read($id);
        $this->template->body->content = view::factory('view_supply')
                                       ->set('supplies_information',$supplies_information);
    }   

public function edit($id)
    {
        $this->template->title   = 'Merchant::Update Supply';
        $supply_data = $this->supply_model->read($id);
        $this->template->body->content =view::factory('update_supply')->set('supply_data',$supply_data);
    }


    public function create_supply()
    {   
        $this->auto_render = FALSE;
              
        $data_supply = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number_of_supply'), 
            'hardware_type'     =>  $this->input->post('hardware_type'),
            'item'              =>  $this->input->post('item'),
            'manufacturer'      =>  $this->input->post('manufacturer'),
            'description'       =>  $this->input->post('description'),
            'status'            =>  $this->input->post('status'),  
            'price'             =>  $this->input->post('price')
        );
        $this->supply_model->create($data_supply);
        url::redirect('supply');
    }

    public function update($id)
    {   
            $data_supply = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number_of_supply'), 
            'hardware_type'     =>  $this->input->post('hardware_type'),
            'item'              =>  $this->input->post('item'),
            'manufacturer'      =>  $this->input->post('manufacturer'),
            'description'       =>  $this->input->post('description'),
            'status'            =>  $this->input->post('status'),  
            'price'             =>  $this->input->post('price')
        );
            
        $this->supply_model->update($id,$data_supply);
        url::redirect('supply');
    }
}
?>
