<?php defined('SYSPATH') or die('No direct script access.');
class Test_Controller extends Controller {
   
    public function index()
    {
       ?>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Osang Kaligayahan</td>
                    <td>16</td>
                </tr>
                <tr>
                    <td>Kim Ana</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>Daphne Panda</td>
                    <td>19</td>
                </tr>
            </tbody>
        </table>
    <script type="text/javascript" charset="utf-8" src="<?php echo url::base()?>/media/js/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo url::base()?>/media/css/jquery.dataTables.css">
 
   <script type="text/javascript" charset="utf8" src="<?php echo url::base()?>/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#dataTable').dataTable();    
        });
    </script>
<?php
    }
    
}