<div>
	<div id = "accordion">
    <h3> Promotions </h3>
    <div>
        <?php echo form::open('/promotion/create_promotion', array('class' => '', 'method'=>'POST')); ?> 
        <fieldset>
            <legend>Promotion Information</legend>
            <fieldset>
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" class = "width-35" name="start_date">&nbsp
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" class = "width-35" name="end_date"><br/><br/>
                <?php echo form::label('label4', 'Title: ')?>
                <?php echo form::input('promotion_title','','class ="width-90"');?><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::textarea('description'); ?><br/>
                 <?php echo form::label('label5','Discount: '); ?>               
                <input type="number" min="1" max="50" id="discount" name="discount">&nbsp
                <?php echo form::label('label6','Status: ');?>
                <?php $status = array('disabled' => 'Disabled',
                                      'enabled' => 'Enabled');
                      echo form::dropdown('status',$status,'Enabled');?>
                <br>
                <br>
                <?php echo form::submit('submit','submit'); ?>
            </fieldset>
        </fieldset>
        <?php form::close() ?>      
        </div>
	</div>
	</div>
