<?php

session_start();
error_reporting(0);
require 'config/config.php';
$conn = new dbClass();

// get career id
$serviceId = $_REQUEST['serviceId'];

$getDetails = $conn->getData("SELECT * FROM `services` WHERE `status` = 1 AND `slug` = '$serviceId'");

?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   </head>

   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
      <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl.'uploads/services/'.$getDetails['header_image']; ?>);">
         <div class="container">
            <div class="row vertical_align banner-height">
               <div class="col-12">
                  <h5>Services</h5>
                  <div class="clearfix"></div>
                  <h1><?php echo $getDetails['title']; ?></h1>
               </div>
            </div>
         </div>
         <div class="container inner_page_container">
            <div class="row full-width-service">
               <div class="col-6  description-box">
                  <p><?php echo $getDetails['short_desc']; ?></p>               
                </div>
               <div class="col-6">
                  <div class="service-page-img">  
                    <img src="<?php echo $websiteUrl.'uploads/services/'.$getDetails['image']; ?>">
                  </div>
               </div>
            </div>
            
            <?php echo $getDetails['description_1']; ?>
            
            
            <?php echo $getDetails['description_2']; ?>
            
            <div class="clearfix"></div>
      </section>
      <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>