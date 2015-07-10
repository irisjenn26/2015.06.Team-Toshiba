<?php defined('SYSPATH') or die('No direct access allowed.');
class util{
    private $user_model;
    static function permission($permission){
    	$user_model = new User_Model();
        $permission = $user_model->get_permissions($_SESSION['group_id']);
        $per_str = implode(",", $permission);
        $permit = json_decode($per_str);
        return $permit;
    }
}
?>