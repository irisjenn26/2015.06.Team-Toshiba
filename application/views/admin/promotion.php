
<div>
	<div id = "accordion">
    <h3> Promotions </h3>
    <div>
        <?php echo form::open() ?>
        <fieldset>
            <legend>Promotion Information</legend>
            <fieldset>
                <?php echo form::label('label1','Start Date: '); ?>                 
                <input type="date" id="start_date" name="start_date"><br/><br/>
                <?php echo form::label('label2','End Date: '); ?>
                <input type="date" id="end_date" name="end_date"><br/><br/>
                <?php echo form::label('label3','Description: '); ?>               
                <?php echo form::input('description'); ?><br/><br/>
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
                    <th>ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($promotions_list as $promotion)
                {
                    echo "<tr>";
                    echo "<td>" . $promotion->id . "</td>";
                    echo "<td>" . $promotion->start_date . "</td>";
                    echo "<td>" . $promotion->end_date . "</td>";
                    echo "<td>" . $promotion->status . "</td>";
                    echo "</tr>";

			}
		?>
            </tbody>
		</table>
        <script type="text/javascript">
//        $(document).ready(function(){
//            $('#dataTable').dataTable();    
//        });
        $( "#accordion" ).accordion({collapsible: true,active: false});
    </script>
	</div>
</div>