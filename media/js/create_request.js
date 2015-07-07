/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Create_request = 
{
    process: function()
    {
        var date_requested = $('date_requested').val();
        var date_needed = $('date_needed').val();
        var delivery_address = $('delivery_address').val();
        var quantity = $('quantity').val();
        var request_item = $('request_item').val();
        
        $.ajax({
            type: 'POST',
                url: 'http://localhost/kohana/index.php/create_request/process_createrequest',
                data: {date_requested: date_requested, date_needed: date_needed,
                        delivery_address: delivery_address, quantity: quantity, 
                        request_item: request_item},
                dataType: 'JSON',
                success: function(data)
                {
                    window.location.href = 'base_url()/request' ;
                }
        });
    },
    click_event: function()
    {
        $('#request-form').on('click',function(e){
            e.preventDefault();
            Create_request.process();
        });
    }
}

$(document).ready(function()
    {
    Create_request.click_event();
})
                             
                    