<?=View::factory('create_promotion')->render(TRUE)?>
    <br>
	<div id = "table">
		<table id="dataTable" class="display">
			<thead>
                <tr>
                    <th>Promotion Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($promotions_list as $promotion)
                {
                    echo "<tr>";
                    echo "<td>" . $promotion->promotion_title . "</td>";
                    $date = new DateTime($promotion->start_date);
                    echo "<td>" .$date->format('F j, Y'). '</td>';
                    $date2 = new DateTime($promotion->end_date);
                    echo "<td>" .$date2->format('F j, Y'). '</td>';
                    echo "<td>" . $promotion->status . "</td>";
                    echo "<td>".html::anchor("promotion/edit/".$promotion->id."/",html::image('media/images/edit.png'))."</td>";
                    echo "</tr>";

			    }
		    ?>
            </tbody>
		</table>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable();    
            $( "#accordion" ).accordion({collapsible: true,active: false});
        });
    </script>
	</div>
</div>