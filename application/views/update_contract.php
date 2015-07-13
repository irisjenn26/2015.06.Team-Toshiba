<div id="accordion">
        <h2>Update Contract</h2>
        <div>
        <br />
        <br />
        <?php 
                  foreach($contract_data as $contract)
                    {    
                     $contract->id;
                     $contract->date_start;
                     $contract->date_end;
                     $contract->contract_path; 
                    }
                      echo form::open('/contract/update/'.$contract->id);  
                      echo form::label(array('for' => 'label1', 'class' => ''),'Date Started: ')."&nbsp";
                      echo "<input type='date' id='date_start' name='date_start' class='width-25' value=$contract->date_start required>&nbsp";

                      echo form::label(array('for' => 'label3', 'class' => ''), 'Expiration Date: ');
                      echo "<input type='date' id='date_end' name='date_end' class='width-25' value=$contract->date_end required><br/><br/>";
                      
                      echo form::label('label1','Contract Path: ');
                      echo form::input('contract_path',$contract->contract_path,"class='width-100' required")."<br/><br/>";
                      echo form::submit('submit', 'submit', 'class="btn"');             
                           form::close(); 
                      echo "&nbsp &nbsp &nbsp<button id='back' class='btn' onclick='history.back()'>Cancel</button>";
                   ?>      
        </div>          
</div>
<script>
    $('#tooplate_menu').click(function(event){
    event.preventDefault();
    });      
</script>