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
            
            
    }
    public function index()
    {
        $this->template->title = "";
        $this->show_supplies_list();
    }
    
    private function show_supplies_list()
    { 
        
        $supplies_list = $this->supply_model->get_supplies();
        
        $this->template->body->content = View::factory('supply')
                ->set('supplies_list', $supplies_list);
    }
    public function show_add()
    {
        $this->template->title = 'New Supply';
        $this->template->body->content = View::factory('create_supply');

    } 

    public function create_supply()
    {   
        $this->auto_render = FALSE;
              
        $data_supply = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number'), 
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

    public function show_update_editor($id)
    {
        
        $supply_data = $this->supply_model->read($id);
        /*
        $this->update_supply_view->set('id',$supply_data[0]->id);
        $this->update_supply_view->set('date_acquired',$supply_data[0]->date_acquired);
        $this->update_supply_view->set('number_of_supply',$supply_data[0]->number_of_supply);
        $this->update_supply_view->set('hardware_type',$supply_data[0]->hardware_type);
        $this->update_supply_view->set('item',$supply_data[0]->item);
        $this->update_supply_view->set('manufacturer',$supply_data[0]->manufacturer);
        $this->update_supply_view->set('description', $supply_data[0]->description);
        $this->update_supply_view->set('status',$supply_data[0]->status);
        $this->update_supply_view->set('price',$supply_data[0]->price);
        $this->update_supply_view->set('del_status', $supply_data[0]->del_status);
         */
        $this->template->body->content =view::factory('update',$supply_data);
    }

    public function update()
    {   $supplies_model = new tbl_supply_Model();
                $date_acquired     = $this->input->post('date_acquired');
                $number_of_supply  = $this->input->post('number_of_supply');
                $hardware_type     = $this->input->post('hardware_type');
                $item              = $this->input->post('item');
                $manufacturer      = $this->input->post('manufacturer');
                $description      = $this->input->post('description');
                $status            = $this->input->post('status');
                $price            = $this->input->post('price');
                $del_status        = $this->input->post('del_status');
            
        $supplies_model ->update($this->input->post('id'),$date_acquired,$number_of_supply,$hardware_type,$item,
                $manufacturer,$description,$status,$price, $del_status);
        url::redirect('supply');
    }
}
?>
