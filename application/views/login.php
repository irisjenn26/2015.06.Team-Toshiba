
        <div id="container">
            <div id="login">
                <?php echo form::open('login/process_login'); 
                      echo form::open_fieldset(array('for' => 'log_field',
                                                   'class' => ''));   ?>
      
                        <h1>Please Sign In </h1>
                        <label>Username:</label>
                        <?php echo form::input('username'); ?>
                        <label>Password:</label>
                        <?php echo form::password('password'); ?>
                        <br/><br/>
                        <p><input type="submit" id="submit" value="Login">&nbsp
                        <?php echo html::anchor('/client', 'sign up');?>
                        <br/>
                        <?php echo html::anchor('/login/pass','Forgot Password?'); ?></p>
                        <?php $error = "";
                        echo $error; ?>
                <?php echo form::close_fieldset();
                      echo form::close(); 
                    ?>
            </div>
        </div>
