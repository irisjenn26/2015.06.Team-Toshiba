<div>
	</div>
	<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>
                    <th>Date Purchased</th>
                    <th>Client's Name</th>
                    <th>Quantity</th>
                    <th>Items</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            <thead>
            <tbody>    
            <?php
                foreach($sales_list as $sale)
                {
                    echo "<tr>";
                    echo "<td>" . $sale->date_purchased . "</td>";
                    echo "<td>" . $sale->firstname . " " . $sale->lastname ."</td>";
                    echo "<td>" . $sale->number_of_supply . "</td>";
                    echo "<td>" . $sale->item . "</td>";
                    echo "<td>" . $sale->total_amount . "</td>";
                    echo "<td>" . $sale->status . "</td>";
                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
        <?php echo util::test()?>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable().makeEditable();    
        });
		$( "#accordion" ).accordion({collapsible: true,active: false,});
    </script>
	</div>
</div>