<div id = 'view_request'>
<?php 
                foreach($request_information as $request)
                {
                    $request->id;
                    $request->date_requested;
                    $request->date_needed;
                    $request->request_item;
                    $request->delivery_address;
                    $request->quantity;
            }
 ?>
<?php echo form::open('/request/update/'.$request->id); ?>
<fieldset><fieldset>
<legend><h2>Request Information</h2></legend>
<label>Date Requested: </label>
    <input type="date" id="date_requested" class="width-25" name="date_acquired"  required disabled>
<label>Date Needed:</label>
    <input type="date" id="date_needed" class="width-25" name="date_needed"  required disabled>
<br/><br/>
<label>Delivery Address:</label>
    <input type="text" id="delivery_address" class="width-25" name="delivery_address"  required disabled>
<label>Requested Item:</label>
    <input type="text" id="request_item" class="width-25" name="request_item"  required disabled>
<br/><br/>
<label>Requested Amount:</label>
    <input type="number" id="quantity" class="width-25" name="quantity"  min="1" required disabled>
<br/><br/>
<input type="submit" id="submit" class="btn" value="Submit" />
<button id="edit" class="btn">Edit</button>
<?php echo "&nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Cancel</button>"?>
</fieldset>
</fieldset>
<?php form::close()?>
</div>
      
<script>
$('#tooplate_menu').click(function(event){
    event.preventDefault();
});
$(document).ready(function(){
    supply.inSupply();
});
var supply = {
    inSupply: function(){
        supply.hideElements();
        supply.showElements();
    },
    hideElements:function(){
        $("#submit").hide();
    },
    showElements:function(){
        $("#edit").click(function(){
            $("#edit").hide();
            $("#submit").show();
            $("#date_requested").prop('disabled', false);
            $("#date_needed").prop('disabled', false);
            $("#delivery_address").prop('disabled', false);
            $("#request_item").prop('disabled', false);
            $("#quantity").prop('disabled', false);
        });
    }
}

</script>