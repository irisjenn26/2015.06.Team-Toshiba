<div>
	</div>
	<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>
                    <th>Date</th>
                    <th>Client Name</th>
                    <th>Quantity</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            <thead>
            <tbody>    
            <?php
                foreach($sales_list as $sale)
                {
                    echo "<tr>";
                    $date = new DateTime($request->$sale->date_purchased);
                    echo "<td>" .$date->format('F j, Y'). '</td>';
                    echo "<td>" . $sale->firstname . " " . $sale->lastname ."</td>";
                    echo "<td>" . $sale->number_of_supply . "</td>";
                    echo "<td>" . $sale->item . "</td>";
                    echo "<td>" . number_format($sale->total_amount,2,",",".") . "</td>";
                    echo "<td>" . $sale->status . "</td>";
                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable().makeEditable();    
        });
		$( "#accordion" ).accordion({collapsible: true,active: false,});
    </script>
	</div>
</div>