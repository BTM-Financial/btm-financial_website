<?php

session_start();
error_reporting(0);
require 'config/config.php';
$conn = new dbClass();

?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
      <link rel="stylesheet" type="text/css" href="<?php echo $websiteUrl; ?>css/style2.css">
   </head>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
         <section class="inner_page_banner">
            <div class="container">
               <div class="row vertical_align banner-height">
                  <div class="col-12">
                     <!-- <h5>Search</h5> -->
                     <div class="clearfix"></div>
                     <h1 class="txt-center">Thank You</h1>
                     <h2 class="txt-center text-white"><?php echo $_REQUEST['msg']; ?></h2>
                  </div>
               </div>
            </div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>