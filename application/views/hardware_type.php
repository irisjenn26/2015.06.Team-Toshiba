<div>
   <?php echo form::open('/supply/create_hardware');?> 
                      <?php echo form::legend('Add Hardware Type',array('id' => 'supply_legend', 'class' => '')); ?>
                      
                      <?php echo form::label(array('for' => 'label1', 'class' => ''),'Hardaware Type: ');?>
                          
                      <input type="date" id="hard_ware" name="hard_ware" class="input-small width-25">
                      <br/>
                      <?php echo form::submit('submit', 'submit', 'class="btn btn-smaller btn-round"') ?>  
                      <br/>             
   <?php form::close() ?>      
</div>