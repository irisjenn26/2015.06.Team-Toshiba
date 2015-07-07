<?php defined('SYSPATH') OR die('No direct access allowed.');

class Sales_Controller extends Private_Template_Controller
{
    private $sales_model;
    private $sales_view;
    
    public function __construct()
    {
        parent::__construct();
        $this->sales_model = new Sales_Model();  
    }
    public function index()
    {
        $this->template->title = "";
        $this->show_sales_list();
    }
    
    private function show_sales_list()
    { 

        $sales_list = $this->sales_model->get_sales();
        
        $this->template->body->content = View::factory('admin/sales')
                                           ->set('sales_list', $sales_list);
    }
    public function show_add()
    {
        $this->template->title = 'New Invoice';
        $this->template->body->content = View::factory('admin/create_invoice');

    } 

    public function create_sales()
    {   
        $this->auto_render = FALSE;              
        $data_supply = array(
            'date_purchased'    =>  $this->input->post('date_purchased'),
            'firstname'         =>  $this->input->post('firstname'), 
            'lastname'          =>  $this->input->post('lastname'),
            'number_of_supply'  =>  $this->input->post('number_of_supply'),
            'item'              =>  $this->input->post('item'),
            'total_amount'      =>  $this->input->post('total_amount'),
            'status'            =>  $this->input->post('status')
        );
        $this->sales_model->create($data_sales);
        url::redirect('admin/sales');
    }
}
?>
