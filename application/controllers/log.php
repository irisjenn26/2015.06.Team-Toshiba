<?php defined('SYSPATH') OR die('No direct access allowed.');

class Log_Controller extends Private_Template_Controller {
    private $log_model;

    public function __construct()
    {
        parent::__construct();
            $this->log_model = new Log_Model();
    }
    
    public function index()
    {
        $id = $_SESSION['id'];
        $logs = $this->log_model->read($id);
        foreach ($logs as $key ) {
            $key->description;
            $key->action;
            $key->date;
        }
        $log_data = array(
                        'id' => ,
                        'user_id' => ,
                        "current_date" => $this->get_curdate()
        );
             
        $this->template->body->content = View::factory('logs',$log_data);
    }
    
    public function get_curdate() {
        date_default_timezone_set('Asia/Manila');
        $today = getdate();
        $month_day = $today['mday'];
        $month = $today['mon'];
        $year = $today['year'];
        $hr = $today['hours'];
        $min = $today['minutes'];
        $sec = $today['seconds'];
        
        $cur_date = "$year-$month-$month_day $hr:$min:$sec";
        
        return $cur_date;
    }

}