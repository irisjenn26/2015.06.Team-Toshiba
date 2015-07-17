<?php defined('SYSPATH') OR die('No direct access allowed.');
class Group_Controller extends Private_Template_Controller
{
    private $group_model;
    private $groups_model;


    public function __construct()
    {
        parent::__construct();
            $this->group_model  = new Group_Model();    
    }
    public function index()
    {
        $this->template->title = "Merchant::Groups";
        $this->show_groups_list();
    }
    
    private function show_groups_list()
    { 
        
        $groups_list = $this->group_model->get_groups();
        $this->template->body->content = View::factory('group')
                ->set('groups_list', $groups_list);
    }
    
    // public function show_add()
    // {
    //     $this->template->title = 'New Group';
    //     $this->template->body->content = View::factory('create_group');
    // } 
    public function view($id)
    {
        $group_information = $this->group_model->read($id);
        $this->template->body->content = view::factory('view_group')
                                       ->set('group_information',$group_information);
    }
    
    public function create_group()
    {   
        $this->auto_render = FALSE;
              
        $group_data = array(
            'name'          =>  $this->input->post('name'),
            'permission'    =>  $this->input->post('permission'), 
            'level'         =>  $this->input->post('level'),
            'date_created'  =>  $this->input->post('date_created')
        );
        $this->group_model->create($group_data);
        url::redirect('/group');
    }

    public function show_update_editor($id)
    {
        $this->template->title = "Merchant::Update Group";
        $group_data = $this->group_model->read($id);
        $this->template->body->content =view::factory('update_group')
                                       ->set('group_data',$group_data);
    }

    public function update($id)
    {   
        $group_data = array(
            'name'          =>  $this->input->post('name'),
            'permission'    =>  $this->input->post('permission'), 
            'level'         =>  $this->input->post('level'),
            'date_created'  =>  $this->input->post('date_created')
        );            
        $this->group_model->update($group_data);
        url::redirect('/group');
    }
}
?>
