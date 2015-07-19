<!--<?php //if(util::permission("can_add_request")){?>-->
<div>
	<?= View::factory('create_request')->render(TRUE);?>
	</div>
<?php //} ?>
    <br/>
    <?php //if(util::permission("can_view_requests")){?>
	
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
    </div>
    <?php //}?>
   
        <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable();    
        });
        $( "#accordion" ).accordion({collapsible: true,active: false,});
    </script>
	