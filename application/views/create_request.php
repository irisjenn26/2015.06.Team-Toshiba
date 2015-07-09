
		<?php echo form::open('client/request/request_supply') ?>
		<fieldset>
			<legend>Request Information</legend>
			<fieldset>
				<?php echo form::label('label1','Date Requested: '); ?>		     		
				<input type="date" id="date_requested" name="date_requested"><br/><br/>
	            <?php echo form::label('label2','Date Needed: '); ?>
	            <input type="date" id="date_needed" name="date_needed"><br/><br/>
	     		<?php echo form::label('label3','Delivery Address: '); ?>	     		
	     		<?php echo form::input('delivery_address'); ?><br/><br/>
	     		<?php echo form::submit('submit','submit'); ?>
			</fieldset>
		</fieldset>
		<?php form::close() ?>		
