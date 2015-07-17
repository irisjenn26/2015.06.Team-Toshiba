<?php defined('SYSPATH') or die('No direct script access.');
class Tbl_User_Model extends ORM {
	
    public function get_user($username)
    {
      $get_user = ORM::factory('tbl_user')
      			->SELECT('*')
      			->WHERE('username',$username)
            ->join("tbl_groups",'tbl_users.group_id',"tbl_groups.id")
      			->find();
      return $get_user;
    }
    public function get_email($email)
    {
      $get_email = ORM::factory('tbl_user')
                  ->SELECT('email')
                  ->WHERE('email',$email)
                  ->find();
      return $get_email;
    }
    public function update($id ,$firstname, $lastname, $address, $del_status)
    {
        $userDB = ORM::factory('tbl_user', $id);
        $userDB->firstname = $firstname;
        $userDB->lastname = $lastname;
        $userDB->address= $address;
        $userDB->del_status = $del_status;
        $userDB->save();
    }
}