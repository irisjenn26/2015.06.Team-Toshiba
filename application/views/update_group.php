 <?php 
    foreach($group_data as $group)
                {
                        $group->name;
                        $group->permission;
                        $group->level;
                        $group->date_created;
                      
                }
 echo form::open('group/update/', array('class' => '', 'method'=>'POST')); ?> 
                <?php echo form::legend('Update Group',array('id' => 'group_legend', 'class' => '')); ?>
                
                <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date created: ');?>
                <input type="date" id="date_created" name="date_created" class="width-25" value=<?=$group->date_created;?>>
                <br/>
                <br/>
                <?php echo form::label('label1','Group Name: ');?>
                <input type="text" id="name" name="name" class="width-25" value=<?=$group->name;?>required>
                <br/>
                <br/>
                <?php echo form::label('label1','Level: ');?>
                &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                <input type="number" id="level" name="level" min ="1" max="1000" class ="width-25" value=<?=$group->level;?>>
                <br />
                <br />          
                <?php echo form::label(array('for' => 'label4', 'class' => ''), 'Permission: ');?>
                <?php echo form::textarea('permission', $group->permission)?>                
                <br/>  
     <br/>             
<?php form::close() ?>
<br>
<?php echo "&nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Back</button>";?>
