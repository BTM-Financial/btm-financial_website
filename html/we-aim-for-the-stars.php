<?php

session_start();
error_reporting();
require 'config/config.php';
$conn = new dbClass();

$getAboutDetails = $conn->getData("SELECT * FROM `pages` WHERE `page_id` = 3");

?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   </head>
   <?php include 'includes/header.php';?>
   <div id="butter" class="career-sub-pages">
      <section class="inner_page_banner" style="background-image: url(images/banner/career-insight.jpg);">
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

               <div class="col-lg-4 col-md-4 col-12 mt-5 mb-5 text-center  playfair_font ">
                  <h4><span class="display-5 d-block">Employee</span> friendly work environment</h4>
               </div>
               <div class="col-lg-4 col-12 mt-5 mb-5 text-center  playfair_font ">
                  <h4><span class="display-5 d-block">Best</span> in class compensation</h4>
               </div>
               <div class="col-lg-4 col-12 mt-5 mb-5 text-center  playfair_font ">
                  <h4><span class="display-5 d-block">Opportunity</span> to learn & grow</h4>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
      </section>
      <!-- Button trigger modal -->
      <?php include 'includes/footer-content.php';?>
   </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>