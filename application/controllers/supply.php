<?php defined('SYSPATH') OR die('No direct access allowed.');

class Supply_Controller extends Private_Template_Controller
{
    private $supply_model;
    private $request_model;
    private $supplies_model;
    private $sales_model;
    private $manufacturer_model;

    public function __construct()
    {
        parent::__construct();
            $this->supply_model       = new Supply_Model();
            $this->request_model      = new Request_Model();
            $this->sales_model        = new Sales_Model();
			$this->manufacturer_model = new Manufacturer_Model();
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
              
        $data = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number_of_supply'), 
            //'hardware_type'     =>  $this->input->post('hardware_type'),
            'item'              =>  $this->input->post('item'),
            'manufacturer_id'   =>  $this->input->post('manufacturer'),
            'description'       =>  $this->input->post('description'),
            'status'            =>  $this->input->post('status'),  
            'price'             =>  $this->input->post('price'),
            'delstatus'         =>  'true'
        );
        $data = array(
            'date_acquired'     =>  '',
            'number_of_supply'  =>  '', 
            //'hardware_type'     =>  '',
            'item'              =>  '',
            'manufacturer_id'   =>  '',
            'description'       =>  '',
            'status'            =>  '',  
            'price'             =>  ''      
        );
        if(isset($data))
        {
            $post = new Validation($data);

            $post->pre_filter('trim', TRUE);
            $post->pre_filter('ucfirst', 'item');

            $post->add_rules('date_acquired', 'required');
            $post->add_rules('number_of_supply', 'required', 'numeric');
            //$post->add_rules('hardware_type', 'required');
            $post->add_rules('item', 'required', 'alpha_numeric');
            $post->add_rules('manufacturer_id', 'required');
            $post->add_rules('description', 'required', 'length[5,500]');
            $post->add_rules('status', 'required');
            $post->add_rules('price', 'required', 'numeric');
       
            if($post->validate())
            {
                $this->supply_model->create($data_supply);
                url::redirect('supply');             
            }
            else
            {
                $data = arr::overwrite($data, $post->as_array());
                $data = arr::overwrite($errors, $post->errors('form_error_messages'));
                url::redirect('validate');
            }
        }

       
    }

    public function create_manufacturer()
    {
        $this->auto_render = FALSE;
        $manufacturer = $this->input->post('manufacturer_add');
        $this->manufacturer_model->create($manufacturer);
        url::redirect('supply');
    }

    public function create_hardware_type()
    {
        $this->auto_render = FALSE;
        $hard_ware = $this->input->post('hard_ware');
        $this->manufacturer_model->create($hard_ware);
        url::redirect('supply');
    }

    public function update($id)
    {   
        $data = array(
            'date_acquired'     =>  $this->input->post('date_acquired'),
            'number_of_supply'  =>  $this->input->post('number_of_supply'), 
            //'hardware_type'     =>  $this->input->post('hardware_type'),
            'item'              =>  $this->input->post('item'),
            'manufacturer_id'   =>  $this->input->post('manufacturer'),
            'description'       =>  $this->input->post('description'),
            'status'            =>  $this->input->post('status'),  
            'price'             =>  $this->input->post('price')
        );
        $data = array(
            'date_acquired'     =>  '',
            'number_of_supply'  =>  '', 
            //'hardware_type'     =>  '',
            'item'              =>  '',
            'manufacturer_id'   =>  '',
            'description'       =>  '',
            'status'            =>  '',  
            'price'             =>  ''      
        );
        if(isset($data))
        {
            $post = new Validation($data);

            $post->pre_filter('trim', TRUE);
            $post->pre_filter('ucfirst', 'item');

            $post->add_rules('date_acquired', 'required');
            $post->add_rules('number_of_supply', 'required', 'numeric');
            //$post->add_rules('hardware_type', 'required');
            $post->add_rules('item', 'required', 'alpha_numeric');
            $post->add_rules('manufacturer_id', 'required');
            $post->add_rules('description', 'required', 'length[5,500]');
            $post->add_rules('status', 'required');
            $post->add_rules('price', 'required', 'numeric');
       
            if($post->validate())
            {
                $this->supply_model->update($id,$data_supply);
                url::redirect('supply');            
            }
            else
            {
                $data = arr::overwrite($data, $post->as_array());
                $data = arr::overwrite($errors, $post->errors('form_error_messages'));
                url::redirect('supply');
            }
        }    
    }
    
}
?>
