<div>
<div id="accordion">
<?php echo form::open('admin/user/create_clerk', array('class' => '')); ?> 
		<?php echo form::open_fieldset(array('id' => 'form_field'));?><br/>
			<?php echo form::open_fieldset(array('class' => ''));?><br/>
			<?php echo form::legend('Account Information',array('id' => 'acct_legend', 'class' => '')); ?>
				<?php echo form::label(array('for' => 'label1', 'class' => ''),'Username: ');?>
				<?php echo form::input('username','username','class=""');?>&nbsp
				<?php echo form::label(array('for' => 'label2', 'class' => ''),'Account Type: ');?>
				<?php 
					  $acct_type = array('0' => 'Administrator', 
					  					 '1' => 'Clerk');
					  echo form::dropdown('acct_type',$acct_type,'clerk'); 
				?>
				<br/> <br/>
				<?php echo form::label(array('for' => 'label3', 'class' => ''), 'Password: ');?>
				<?php echo form::password('password','','class =""');?> &nbsp
				<?php echo form::label(array('for' => 'label4', 'class' => ''), 'Re-Confirm Password: ');?>
				<?php echo form::password('repassword','','class =""');?><br/>
				<br/>
			<?php echo form::close_fieldset();?><br/>		
	
			<?php echo form::open_fieldset(array('class' => ''));?><br/>
			<?php echo form::legend('User Information',array('id' => 'user_legend','class' => ''));?>
				<?php echo form::label(array('for'=>'label5', 'class' => ''),'First Name: ');?>
				<?php echo form::input('firstname', 'firstname', 'class = "width-30"');?> &nbsp
				<?php echo form::label(array('for'=>'label6', 'class' => ''),'Last Name: ');?>
				<?php echo form::input('lastname', 'lastname', 'class = "width-35"');?><br/>
				<br/>
				<?php echo form::label(array('for'=>'label7', 'class' => ''),'Address: ');?>
				<?php echo form::input('address', 'address', 'class ="width-80"');?><br/>
				<br/>
	<?php echo form::close_fieldset();?>		
	<?php echo form::submit('submit','submit', 'class = btn'); ?>
	<?php form::close() ?>		
</div>
</div>