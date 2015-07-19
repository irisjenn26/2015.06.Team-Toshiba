<?php //if(util::permission("can_add_user")){?>
<?=View::factory('create_clerk')->render(TRUE)?>
<?php //}?>
<br/>
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
				echo "<td>".html::anchor("user/view/".$user->id,html::image('media/images/eye.png'))."</td>";
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