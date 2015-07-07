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
    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $('#dataTable').dataTable();    
        });
    </script>
<?php
    }
    
}