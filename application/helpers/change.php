<?php defined('SYSPATH') or die('No direct access allowed.');
class change{
    private $supply_model;
    private $sales_model;
    private $request_model;

    static function deduct($sales_id, $sup_id, $req_id){
    	//models
    	$supply_model = new User_Model();
        $sales_model = new Sales_Mdel();
        $request_model = new Request_Model();

        //operation
        $sales = $this->sales_model->read($sales_id);
        $old_quantity = $this->supply_model->read($sup_id);
        $ordered_quantity = $this->request_model->read($req_id);
        if($sales->status == 'Paid'){
            $new_quantity = $old_quantity->number_of_supply - $ordered_quantity->quantity;
        };
        //return value
        return $answer;
    }
}
?>