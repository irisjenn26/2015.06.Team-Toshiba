<?php //if(util::permission("can_add_group")){?>
<?=View::factory('create_group')->render(TRUE);?>
<?php //xattr_get(filename, name)}?>
<br/>
<div>
	</div>
<?php //if(util::permission("can_view_groups")){ ?>	
<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>
                    <th>Group Name</th>
                    <th>Level</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>    
            <?php
                foreach($groups_list as $group)
                {
                    echo "<tr>";
                    echo "<td>" . $group->name . "</td>";
                    echo "<td>" . $group->level . "</td>";
                    $date = new DateTime($group->date_created);
                    echo "<td>" . $date->format('F j, Y') . "</td>"; 
//                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
</div>
<?php //} ?>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable()    
        });

        $( "#accordion" ).accordion({
                          heightStyle: "content",
                          collapsible: true,
                          active: false
        });
        
        //$( 'button.edit' ).click(function(id){
        //    location.href="supply/update_supply";
        //});
    </script>
	