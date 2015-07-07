<div>
	<div id = "add_facility">
        <?php echo html::file_anchor('admin/user/show_create', 'Add User');?>
	</div>
	<div id = "table">
		<table class = "table-hovered">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>User Type</th>
			</tr>
		<?php
			foreach($users_list as $user)
			{
				echo "<tr>";
				echo "<td>" . $user->firstname . "</td>";
				echo "<td>" . $user->lastname . "</td>";
				echo "<td>" . $user->username . "</td>";
				echo "<td>" . $user->name . "</td>";
				echo "</tr>";
				
			}
var_dump($users_list);
		?>
		</table>
	</div>
</div>