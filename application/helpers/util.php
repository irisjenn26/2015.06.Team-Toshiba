<?php defined('SYSPATH') or die('No direct access allowed.');
class util{
    private $user_model;
    static function permission($permission){
    	$user_model = new User_Model();
        $permission = $user_model->get_permissions();//mali pag declare mo sa permissions. di gumagana ang $_SESSION[] pag ginamit mo ung kohana way ng pagsesession. 
        $per_str = implode(",", $permission);
        $permit = json_decode($per_str);
        return $permit;
    }
}
?>