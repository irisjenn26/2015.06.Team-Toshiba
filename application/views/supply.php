     <?= View::factory('create_supply')->render();?>
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
      <h3>Add New Manufacturer</h3>
      <?= View::factory('manufacturer')->render();?>
      </div>
    <div id="tabs-3">
      <div class="accordion">
      <h5>Add Hardware Type</h5>
        <?= View::factory('hardware_type')->render();?>         
      </div>
    </div>

<script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable()    
        });

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