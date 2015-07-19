<div id = "accordion">
    <h3> Request </h3>
    <div>
        <?php echo form::open('/request/create_request') ?>
        <fieldset>
            <legend>Request Information</legend>
            <fieldset>
                <?php echo form::label('label1','Date Requested: '); ?>                 
                <input type="date" id="date_requested" name="date_requested" class="width-25" required>&nbsp
                <?php echo form::label('label2','Date Needed: '); ?>
                <input type="date" id="date_needed" name="date_needed" class="width-25" required><br/><br/>
                <?php echo "&nbsp";
                      echo form::label('label4', 'Item: ')."&nbsp";
                      echo form::input('request_item','', 'class="width-35" required')."&nbsp &nbsp &nbsp &nbsp";?>
                <?php echo form::label('label5', 'Amount: ')?>
                      &nbsp <input type='number' id='quantity' class='width-25' name='quantity' min='1' required/>
                <br/><br/>
                <?php echo form::label('label3','Delivery Address:');              
                      echo form::input('delivery_address','' ,'class="width-100" required');?>
                <br/><br/>
                <?php  echo form::submit('submit','submit','class ="btn"'); ?>
            </fieldset>
        </fieldset>
        <?php form::close() ?>      
        </div>
	</div>