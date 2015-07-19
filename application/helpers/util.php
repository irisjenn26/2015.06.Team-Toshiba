<?php defined('SYSPATH') or die('No direct access allowed.');
class util{
    static function permission($permission){
    	$var = SESSION::instance()->get('permission');
        $permit = json_decode($var);
        //die(var_dump($permit));
        $var2 = FALSE;
        foreach($permit as $key=>$p){
            
            if($p == $permission)
                $var2 = TRUE;
          
        }
        return $var2;
    }
}
?>