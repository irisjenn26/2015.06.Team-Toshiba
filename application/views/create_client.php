<div id="add_client">
		<?php echo form::open('client/create_client', array('class' => '')); ?> 
		<?php echo form::open_fieldset(array('id' => 'form_field'));?><br/>
			<?php echo form::open_fieldset(array('class' => ''));?><br/>
			<?php echo form::legend('Account Information',array('id' => 'acct_legend', 'class' => '')); ?>
				<?php echo form::label(array('for' => 'label1', 'class' => ''),'Username: ');?>
				<?php echo form::input('username','username','class=""');?><br/>
				<br/>
				<?php echo form::label(array('for' => 'label2', 'class' => ''), 'Password: ');?>
				<?php echo form::password('password','','class =""');?><br/>
				<br/>
			<?php echo form::close_fieldset();?><br/>		
	
			<?php echo form::open_fieldset(array('class' => ''));?><br/>
			<?php echo form::legend('User Information',array('id' => 'user_legend','class' => ''));?>
				<?php echo form::label(array('for'=>'label3', 'class' => ''),'First Name: ');?>
				<?php echo form::input('firstname', 'firstname', 'class = ""');?><br/>
				<br/>
				<?php echo form::label(array('for'=>'label4', 'class' => ''),'Last Name: ');?>
				<?php echo form::input('lastname', 'lastname', 'class = ""');?><br/>
				<br/>
				<?php echo form::label(array('for'=>'label5', 'class' => ''),'Address: ');?>
				<?php echo form::input('address', 'address', 'class =""');?><br/>
				<br/>
				<?php echo form::label(array('for'=>'label6', 'class' => ''),'Country: ');?>
				<?php 
					  $sample = array('philippines' => 'Philippines', 'japan' => 'Japan');
					  echo form::dropdown('country',$sample,'philippines'); 
				?><br/>
				<br/>
				<?php echo form::label('label7','Town/City: ');?>
				<?php 
					  $sample2 = array('baguio' => 'Baguio', 'manila' => 'Manila');
					  echo form::dropdown('town_city',$sample2,'baguio'); 
				?><br/>				
				<br/>
				<?php echo form::label('label8','Postal Code: ');?>
				<?php echo form::input('postalcode');?><br/>			
				<br/>
				<?php echo form::close_fieldset();?><br/>
			
			<?php echo form::open_fieldset(array('id' => 'comp_field'));?><br/>
  			<?php echo form::legend('Company Information',array('id' => 'comp_legend'));?>
  				  <?php echo form::label('label9','Company Name: ');?>
  				  <?php echo form::input('comp_name');?><br/>
  				  <br/>
				  <?php echo form::label('label10','Company Address: ');?>
  				  <?php echo form::input('comp_address');?><br/>
  				  <br/>
  				  <?php echo form::label('label11','Contact Number: ');?>
  				  <?php echo form::input('contact_no');?><br/>
  				  <br/>
  				  <?php echo form::label('label12','Email Address: ');?>
  				  <input type="email" id="email" name="email"><br/>
  				  <br/>
			<?php echo form::close_fieldset();?><br/>
			<?php echo form::submit('submit','submit'); ?>
		<?php echo form::close_fieldset();?>
		<?php form::close() ?>		
</div>