<div id = 'update_supp'>
<?php 
                foreach($supplies_information as $supply)
                {    
                     $supply->id;
                     
                     $supply->item;
                     $supply->hardware_type;
                     $supply->manufacturer;
                     $supply->number_of_supply;
                     $supply->price;
                     $supply->description; 
                }
                //$date = new DateTime($supply->date_acquired);
                //$date->format('F j, Y');
?>
<?php echo form::open('/supply/update/'.$supply->id); ?>
<fieldset><fieldset>
<legend><h2>Item Information</h2></legend>
<label>Acquired Date: </label>
    <input type="date" id="date_acquired" class="width-25" name="date_acquired" value=<?=$supply->date_acquired;?> required disabled>
<label>Hardware Type:</label>
    <input type="text" id="hardware_type" class="width-25" name="hardware_type" value=<?=$supply->hardware_type?> required disabled>
<br/><br/>
<label>Product Name:</label>
    <input type="text" id="item" class="width-25" name="item" value=<?=$supply->item?> required disabled>

<label>Manufacturer:</label>
    <input type="text" id="manufacturer" class="width-25" name="manufacturer" value=<?=$supply->manufacturer?> required disabled>
<br/><br/>
<label>Stocks Available:</label>
    <input type="number" id="number_of_supply" class="width-25" name="number_of_supply" value=<?=$supply->number_of_supply?> min="1" required disabled>
<label>Price:</label>
    <input type="number" id="price" class="width-25" name="price" value=<?=$supply->price?> min="15" required disabled>
<br/><br/>
<label>Product Description:</label>
<textarea id ="" name="description" disabled><?=$supply->description?></textarea>
<br/>
<input type="submit" id="submit" class="btn" value="Submit" />
<button id="edit" class="btn">Edit</button>
<?php echo "&nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Cancel</button>"?>
</fieldset>
</fieldset>
<?=form::close()?>
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
            $("#date_acquired").prop('disabled', false);
            $("#hardware_type").prop('disabled', false);
            $("#item").prop('disabled', false);
            $("#manufacturer").prop('disabled', false);
            $("#number_of_supply").prop('disabled', false);
            $("#price").prop('disabled', false);
            $("#description").prop('disabled', false);
        });
    }
}

</script>