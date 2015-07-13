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
            <fieldset>
            <legend>Promotion Information</legend>
            
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" name="start_date" class="width-25" value=<?=$promo->start_date;?>>&nbsp
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" name="end_date" class="width-25" value=<?=$promo->status;?>>&nbsp &nbsp &nbsp &nbsp
                <?php echo form::label('label6','Status: ');?>
                <?php $status = array('disabled' => 'Disabled',
                                      'enabled' => 'Enabled');
                      echo form::dropdown('status',$status,'Enabled');?>
                <br/><br/>
                <?php echo form::label('label4', 'Title: ')?>
                <?php echo form::input('title',$promo->promotion_title, 'class="width-50"');?>&nbsp &nbsp &nbsp &nbsp
                <?php echo form::label('label5','Discount: '); ?>               
                <input type="number" value=<?=$promo->discount;?> class="width-30" min="1"><br/><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::textarea('description',$promo->description); ?><br/><br/>
                
                <?php echo form::submit('submit','submit', 'class="btn"'); ?>
                &nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Cancel</button>
            </fieldset>
        </fieldset>