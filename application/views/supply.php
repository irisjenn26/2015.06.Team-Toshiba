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
              <?php echo form::open('/supply/create_supply', array('class' => '', 'method'=>'POST')); ?> 
                      <?php echo form::legend('Add New Supply',array('id' => 'supply_legend', 'class' => '')); ?>
         
                      <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                          
                      <input type="date" id="date_acquired" name="date_acquired" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                      
                      <input type="number" id="number" name="number" min ="1" max="999999" class="input-small width-25" required>
                      <br/>
                      <br/>
                      <?php echo form::label('label1','Product Name: ');?>
                      <input type="text" id="item" name="item" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label('label1','Price: ');?>
                      &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                      <input type="number" id="price" name="price" min ="1" max="999999" class ="input-small width-25" required>
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
      <br/>
      <div>
      	</div>
      	<div id = "table">
      		<table id="dataTable" class="display">
      			<thead>
                      <tr>
                          <th>Product Name</th>
                          <th>Item</th>
                          <th>Manufacturer</th>
                          <th>Available Stocks</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>    
                  <?php
                      foreach($supplies_list as $supply)
                      {
                          echo "<tr>";
                          echo "<td>".$supply->item . "</td>";
                          echo "<td>" . $supply->hardware_type . "</td>";
                          echo "<td>" . $supply->manufacturer . "</td>";
                          echo "<td>" . $supply->number_of_supply . "</td>";
                          echo "<td> ₱ " . number_format($supply->price,2,".",",") . "/ unit </td>";
                          echo "<td>".html::anchor("supply/view/".$supply->id,html::image('media/images/eye.png'))."</td>";
                          echo "</tr>";

      			}
      		?>
                  </tbody>
      		</table>

      	</div>
      </div>
    <div id="tabs-2">
        <div class="accordion">
      <h3>Add New Inventory</h3>
      <div>
              <?php echo form::open('/supply/create_supply', array('class' => '', 'me
              thod'=>'POST')); ?> 
                      <?php echo form::legend('Add New Supply',array('id' => 'supply_legend', 'class' => '')); ?>
                      
                      <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                          
                      <input type="date" id="date_acquired" name="date_acquired" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                      
                      <input type="number" id="number" name="number" min ="1" max="999999" class="input-small width-25" required>
                      <br/>
                      <br/>
                      <?php echo form::label('label1','Product Name: ');?>
                      <input type="text" id="item" name="item" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label('label1','Price: ');?>
                      &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                      <input type="number" id="price" name="price" min ="1" max="999999" class ="input-small width-25" required>
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
      <br/>
      <div>
        </div>
        <div id = "table">
          <table id="dataTable" class="display">
            <thead>
                      <tr>
                          <th>Product Name</th>
                          <th>Item</th>
                          <th>Manufacturer</th>
                          <th>Available Stocks</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>    
                  <?php
                      foreach($supplies_list as $supply)
                      {
                          echo "<tr>";
                          echo "<td>".$supply->item . "</td>";
                          echo "<td>" . $supply->hardware_type . "</td>";
                          echo "<td>" . $supply->manufacturer . "</td>";
                          echo "<td>" . $supply->number_of_supply . "</td>";
                          echo "<td> ₱ " . number_format($supply->price,2,".",",") . "/ unit </td>";
                          echo "<td>".html::anchor("supply/view/".$supply->id,html::image('media/images/eye.png'))."</td>";
                          echo "</tr>";

            }
          ?>
                  </tbody>
          </table>

        </div>
      </div>
    <div id="tabs-3">
      <div class="accordion">
      <h5>Add New Inventory</h5>
      <div>
              <?php echo form::open('/supply/create_supply', array('class' => '', 'me
              thod'=>'POST')); ?> 
                      <?php echo form::legend('Add New Supply',array('id' => 'supply_legend', 'class' => '')); ?>
                      
                      <?php echo form::label(array('for' => 'label1', 'class' => ''),'Date Acquired: ');?>
                          
                      <input type="date" id="date_acquired" name="date_acquired" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label(array('for' => 'label3', 'class' => ''), 'number of supply: ');?>
                      
                      <input type="number" id="number" name="number" min ="1" max="999999" class="input-small width-25" required>
                      <br/>
                      <br/>
                      <?php echo form::label('label1','Product Name: ');?>
                      <input type="text" id="item" name="item" class="input-small width-25" required>
                      &nbsp 
                      <?php echo form::label('label1','Price: ');?>
                      &nbsp  &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp   &nbsp    
                      <input type="number" id="price" name="price" min ="1" max="999999" class ="input-small width-25" required>
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
      <br/>
      <!-- <div>
        </div>
        <div id = "table">
          <table id="dataTable" class="display">
            <thead>
                      <tr>
                          <th>Product Name</th>
                          <th>Item</th>
                          <th>Manufacturer</th>
                          <th>Available Stocks</th>
                          <th>Price</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>    
                  <?php
                      // foreach($supplies_list as $supply)
                      // {
                      //     echo "<tr>";
                      //     echo "<td>".$supply->item . "</td>";
                      //     echo "<td>" . $supply->hardware_type . "</td>";
                      //     echo "<td>" . $supply->manufacturer . "</td>";
                      //     echo "<td>" . $supply->number_of_supply . "</td>";
                      //     echo "<td> ₱ " . number_format($supply->price,2,".",",") . "/ unit </td>";
                      //     echo "<td>".html::anchor("supply/view/".$supply->id,html::image('media/images/eye.png'))."</td>";
                      //     echo "</tr>";

           // }
          ?>
                  </tbody>
          </table>

        </div>
        </div>
        </div>
 -->
<script type="text/javascript">
        // $(document).ready(function(){
        //     $('#dataTable').dataTable()    
        // });

        $( "#accordion" ).accordion({
                          heightStyle: "content",
                          collapsible: true,
                          active: false
        });
        $( ".accordion" ).accordion({
                          heightStyle: "content",
                          collapsible: true,
                          active: false
        });
        $("#tabs").tabs();

        //$( 'button.edit' ).click(function(id){
        //    location.href="supply/update_supply";
        //});
    </script>