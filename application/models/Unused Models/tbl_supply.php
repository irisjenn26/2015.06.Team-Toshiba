<?php defined('SYSPATH') or die('No direct access allowed.');

class tbl_supply_Model extends ORM {
    public function update($id,$date_acquired,$number_of_supply,$hardware_type,$item,
                $manufacturer,$description,$status,$price, $del_status) {
        $supDB = ORM::factory('tbl_supply', $id);
        $supDB->item =$item;
        $supDB->description = $description;
        $supDB->hardware_type= $hardware_type;
        $supDB->number_of_supply= $number_of_supply;
        $supDB->price = $price;
        $supDB->manufacturer = $manufacturer;
        $supDB->date_acquired = $date_acquired;
        $supDB->status = $status;
        $supDB->del_status = $del_status;
        $supDB->save();
    }
}