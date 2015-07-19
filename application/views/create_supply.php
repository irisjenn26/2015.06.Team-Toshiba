<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Supply</a></li>
    <li><a href="#tabs-2">Manufacturer</a></li>
    <li><a href="#tabs-3">Hardware</a></li>
  </ul>
  <div id="tabs-1">
      <div id="accordion">
      <h3>Add New Inventory</h3>
      <div>
              <?php 
                  echo form::open('/supply/create_supply', array('class' => '', 'me
              thod'=>'POST')); ?> 
                      <?php echo form::legend('Add New Supply',array('id' => 'supply_legend', 'class' => '')); ?>
                      
                      <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                          
                      <input type="date" id="date_acquired" name="date_acquired" class="input-small width-25" >
                      &nbsp 
                      <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                      
                      <input type="number" id="number_of_supply" name="number_of_supply" min ="1" max="999999" class="input-small width-25" >
                      <br/>
                      <br/>
                      <?php echo form::label('label1','Product Name: ');?>
                      <input type="text" id="item" name="item" class="input-small width-25" >
                      &nbsp 
                      <?php echo form::label('label1','Price: ');?>
                      &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                      <input type="number" id="price" name="price" min ="1" max="999999" class ="input-small width-25" >
                      <br/>
                      <br/>
                      <?php echo form::label('label1','Manufacturer: ');?>
                      <?php $sample2 = array('1' => 'Alienware',
                                             '2' => 'MSI',
                                             '3' => 'Lenovo',
                                             '4' => 'Asus');
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
                      <?php   $sample = array(
                                            'Graphics Card'                     =>    'Graphics Card', 
                                            'Power Supply Unit'                 =>    'Power Supply Unit',
                                            'Computer Cases'                    =>    'Computer Cases',
                                            'Rack-Mount Computer Cases'         =>    'Rack-Mount Computer Cases',
                                            'Laptop Cases'                      =>    'Laptop Cases',
                                            'Mother Board'                      =>    'Mother Board',
                                            'Chipsets for Motherboard'          =>    'Chipsets for Motherboard',
                                            'Central Processing Unit'           =>    'Central Processing Unit',
                                            'Internal HDD'                      =>    'Internal HDD',
                                            'Solid State Drive'                 =>    'Solid State Drive',
                                            'Drive Controller Cards/RAID'       =>    'Drive Controller Cards/RAID',
                                            'Fan Controllers'                   =>    'Fan Controllers',
                                            'Cooling Solutions'                 =>    'Cooling Solutions',

                                            'Refillable Liquid Cooling Kits'    =>    'Refillable Liquid Cooling Kits',
                                            'Mouse'                             =>    'Mouse',
                                            'Keyboard'                          =>    'Keyboard',
                                            'Printer'                           =>    'Printer',
                                            'Projector'                         =>    'Projector',
                                            'Waterblock'                        =>    'Waterblock',
                                            'Graphics Card Cooling'             =>    'Graphics Card Cooling',
                                            'Visual Display Unit(Monitor)'      =>    'Visual Display Unit(Monitor)',
                                            'Graphics Processing Unit'          =>    'Graphics Processing Unit',
                                            'Joystick'                          =>    'Joystick',
                                            'Speakers'                          =>    'Speakers',
                                            'Modems'                            =>    'Modems',
                                            'Network Card'                      =>    'Network Card',
                                            'Chips for Network Card'            =>    'Chips for Network Card',
                                            'Memory Modules'                    =>    'Memory Modules');
                            echo form::dropdown('hardware_type',$sample,'graphics card');?> 
                      <br />
                      <br />          
                      <?php echo form::label(array('for' => 'label4', 'class' => ''), 'Description: ');?>
                      <?php echo form::textarea('description')?>                
                      <br/>
                      <?php echo form::submit('submit', 'submit', 'class="btn btn-smaller btn-round"') ?>  
           <br/>             
      <?php form::close() ?>      
              </div>          
          
      </div>