
<div>
	<div id = "accordion">
    <h3> Request </h3>
    <div>
        <?php echo form::open('../request/request_supply') ?>
        <fieldset>
            <legend>Request Information</legend>
            <fieldset>
                <?php echo form::label('label1','Date Requested: '); ?>                 
                <input type="date" id="date_requested" name="date_requested"><br/><br/>
                <?php echo form::label('label2','Date Needed: '); ?>
                <input type="date" id="date_needed" name="date_needed"><br/><br/>
                <?php echo form::label('label3','Delivery Address: '); ?>               
                <?php echo form::input('delivery_address'); ?><br/><br/>
                <?php echo form::submit('submit','submit'); ?>
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
                    <th></th>
                    <th>Date Requested</th>
                    <th>Person Who Requested</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($requests_list as $request)
                {
                    echo "<tr>";
                    echo "<input type='checkbox' name='vehicle' value='Bike'/>";
                    echo "<td>" . $request->date_requested . "</td>";
                    echo "<td>" . $request->firstname . " " . $request->lastname . "</td>";
                    echo "<td>" . $request->request_title . "</td>";
                    echo "<td>" . $request->request_type . "</td>";
                    echo "<td>" . $request->request_status . "</td>";
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