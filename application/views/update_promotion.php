<div id = "accordion">
    <h3> Promotions </h3>
    <div>
        <?php 
                foreach($promo_data as $promo)
                {
                        $promo->promotion_title;
                        $promo->description;
                        $promo->start_date;
                        $promo->end_date;
                        $promo->status;
                        $promo->discount;
                        $promo->id;
                }

                echo form::open("promotion/update/$promo->id") ?>
        <fieldset>
            <legend>Promotion Information</legend>
            <fieldset>
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" name="start_date" value=<?=$promo->start_date;?>>&nbsp
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" name="end_date" value=<?=$promo->status;?>><br/><br/>
                <?php echo form::label('label4', 'Title: ')?>
                <?php echo form::input('title',$promo->promotion_title);?><br/><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::textarea('description',$promo->description); ?><br/><br/>
                <?php echo form::label('label5','Discount: '); ?>               
                <input type="number" value=<?=$promo->discount;?>><br/><br/>
                <?php echo form::label('label6','Status: ');?>
                <?php $status = array('disabled' => 'Disabled',
                                      'enabled' => 'Enabled');
                      echo form::dropdown('status',$status,'Enabled');?>
                <?php echo form::submit('submit','submit'); ?>
            </fieldset>
        </fieldset>
</div>