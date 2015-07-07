/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


Create_client = 
{
    process: function()
    {
        var firstname = $('firstname').val();
        var lastname = $('lastname').val();
        var email = $('email').val();
        var address = $('address').val();
        //var gender = $().val();
        var town_city = $('town_city').val();
        var postal_code = $('postal_code').val();
        //var country = $().val();
        var comp_address = $('comp_address').val();
        var username = $('username').val();
        var password = $('password').val();
        
        $.ajax({
            type: 'POST',
                url: 'http://localhost/kohana/index.php/create_request/process_createrequest',
                data: {firstname: firstname, lastname: lastname, email: email, 
                        address: address, town_city: town_city, 
                        postal_code: postal_code, comp_address: comp_address, username:username,
                        password: password},
                dataType: 'JSON',
                success: function(data)
                {
                    window.location.href = 'base_url()/user' ;
                }
        });
    },
    click_event: function()
    {
        $('#user-form').on('click',function(e){
            e.preventDefault();
            Create_request.process();
        });
    }
}

$(document).ready(function()
    {
    Create_request.click_event();
})
                             
                    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


