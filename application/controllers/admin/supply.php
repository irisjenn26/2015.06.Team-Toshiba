<?php defined('SYSPATH') OR die('No direct access allowed.');

class Supply_Controller extends Private_Template_Controller
{
    private $supply_model;
    private $supplies_view;
    
    public function __construct()
    {
        parent::__construct();
          }
    public function index()
    {
        $this->template->title = "";
        $this->show_supplies_list();
    }
    
    private function show_supplies_list()
    { 
        $this->supply_model = new Supply_Model();
        $supplies_list = $this->supply_model->get_supplies();
        
        $this->template->body->content = View::factory('admin/supply')
                ->set('supplies_list', $supplies_list);
    }
    public function show_add()
    {
        $this->template->title = 'New Supply';
        $this->template->body->content = View::factory('admin/create_supply');

    } 

    public function create_supply()
    {   
        $this->auto_render = FALSE;
        $this->supply_model  = new Supply_Model();
        ;
              
        $data_supply = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number'), 
            'hardware_type'     =>  $this->input->post('hardware_type'),
            'item'              =>  $this->input->post('item'),
            'manufacturer'      =>  $this->input->post('manufacturer'),
            'description'       =>  $this->input->post('description'),
            'status'            =>  $this->input->post('status'),  
            'price'             =>  $amount = $this->input->post('price')
        );
        $this->supply_model->create($data_supply);
        url::redirect('/admin/supply');
    }
}
?>
