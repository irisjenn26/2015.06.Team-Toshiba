<?php defined('SYSPATH') OR die('No direct access allowed.');
class Contract_Controller extends Private_Template_Controller
{
    private $contract_model;
    //private $groups_model;


    public function __construct()
    {
        parent::__construct();
            $this->contract_model  = new Contract_Model();    
    }
    public function index()
    {
        $this->template->title = "";
        $this->show_contract_list();
    }
    
    private function show_contract_list()
    { 
        
        $contract_list = $this->contract_model->get_contract();
        $this->template->body->content = View::factory('contract')
                             ->set('contract_list', $contract_list);
    }
   
    // public function show_add()
    // {
    //     $this->template->title = 'New Group';
    //     $this->template->body->content = View::factory('create_group');
    //} 

    public function create_contract()
    {   
        $this->auto_render = FALSE;
        $contract_data = array(
            'date_start'    =>  $this->input->post('date_start'),
            'date_end'      =>  $this->input->post('date_end'), 
            'contract_path' =>  $this->input->post('contract_path')
        );
        $this->contract_model->create($contract_data);
        url::redirect('contract');
    }

    public function edit($id)
    {
        $contract_data = $this->contract_model->read($id);
        $this->template->body->content =view::factory('update_contract')
                                       ->set('contract_data', $contract_data);
    }

    public function update($id)
    {   
        $contract_data = array(
            'date_start'    =>  $this->input->post('date_start'),
            'date_end'      =>  $this->input->post('date_end'), 
            'contract_path' =>  $this->input->post('contract_path')
        );    
        $groups_model->update($id,$contract_data);
        url::redirect('contract');
    }
}
?>
