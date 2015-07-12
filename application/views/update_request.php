<h3> Request </h3>
    <div>
    <?php foreach($request_data as $request)
                {
                    $request->date_requested;
                    $request->date_needed;
                    $request->request_item;
                    $request->delivery_address;
                    $request->quantity;
			}
			?>
        <?php echo form::open('/request/update') ?>
        <fieldset>
            <legend>Request Information</legend>
            <fieldset>
                <?php echo form::label('label1','Date Requested: '); ?>                 
                <input type="date" id="date_requested" name="date_requested" value=<?=$request->date_requested?> required>&nbsp
                <?php echo form::label('label2','Date Needed: '); ?>
                <input type="date" id="date_needed" name="date_needed" value=<?=$request->date_needed?> required><br/><br/>
                <?php echo form::label('label3','Delivery Address: ');              
                      echo form::input('delivery_address',$request->delivery_address ,'required');?> &nbsp
                <?php echo form::label('label4', 'Item: ');
                      echo form::input('request_item',$request->request_item, 'required');?>
                      <br/><br/>
                <?php echo form::label('label5', 'Amount: ')?>
                      <input type='number' id='quantity' class='width-25' name='quantity' min='1' value=<?=$request
                      ->quantity?>required/>&nbsp &nbsp &nbsp
                <?php  echo form::submit('submit','submit','class ="btn"'); ?>
            </fieldset>
        </fieldset>
        <?php form::close() ?>      
        </div>
        <script>
	    $('#tooplate_menu').click(function(event){
	    event.preventDefault();
	    });      
	    </script>