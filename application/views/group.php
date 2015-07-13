<div id="accordion">
<h3>Add New Group</h3>
<div>
        <?php echo form::open('group/create_group', array('class' => '', 'method'=>'POST')); ?> 
                <?php echo form::legend('Add New Group',array('id' => 'group_legend', 'class' => '')); ?>
                
                <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date created: ');?>
                <input type="date" id="date_created" name="date_created" class="width-25" required>
                <br/>
                <br/>
                <?php echo form::label('label1','Group Name: ');?>
                <input type="text" id="name" name="name" class="width-25" required>
                <br/>
                <br/>
                <?php echo form::label('label1','Level: ');?>
                &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                <input type="number" id="level" name="level" min ="1" max="1000" class ="width-25" required>
                <br />
                <br />          
                <?php echo form::label(array('for' => 'label4', 'class' => ''), 'Permission: ');?>
                <?php echo form::textarea('permission')?>                
                <br/>
                <?php echo form::submit('submit', 'submit', 'class="btn"') ?>  
     <br/>             
<?php form::close() ?>      
        </div>          
    
</div>
<br/>
<div>
	</div>
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
                    echo "<td>" . $date->format('F j Y') . "</td>"; 
                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
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
	</div>
</div>