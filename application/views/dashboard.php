
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

  <div class="total_income">
    <label class="total">Total Income</label>
    <span id="total_income"></span>
  </div>

  <div class="monthly_income">
    <label class="month">Monthly Income</label>
    <span id="monthly_income"></span>
  </div>

  <div class="yearly_income">
    <label class="year">Yearly Income</label>
    <span id="yearly_income"></span>
  </div>
</div>
