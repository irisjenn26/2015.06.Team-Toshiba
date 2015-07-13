<div id="tooplate_middle_subpage">
    <div id="tooplate_menu">
        <ul>
            <?php
                $permission =$_SESSION['permission'];
                $perArr = json_decode($permission,true);
                        if(in_array("Can_view_Dashboard",$perArr)){}
            ?>
            <li><a href="dashboard" >Home</a></li>
            <li><a href="supply">Supplies</a></li>  
            <li><a href="request">Requests</a></li>   
            <!--<li><a href="sales">Sales</a></li>--> 
            <li><a href="user">Users</a></li>   
            <li><a href="promotion">Promotions</a></li>
            <li><a href="group">Groups</a></li>
           <li><a href="contract">Contracts</a></li>
        </ul>
    </div><!--end of the tooplate_menu-->
</div>