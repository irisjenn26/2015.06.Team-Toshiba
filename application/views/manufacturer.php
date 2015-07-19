<div>
              <?php echo form::open('/supply/create_manufacturer'); ?> 
                      <?php echo form::legend('Add Manufacturer'); ?>
                      <?php echo form::label(array('for' => 'label1'),'Manufacturer: ');?>
                      <input type="text" id="manufacturer_add" name="manufacturer_add" class="input-small width-25">                
                      <br/>
                      <?php echo form::submit('submit', 'submit', 'class="btn btn-smaller btn-round"') ?>  
                      <br/>             
              <?php form::close() ?>      
      </div>              
</div>