Login = 
{
    process: function()
    {
      var username = $('#username').val();
      var password = $('#password').val();
        
      $.ajax({
        type: 'POST',
          url: 'http://localhost/kohana/index.php/login/process_login',
          data: {username: username, password: password},
          dataType: 'JSON',
          success: function(data)
          {
            alert(data);
          }
      });
    },
    click_event: function()
    {
        $('#login').on('click', function(e){
            e.preventDefault();
            Login.process();
        });
    }
}

$(document).ready(function(){
    Login.click_event();
});