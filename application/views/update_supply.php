<div id = 'update_supp'>
<?php echo form::open('/edit/edit_supply', array('id' => 'update_supply','class' => 'white-popup-block mfp-hide', 'method'=>'POST')); ?> 
        <?php echo form::open_fieldset(array('id' => 'form_field'));?><br/>
            <?php echo form::open_fieldset(array('class' => ''));?><br/>
            <?php echo form::legend('Add New Supply',array('id' => 'supply_legend', 'class' => '')); ?>

                <p id='error'>Please input proper data</p>    

                <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                
                <p id='date_error'>Please input an proper date</p>    
                
                <input type="date" id="date_acquired" name="date_acquired" class="width-25" required>
                &nbsp 
                <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                
                <p id='amount_error'>Please input an proper amount</p>                   
                
                <input type="number" id="number" name="number" min ="1" max="999999" class="width-25" required>
                <br/>
                <br/>
                <?php echo form::label('label1','Product Name: ');?>
                
                <p id='name_error'>Please proper name</p>    

                <input type="text" id="item" name="item" class="width-25" required>
                
                &nbsp 
                <?php echo form::label('label1','Price: ');?>
                &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                <input type="number" id="price" name="price" min ="1" max="999999" class ="width-25" required>
                <br/>
                <br/>
                <?php echo form::label('label1','Manufacturer: ');?>
                <?php $sample2 = array('Alienware' => 'Alienware',
                                      'MSI' => 'MSI',
                                      'Lenovo' => 'Lenovo',
                                      'Asus' => 'Asus');
                      echo form::dropdown('manufacturer',$sample2,'Alienware');?>
                &nbsp 
                <?php echo form::label('label1','Status: '); ?> 
                <?php $sample3 = array('Available' => 'Available',
                                      'Out Of Stock' => 'Out Of Stock',
                                      'Pending' => 'Pending');
                      echo form::dropdown('status',$sample3,'pending'); 
                ?>
                <br>
                <br>
                <?php echo form::label(array('for' => 'label2', 'class' => ''), 'Hardware Type: ');?>
                <?php   $sample = array('graphics card' => 'Graphics Card', 
                                      'power supply unit' => 'Power Supply Unit',
                                      'computer cases' => 'Computer Cases',
                                      'rack-mount computer cases' => 'Rack-Mount Computer Cases',
                                      'laptop cases' => 'Laptop Cases',
                                      'Mother Board' => 'Mother Board',
                                      'chipsets for motherboard' => 'chipsets for motherboard',
                                      'central processing unit' => 'Central Processing Unit',
                                      'Internal HDD' => 'Internal HDD',
                                      'Solid State Drive' => 'Solid State Drive',
                                      'drive controller cards/RAID' => 'drive controller cards/RAID',
                                      'Fan Controllers' => 'Fan Controllers',
                                      'Cooling Solutions' => 'Cooling Solutions',
                                      'Non-Refillable Liquid Cooling' => 'Non-Refillable Liquid Cooling',
                                      'Refillable Liquid Cooling Kits' => 'Refillable Liquid Cooling Kits');
                      echo form::dropdown('hardware_type',$sample,'graphics card');?> 
                <br />
                <br />          
                <?php echo form::label(array('for' => 'label4', 'class' => ''), 'Description: ');?>
                <?php echo form::textarea('description')?>                
                <br/>
                <?php echo form::submit('submit', 'submit', 'class="btn"') ?>  
              <br/>             
<?php form::close() ?>
</div>      
  <script type="text/javascript">
        $("#update_supp").fancybox({
            'scrolling' : 'yes',
            'titleShow' : 'no',
            'onClosed'  : function(){
                $('#error').hide();
              }
            $('#update_supply').bind("submit", function(){
                if($('#date_acquired').val().length < 1){
                  $( '#date_error' ).show();
                  $.fancybox.resize();
                }else 
                if($('#number').val().length < 1){
                  $( '#amount_error' ).show();
                  $.fancybox.resize();
                }else
                if($('#item').val().length < 1){
                  $( '#name_error' ).show();
                  $.fancybox.resize();
                }

                $.fancybox.showActivity();

                //d2 sana pagpasok sa database using ajax
                $.ajax({
                    type :"POST",
                    cache : false,
                    url  : "edit/edit_supply",
                    data : $(this).serializeArray(),
                    success : function(data){
                        $.fancybox(data);
                    }
                });
            })              
        });
        
    </script>