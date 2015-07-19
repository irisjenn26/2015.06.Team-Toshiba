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