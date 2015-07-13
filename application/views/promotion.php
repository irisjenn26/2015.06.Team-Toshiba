
<div>
	<div id = "accordion">
    <h3> Promotions </h3>
    <div>
        <?php echo form::open('/promotion/create_promotion', array('class' => '', 'method'=>'POST')); ?> 
        <fieldset>
            <legend>Promotion Information</legend>
            <fieldset>
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" name="start_date">&nbsp
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" name="end_date"><br/><br/>
                <?php echo form::label('label4', 'Title: ')?>
                <?php echo form::input('promotion_title');?><br/><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::textarea('description'); ?><br/><br/>
                 <?php echo form::label('label5','Discount: '); ?>               
                <input type="number" min="1" max="50" id="discount" name="discount"><br/><br/>
                <?php echo form::label('label6','Status: ');?>
                <?php $status = array('disabled' => 'Disabled',
                                      'enabled' => 'Enabled');
                      echo form::dropdown('status',$status,'Enabled');?>
                <br>
                <br>
                <?php echo form::submit('submit','submit'); ?>
            </fieldset>
        </fieldset>
        <?php form::close() ?>      
        </div>
	</div>
	</div>
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
        });
        $( "#accordion" ).accordion({collapsible: true,active: false});
    </script>
	</div>
</div>