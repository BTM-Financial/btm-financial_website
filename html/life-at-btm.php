<?php

session_start();
error_reporting();
require 'config/config.php';
$conn = new dbClass();

$getAboutDetails = $conn->getData("SELECT * FROM `pages` WHERE `page_id` = 2");

?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   </head>
   <?php include 'includes/header.php';?>
   <div id="butter" class="career-sub-pages">
      <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/career-insight.jpg);">
         <div class="container">
            <div class="row vertical_align banner-height">
               <div class="col-12">
                  <h5>BTM Financial Careers</h5>
                  <div class="clearfix"></div>
                  <h1><?php echo $getAboutDetails['page_title']; ?></h1>
               </div>
            </div>
         </div>
         <div class="container inner_page_container career-page">
            <div class="row vertical_align">
               <div class="col-12 col-md-6">
               <p><?php echo $getAboutDetails['page_detail']; ?></p>
               <div class="clearfix"></div>
               </div>
               <div class="col-12 col-md-6"> <img src="<?php echo $websiteUrl.'uploads/pages/'.$getAboutDetails['image']; ?>"> </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </section>
      <!-- Button trigger modal -->
      <?php include 'includes/footer-content.php';?>
   </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>