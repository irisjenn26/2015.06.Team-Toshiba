<div id="accordion">
        <h3>Add New Contract</h3>
        <div>
        <?php echo form::open('/contract/create_contract'); ?> 
                <?php echo form::legend('Add New Contract',array('id' => 'supply_legend', 'class' => ''));
                      echo form::label(array('for' => 'label1', 'class' => ''),'Date Started: ')."&nbsp";
                      echo "<input type='date' id='date_start' name='date_start' class='width-25' required>&nbsp";

                      echo form::label(array('for' => 'label3', 'class' => ''), 'Expiration Date: ');
                      echo "<input type='date' id='date_end' name='date_end' class='width-25' required><br/><br/>";
                      
                      echo form::label('label1','Contract Path: ');
                      echo form::input('contract_path','/media/images/contract/',"class='width-100' required")."<br/><br/>";
                      echo form::submit('submit', 'submit', 'class="btn"');             
                   form::close() ?>      
        </div>          
</div>
<br/>
	<div id = "table">
		<table id="dataTable" class="display">
			      <thead>
                <tr>
                    <th>Date Established</th>
                    <th>Expiration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>    
            <?php
                foreach($contract_list as $contract)
                {
                    echo "<tr>";
                    $date_start = new DateTime($contract->date_start);
                    echo "<td>" .$date_start->format('F j, Y'). '</td>';
                    $date_end = new DateTime($contract->date_end);
                    echo "<td>" .$date_end->format('F j, Y'). '</td>';
                    echo "<td>".html::anchor("contract/edit/".$contract->id."/",html::image('media/images/edit.png'))."</td>"; 
                    echo "</tr>";
			          }?>
            </tbody>
		</table>
       <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable()    
        });

        $( "#accordion" ).accordion({
                          heightStyle: "content",
                          collapsible: true,
                          active: false
        });
      </script>
	</div>
</div>