<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
</head>
<body>
     <div id="tooplate_body_wrapper">
        <div id="tooplate_wrapper">
            <div id="tooplate_top_bar">
                <a class="logout" href="../toshiba/login/logout">Log Out</a>
                <h5 id="user"><?php echo $name = $_SESSION['firstname'];?> - <?= $_SESSION['role']?></h5>
            </div>	
            <?=View::factory("includes/header")->render(true)?>
            <?=View::factory("includes/navigation")->render(true)?>
            <br/>
            <br/>
            <div id="tooplate_main">
            <?php echo $content; ?>
            </div><!--end of the tooplate_main-->
            <div class="cleaner"></div>
         </div> <!-- end of forever wrapper -->
        </div> <!-- end of forever body wrapper -->
         
    <?=View::factory("includes/footer")->render(true)?>
</body>
</html>