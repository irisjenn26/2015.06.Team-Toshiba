<div id = "accordion">
    <h3> Promotions </h3>
    <div>
        <?php echo form::open(promotion/update) ?>
        <fieldset>
            <legend>Promotion Information</legend>
            <fieldset>
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" name="start_date">&nbsp
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" name="end_date"><br/><br/>
                <?php echo form::label('label4', 'Title: ')?>
                <?php echo form::input('title');?><br/><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::textarea('description'); ?><br/><br/>
                <?php echo form::label('label5','Discount: '); ?>               
                <input type="number"><br/><br/>
                <?php echo form::label('label6','Status: ');?>
                <?php $status = array('disabled' => 'Disabled',
                                      'enabled' => 'Enabled');
                      echo form::dropdown('status',$status,'Enabled');?>
                <?php echo form::submit('submit','submit'); ?>
            </fieldset>
        </fieldset>
</div>