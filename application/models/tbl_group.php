<?php defined('SYSPATH') or die('No direct access allowed.');

class tbl_group_Model extends ORM {
    public function update($id,$name,$permission,$level,$date_created) {
        $groupDB = ORM::factory('tbl_group', $id);
        $groupDB->name = $name;
        $groupDB->permission = $permission;
        $groupDB->level = $level;
        $groupDB->date_created = $date_created;
        $groupDB->save();
    }
}