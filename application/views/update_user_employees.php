<div>
<?php 
		foreach ($user_data as $user) 
		{
			$user->id;
			$user->username;
			$user->group_id;
			$user->password;
			$user->firstname;
			$user->lastname;
			$user->address;
		}
			echo form::open("user/create_clerk/'$user->id'", array('class' => '')); 
	    	echo form::open_fieldset(array('id' => 'form_field'))."<br/>";
			echo form::open_fieldset(array('class' => ''))."<br/>";
			echo form::legend('Account Information',array('id' => 'acct_legend', 'class' => ''));

			echo form::label(array('for' => 'label1', 'class' => ''),'Username: ');
			echo form::input('username',$user->username,'class=""')."&nbsp";
			echo form::label(array('for' => 'label2', 'class' => ''),'Account Type: ');
					   $account_type = array('0' => 'Administrator', 
					  					  '1' => 'Clerk');
			echo form::dropdown('acct_type',$account_type,'clerk')."<br/><br/>"; 	
			echo form::label(array('for' => 'label3', 'class' => ''), 'Password: ');
			echo form::password('password',$user->password,'class =""')."&nbsp"; 
			echo form::label(array('for' => 'label4', 'class' => ''), 'Re-Confirm Password: ');
			echo form::password('repassword','','class ="width-30"')."<br/><br/>";
			echo form::close_fieldset()."<br/>";

            echo form::open_fieldset(array('class' => ''))."<br/>";
			echo form::legend('User Information',array('id' => 'user_legend','class' => ''));
			echo form::label(array('for'=>'label5', 'class' => ''),'First Name: ');
			echo form::input('firstname', $user->firstname, 'class = "width-30"')."&nbsp";
			echo form::label(array('for'=>'label6', 'class' => ''),'Last Name: ');
			echo form::input('lastname', $user->lastname, 'class = "width-35"')."<br/><br/>";

			echo form::label(array('for'=>'label7', 'class' => ''),'Address: ');
			echo form::input('address', $user->address, 'class ="width-80"')."<br/></br>";
			echo form::close_fieldset();		
			echo form::submit('submit','submit', 'class = btn');
				 form::close() ?>		        
</div>
<script>
    $('#tooplate_menu').click(function(event){
    event.preventDefault();
    });      
</script>