
            <div id="dashboard">
                <?php 

                      echo form::open_fieldset(array('for' => 'dash_field',
                                                   'class' => ''));  
                      echo "<h1> Welcome</h1>";
                      echo html::anchor('/admin/supply', 'view Supply Here');
                      echo "<br>";
                      echo html::anchor('/admin/user', 'view Users Here');
                      echo "<br>";
                      echo html::anchor('/client/request', 'view Requests Here');  
                      echo form::close_fieldset();?>
            </div>
