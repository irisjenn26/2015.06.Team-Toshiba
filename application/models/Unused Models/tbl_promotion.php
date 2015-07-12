<?php defined('SYSPATH') or die('No direct access allowed.');

class tbl_promotion_Model extends ORM {
    public function update($id,$description,$discount,$status, $start_date,$end_date,$promotion_title) {
        $promoDB = ORM::factory('tbl_promotion', $id);
        $promoDB->description = $description;
        $promoDB->discount = $discount;
        $promoDB->start_date= $start_date;
        $promoDB->end_date = $end_date;
        $promoDB->promotion_title = $promotion_title;
        $promoDB->status = $status;
        $promoDB->save();
    }
}