<?php

session_start();
error_reporting(0);
require 'config/config.php';
$conn = new dbClass();

// get career id
$solutionId = $_REQUEST['solutionId'];

$getDetails = $conn->getData("SELECT * FROM `success_stories` WHERE `status` = 1 AND `slug` = '$solutionId'");
$storyId = $getDetails['id'];

?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
      <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/case-study.webp);">
         <div class="container">
            <div class="row vertical_align banner-height case-study">
               <div class="col-12">
                  <h5>SUCCESS STORY</h5>
                  <div class="clearfix"></div>
                  <h1><?php echo $getDetails['title']; ?></h1>
               </div>
            </div>
         </div>
         <div class="container inner_page_container spacing-class">
            
            <?php echo $getDetails['description']; ?>

            <div class="row">
               <div class="col-12">
                  <h2>Related Case Studies</h2>
                  <div class="bar_seprator"></div>
                  <div  class="owl-carousel owl-theme detail_section related-case-study-section">
                  <?php 
                          $getStories = $conn->getAllData("SELECT * FROM `success_stories` WHERE `status` = 1 AND id!='$storyId'");
                          foreach($getStories as $getStory){
                  ?>    
                  <div class="item mb-0">
                        <div class="container-fluid p-0 ">
                           <div class="row mb-4">
                              <div class="col-12 col-md-4 p-0">
                                 <div class="case-img"> <img src="<?php echo $websiteUrl.'uploads/success-stories/'.$getStory['image']; ?>"> </div>
                              </div>
                              <div class="col-12 col-md-8">
                                 <div class="case-content-wrapper">
                                    <h3 class="sub-heading"><?php echo $getStory['title']; ?></h3>
                                    <p><?php echo $getStory['short_desc']; ?></p>
                                          <a class="read_more_btn" href="<?php echo $websiteUrl.'solution/'.$getStory['slug']; ?>">Read More</a> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                     
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
      </section>
      <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>