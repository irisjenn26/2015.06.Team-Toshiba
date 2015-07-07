<?php defined('SYSPATH') OR die('No direct access allowed.');

class Supply_Controller extends Private_Template_Controller
{
    private $supply_model;
    private $supplies_view;
    
    public function index()
    {
        $this->show_supplies_list();
    }
    
   
    private function show_supplies_list()
    { 
        $this->supply_model = new Supply_Model();
        $supplies_list = $this->supply_model->get_supplies();
        $this->supplies_view = View::factory('/admin/supply')
                ->set('supplies_list', $supplies_list)
                ->render(TRUE);
    }
}
?>
