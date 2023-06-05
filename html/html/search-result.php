<?php

session_start();
error_reporting();
require 'config/config.php';

$db = new dbClass();

if(isset($_REQUEST['search'])){
    $keywords = $db->addStr($_REQUEST['keywords']);
    
    $getIndustries = $db->getAllData("SELECT * FROM `industries` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    $getServices = $db->getAllData("SELECT * FROM `services` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
}

?>
<!doctype html>
<html lang="en">
   <head>
      <?php include 'head.php';?>
      <link rel="stylesheet" type="text/css" href="css/style2.css">
   </head>
   <body>
      <?php include 'header.php';?>
      <div id="butter">
         <section class="inner_page_banner" style="background-image: url(images/banner/banner-about.we.bp);">
            <div class="container">
               <div class="row vertical_align banner-height">
                  <div class="col-12">
                     <!-- <h5>Search</h5> -->
                     <div class="clearfix"></div>
                     <h1 class="txt-center">Search Results</h1>
                     <form name="filterData" id="filterData" method="get">
                        <div class="search-result-form">
                           <div class="container">
                              <div class="row">
                                 <div class="col-md-2"></div>
                                 <div class="col-md-6 col-sm-12 p-0">
                                    <input type="text" name="keywords" value="<?php if(!empty($keywords)){ echo $keywords; } ?>" placeholder="Type to search">
                                 </div>
                                 <div class="col-md-2 col-sm-12 p-0">
                                    <input type="submit" class="service_btn mt-0" name="search" value="SEARCH">
                                 </div>
                                 <div class="col-md-2"></div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="container inner_page_container spacing-class">
               <?php if(empty($getIndustries) && empty($getServices)){ ?>
               <div class="row">
                  <h2>No results for </h2>
                  <div class="bar_seprator"></div>
                  <h4 class="sub-heading">Search tips</h4>
                  <ul>
                     <li>Check your spelling and try again.</li>
                     <li>Search for simpler, shorter terms.</li>
                     <li>Search for something less specific.</li>
                  </ul>
               </div>
               <?php } ?>
               
               <?php if(!empty($getIndustries) || !empty($getServices)){ ?>
               <div class="row">
                  <h2>Searching for <?php echo $keywords; ?> </h2>
                  <div class="bar_seprator"></div>
                  
                  <?php if(!empty($getIndustries)){ ?>
                  <h4 class="sub-heading">Industries</h4>
                  <ul>
                     <?php 
                     foreach($getIndustries as $industry){
                     ?>
                     <li><a href="<?php echo $industry['slug']; ?>" target="_blank"><?php echo $industry['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getServices)){ ?>
                  <hr>
                  <h4 class="sub-heading">Services</h4>
                  <ul>
                     <?php 
                     foreach($getServices as $service){
                     ?>
                     <li><a href="<?php echo $service['slug']; ?>" target="_blank"><?php echo $service['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
               </div>
               <?php } ?>
               
            </div>
         </section>
         <?php include 'footer-template.php';?>
      </div>
   </body>
   <?php include 'footer.php';?>
</html>