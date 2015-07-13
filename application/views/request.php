
<div>
	<div id = "accordion">
    <h3> Request </h3>
    <div>
        <?php echo form::open('/request/create_request') ?>
        <fieldset>
            <legend>Request Information</legend>
            <fieldset>
                <?php echo form::label('label1','Date Requested: '); ?>                 
                <input type="date" id="date_requested" name="date_requested" class="width-25" required>&nbsp
                <?php echo form::label('label2','Date Needed: '); ?>
                <input type="date" id="date_needed" name="date_needed" class="width-25" required><br/><br/>
                <?php echo "&nbsp";
                      echo form::label('label4', 'Item: ')."&nbsp";
                      echo form::input('request_item','', 'class="width-35" required')."&nbsp &nbsp &nbsp &nbsp";?>
                <?php echo form::label('label5', 'Amount: ')?>
                      &nbsp <input type='number' id='quantity' class='width-25' name='quantity' min='1' required/>
                <br/><br/>
                <?php echo form::label('label3','Delivery Address:');              
                      echo form::input('delivery_address','' ,'class="width-100" required');?>
                <br/><br/>
                <?php  echo form::submit('submit','submit','class ="btn"'); ?>
            </fieldset>
        </fieldset>
        <?php form::close() ?>      
        </div>
	</div>
	</div>
    <br/    >
	<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($requests_list as $request)
                {
                    echo "<tr>";
                    $date = new DateTime($request->date_requested);
                    echo "<td>" .$date->format('F j, Y'). '</td>';
                    echo "<td>" . $request->request_item . "</td>";
                    echo "<td>" . $request->request_type . "</td>";
                    echo "<td>".html::anchor("request/edit/".$request->id."/",html::image('media/images/edit.png'))."</td>";
                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable();    
        });
        $( "#accordion" ).accordion({collapsible: true,active: false,});
    </script>
	</div>
</div>