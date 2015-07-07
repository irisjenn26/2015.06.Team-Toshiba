Create_supply = 
{
    process: function()
    {
        var item = $('item').val();
        var description = $('description').val();
        var hardware_type = $('hardware').val();
        var number_of_supply = $('number_of_supply').val();
        var price = $('price').val();
        var manufacturer = $('manufacturer').val();
        var date_acquired = $('date_acquired').val();
        var status = $('status').val();
        
        $.ajax({
            type: 'POST',
                url: 'http://localhost/kohana/index.php/create_supply/process_createsupply',
                data: {item: item, description: description, hardware_type: hardware_type, number_of_supply: number_of_supply, price: price, manufacturer: manufacturer, date_acquired: date_acquired, status: status},
                dataType: 'JSON',
                success: function(data)
                {
                    window.location.href = 'base_url()/supply' ;
                }
        });
    },
    click_event: function()
    {
        $('#supply-form').on('click',function(e){
            e.preventDefault();
            Create_supply.process();
        });
    }
}

$(document).ready(function()
    {
    Create_supply.click_event();
})
                             
                    