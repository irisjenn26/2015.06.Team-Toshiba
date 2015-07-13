
<div id="dashboard">
  <?php 
        foreach($total_income as $total => $tot){
        }

        foreach($monthly_income as $month => $mon){
        }

        foreach($yearly_income as $yearly => $year){
        }

        echo form::open_fieldset(array('for' => 'dash_field',
                                     'class' => ''));  
       
        echo "<h1> Welcome ". $_SESSION['firstname'] . "</h1>";

        echo "<div class='total_income'>
                 <label class='total'>Total Income:</label>
                 <span id='total_income'>".$total."</span>
             </div>

            <div class='monthly_income'>
                <label class='month'>Monthly Income:</label>
                <span id='monthly_income'>".$month."</span>
            </div>

            <div class='yearly_income'>
                <label class='year'>Yearly Income:</label>
                <span id='yearly_income'>".$yearly."</span><br/ ><br />";

        echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
        echo html::anchor('/supply', 'View Supply Here')
        ."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
        echo html::anchor('/user', 'View Users Here')
        ."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
        echo html::anchor('/request', 'View Requests Here');  
        echo form::close_fieldset();?>

    
  </div>
</div>
