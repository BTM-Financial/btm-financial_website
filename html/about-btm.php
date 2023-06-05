<?php

session_start();
error_reporting();
require 'config/config.php';
$conn = new dbClass();

$getAboutDetails = $conn->getData("SELECT * FROM `pages` WHERE `page_id` = 1");

?>
<!doctype html>
<html lang="en">
   <head>
      <?php include 'includes/head.php';?>
      <script src="<?php echo $websiteUrl; ?>js/modernizr.custom.js"></script>
   </head>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
         <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/banner-about.webp);">
            <div class="container">
               <div class="row vertical_align banner-height">
                  <div class="col-12">
                     <h5>Company</h5>
                     <div class="clearfix"></div>
                     <h1>About BTM Financial</h1>
                  </div>
                  <div id="why-choose"></div>
               </div>
            </div>
            <div class="container inner_page_container">
               <div class="row" >
                  <div class="col-12 col-md-6">
                     <h2><?php echo $getAboutDetails['page_title']; ?></h2>
                     <div class="bar_seprator"></div>
                     <div class="clearfix"></div>
                     <p><?php echo $getAboutDetails['page_detail']; ?></p>
                  </div>
                  <div class="col-12 col-md-6"> 
                     <img src="<?php echo $websiteUrl.'uploads/pages/'.$getAboutDetails['image']; ?>">
                  </div>
                  <div id="leadership"></div>
               </div>
               <div class="row" >
                  <div class="col-12">
                     <h2>It’s all about the people</h2>
                     <div class="bar_seprator"></div>
                     <div class="clearfix"></div>
                     <p>Our highly experienced team has been recognized for its commitment to developing cutting edge technology and delivering solutions to many of the world’s leading financial institutions. We have a diverse set of workforces that allow us to adapt and deliver specialized solutions to our clients.</p>
                     <div class="main team_container">
                        
                      <ul id="og-grid" class="og-grid">
                          <?php 
                          
                          $getLeaderships = $conn->getALLData("SELECT * FROM `leaderships` WHERE `status` = 1 ORDER BY `id` ASC");
                          foreach($getLeaderships as $getLeadership){
                    
                          ?>
                          <li>
                              <a data-largesrc="<?php echo $websiteUrl.'uploads/leaderships/'.$getLeadership['image']; ?>" data-title="<?php echo $getLeadership['name']; ?>" data-description="<?php echo $getLeadership['about']; ?>">
                                 <img src="<?php echo $websiteUrl.'uploads/leaderships/'.$getLeadership['image']; ?>" alt="<?php echo $getLeadership['name']; ?>" />
                                 <h4><?php echo $getLeadership['name']; ?></h4>
                                 <h6><?php echo $getLeadership['designation']; ?></h6>
                              </a>
                           </li>
                           <?php } ?> 
                        </ul>
                     </div>
                  </div>
                  <div id="why-us"></div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <h2>Why Choose US</h2>
                     <div class="bar_seprator"></div>
                     <div class="row three-column-grid">
                        
                        <?php 
                          
                          $getWhyChooses = $conn->getALLData("SELECT * FROM `why_chooses` WHERE `status` = 1 ORDER BY `id` ASC");
                          foreach($getWhyChooses as $getWhyChoose){
                    
                        ?>
                        <div class="col-6 mb-4">
                           <div class="three-column-grid-inner">
                              <div class="whychooseus-img-wrpapper">
                                  <img src="<?php echo $websiteUrl.'uploads/why-chooses/'.$getWhyChoose['image']; ?>">
                              </div>
                              <h3><?php echo $getWhyChoose['title']; ?></h3>
                              <p><?php echo $getWhyChoose['description']; ?></p>
                           </div>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
                  <div id="technology-stack"></div>
                  
               </div>
               
               <div class="row"  data-anchor-offset="100">
                  <div class="col-12">
                     <h2>Technology Stack</h2>
                     <div class="bar_seprator"></div>
                     <div class="row technology_block row-eq-height">
                        <?php 
                          
                          $getTechnologies = $conn->getALLData("SELECT * FROM `technologies` WHERE `status` = 1 ORDER BY `id` ASC");
                          foreach($getTechnologies as $getTechnology){
                    
                        ?>
                        <div class="col-sm-6 col-md-6 mb-4 col-lg-3">
                           <div class="col-block">
                              <h3><?php echo $getTechnology['title']; ?></h3>
                              <?php echo $getTechnology['description']; ?> 
                           </div>
                        </div>
                        <?php } ?>

                        
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
   <script src="<?php echo $websiteUrl; ?>js/grid.js"></script>
   <script>
      $(function() {
        Grid.init();
      });
   </script>
</html>