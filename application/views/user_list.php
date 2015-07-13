
<div id="accordion">
<h3>Employee Accounts</h3>
    <div>
<?php echo form::open('user/create_clerk', array('class' => '')); ?> 
		<?php echo form::open_fieldset(array('id' => 'form_field'));?><br/>
			<?php echo form::open_fieldset(array('class' => ''));?><br/>
			<?php echo form::legend('Account Information',array('id' => 'acct_legend', 'class' => '')); ?>
				<?php echo form::label(array('for' => 'label1', 'class' => ''),'Username: ');?>
				<?php echo form::input('username','username','class=""');?>&nbsp
				<?php echo form::label(array('for' => 'label2', 'class' => ''),'Account Type: ');?>
				<?php 
					  $acct_type = array('1' => 'Administrator', 
					  					 '2' => 'Sales Clerk',
					  					 '3' => 'Technical Clerk'
					  					 );
					  echo form::dropdown('acct_type',$acct_type,'clerk'); 
				?>
				<br/> <br/>
				<?php echo form::label(array('for' => 'label3', 'class' => ''), 'Password: ');?>
				<?php echo form::password('password','','class =""');?> &nbsp
				<?php echo form::label(array('for' => 'label4', 'class' => ''), 'Re-Confirm Password: ');?>
				<?php echo form::password('repassword','','class ="width-30"');?><br/>
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
				<?php echo form::input('address', '', 'class ="width-100"');?><br/>
				<br/>
	<?php echo form::close_fieldset();?>		
	<?php echo form::submit('submit','submit', 'class = btn'); ?>
	<?php form::close() ?>		
        
	</div>
</div>
<br />
<div>
	<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>

				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>User Type</th>
				<th>Action</th>
			</tr>
	       </thead>
        <tbody>    
            
        <?php
			foreach($users_list as $user)
			{
				echo "<tr>";
				echo "<td>" . $user->firstname . "</td>";
				echo "<td>" . $user->lastname . "</td>";
				echo "<td>" . $user->username . "</td>";
				echo "<td>" . $user->name . "</td>";
				echo "<td>".html::anchor("user/edit/".$user->id,html::image('media/images/edit.png'))."</td>";
				echo "</tr>";
				
			}
		?>
	   </tbody>
        </table>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable().makeEditable();    
        });
		$( "#accordion" ).accordion({collapsible: true,active: false,});
    </script>
	</div>
</div>