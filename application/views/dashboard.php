<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Welcome</a></li>
        <li><a href="#tabs-2">Reports</a></li>
        <li><a href="#tabs-3">Logs</a></li>
    </ul>
    <div id="tabs-1">
        <fieldset>
            <h2>Welcome,</h2><h3><?php echo $_SESSION['firstname']?></h3><h2> !</h2>
        </fieldset>
    </div>
    <div id="tabs-2">
         <?php 
        foreach($total_income as $total => $tot){
        }

        foreach($monthly_income as $month => $mon){
        }

        foreach($yearly_income as $yearly => $year){
        }

        echo form::open_fieldset(array('for' => 'dash_field',
                                     'class' => ''));  

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
        echo form::close_fieldset();
        ?>
    </div>
    <div id="tabs-3">
        <?= View::factory('logs')->render();?>
    </div>
</div>
<script type="text/javascript">
    $("#tabs").tabs();
</script>
        