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
                <a class="logout" href="http://localhost/OJT/logout">Log Out</a>
            </div>	
            <?=View::factory("includes/header")->render(true)?>
            <div id="tooplate_middle_subpage">
            </div>
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