<div id = 'update_supp'>
<?php 
                foreach($supply_data as $supply)
                {    
                     $supply->id;
                     $supply->date_acquired;
                     $supply->item;
                     $supply->hardware_type;
                     $supply->manufacturer;
                     $supply->number_of_supply;
                     $supply->price;
                     $supply->description; 
                }
            
                echo form::open('/supply/update/'.$supply->id, array('id' => 'update_supply','class' => '', 'method'=>'POST'));
                echo form::open_fieldset(array('id' => 'form_field'))."<br/>";
                echo form::open_fieldset(array('class' => ''))."<br/>";
                echo form::legend('Supply Information',array('id' => 'acct_legend', 'class' => ''));
 ?> 
                
                <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                                                      
                <input type="date" id="date_acquired" name="date_acquired" class="width-25" value=<?=$supply->date_acquired?> required>
                &nbsp 
                <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                                
                <input type="number" id="number" name="number" min ="1" max="999999" class="width-25" value=<?=$supply->number_of_supply;?> required>
                <br/>
                <br/>
                <?php echo form::label('label1','Product Name: ');?>
                
                <input type="text" id="item" name="item" value=<?=$supply->item?> required>

                &nbsp 
                <?php echo form::label('label1','Price: ');?>
                &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                <input type="number" id="price" name="price" min ="1" max="999999" class ="width-25" value=<?=$supply->price;?> required>
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
                &nbsp                
                <?php echo form::label(array('for' => 'label2', 'class' => ''), 'Hardware: ');?>
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
                <?php echo form::textarea('description', $supply->description)?>                
                <br/>
                <?php echo form::submit('submit', 'submit', 'class="btn"') ?>  
<?php form::close(); 
echo "&nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Cancel</button>";?>
</div>
    <script>
    $('#tooplate_menu').click(function(event){
    event.preventDefault();
    });      
    </script>