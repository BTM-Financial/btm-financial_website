<?php

session_start();
error_reporting();
require 'config/config.php';

$conn = new dbClass();

if(isset($_REQUEST['search'])){
    $keywords = $conn->addStr($_REQUEST['keywords']);
    $keywordsStatic = $conn->addStr($_REQUEST['keywords']);
    
    if($keywords=='Services' || $keywords=='services' || $keywords=='Service' || $keywords=='service'){
        $getServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1");    
    }else{
        $getServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='Solutions' || $keywords=='solutions' || $keywords=='Solution' || $keywords=='solution' || $keywords=='Success Stories' || $keywords=='success stories'){
        $getSolutions = $conn->getAllData("SELECT * FROM `success_stories` WHERE `status` = 1");    
    }else{
        $getSolutions = $conn->getAllData("SELECT * FROM `success_stories` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='Industries' || $keywords=='industries'){
        $getIndustries = $conn->getAllData("SELECT * FROM `industries` WHERE `status` = 1");    
    }else{
        $getIndustries = $conn->getAllData("SELECT * FROM `industries` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='Careers' || $keywords=='careers' || $keywords=='Career' || $keywords=='career' || $keywords=='Job Openings' || $keywords=='Job openings' || $keywords=='job openings' || $keywords=='Job opening' || $keywords=='job opening' || $keywords=='job'){
        $getCareers = $conn->getAllData("SELECT * FROM `careers` WHERE `status` = 1");
    }else{
        $getCareers = $conn->getAllData("SELECT * FROM `careers` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");    
    }
    
    if($keywords=='Who We Are?' || $keywords=='Who We Are' || $keywords=='Who we are' || $keywords=='who we are?' || $keywords=='who we are' || $keywords=='who we'){
        $getPages = $conn->getAllData("SELECT * FROM `pages` WHERE `is_active` = 1");
    }else{
        $getPages = $conn->getAllData("SELECT * FROM `pages` WHERE `is_active` = 1 AND `page_title` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='Leadership' || $keywords=='leadership' || $keywords=='Leaderships' || $keywords=='leaderships' || $keywords=='leader' || $keywords=='leaders'){
        $getLeaderships = $conn->getAllData("SELECT * FROM `leaderships` WHERE `status` = 1");
    }else{
        $getLeaderships = $conn->getAllData("SELECT * FROM `leaderships` WHERE `status` = 1 AND `name` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='Why Choose US' || $keywords=='Why choose us' || $keywords=='why choose us' || $keywords=='why choose' || $keywords=='Why us' || $keywords=='why us'){
        $getWhyUs = $conn->getAllData("SELECT * FROM `why_chooses` WHERE `status` = 1");
    }else{
        $getWhyUs = $conn->getAllData("SELECT * FROM `why_chooses` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    } 
    
    if($keywords=='Technology Stack' || $keywords=='Technology stack' || $keywords=='technology stack' || $keywords=='Technology' || $keywords=='technology' || $keywords=='stack' || $keywords=='technologies' || $keywords=='Technologies'){
        $getTechnologies = $conn->getAllData("SELECT * FROM `technologies` WHERE `status` = 1");
    }else{
        $getTechnologies = $conn->getAllData("SELECT * FROM `technologies` WHERE `status` = 1 AND `title` LIKE '%".$keywords."%'");
    }
    
    if($keywords=='About BTM Financial' || $keywords=='About btm financial' || $keywords=='about btm financial' || $keywords=='about btm' || $keywords=='btm financial' || $keywords=='btm financials'){
        $getLeaderships = $conn->getAllData("SELECT * FROM `leaderships` WHERE `status` = 1");
        $getTechnologies = $conn->getAllData("SELECT * FROM `technologies` WHERE `status` = 1");
        $getPages = $conn->getAllData("SELECT * FROM `pages` WHERE `is_active` = 1");  
    }

}

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
         <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/banner-about.we.bp);">
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
               <?php if(empty($getIndustries) && empty($getServices) && empty($getSolutions) && empty($getCareers) && empty($getLeaderships) && empty($getTechnologies) && empty($getWhyUs) && empty($getPages)){ ?>
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
               
               <?php if(!empty($getIndustries) || !empty($getServices) || !empty($getSolutions) || !empty($getCareers) || !empty($getLeaderships) || !empty($getTechnologies) | !empty($getWhyUs) || !empty($getPages)){ ?>
               <div class="row">
                  <h2>Searching for <?php echo $keywords; ?> </h2>
                  <div class="bar_seprator"></div>
                  <?php if($keywords=='About BTM Financial' || $keywords=='About btm financial' || $keywords=='about btm financial' || $keywords=='about btm' || $keywords=='btm financial' || $keywords=='btm financials'){ ?>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>about-btm#why-choose">Who We Are?</a></h4>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>about-btm#leadership">Leadership</a></h4>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>about-btm#why-us">Why Us</a></h4>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>about-btm#technology-stack">Technology Stack</a></h4>
                  <?php } ?>
                  
                  <?php if(!empty($getServices)){ ?>
                  
                  <h4 class="sub-heading">Services</h4>
                  <ul>
                     <?php 
                     foreach($getServices as $service){
                     ?>
                     <li><a href="<?php echo $websiteUrl.'service/'.$service['slug']; ?>" target="_blank"><?php echo $service['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getSolutions)){ ?>
                  <hr>
                  <h4 class="sub-heading">Solutions</h4>
                  <ul>
                     <?php 
                     foreach($getSolutions as $getSolution){
                     ?>
                     <li><a href="<?php echo $websiteUrl.'solution/'.$getSolution['slug']; ?>" target="_blank"><?php echo $getSolution['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getIndustries)){ ?>
                  <hr>
                  <h4 class="sub-heading">Industries</h4>
                  <ul>
                     <?php 
                     foreach($getIndustries as $industry){
                     ?>
                     <li><a href="<?php echo $websiteUrl; ?>industries#<?php echo $industry['slug']; ?>" target="_blank"><?php echo $industry['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getCareers)){ ?>
                  <?php if($keywords=='Careers' || $keywords=='careers' || $keywords=='Career' || $keywords=='career'){ ?>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>life-at-btm">Life at BTM</a></h4>
                  <hr>
                  <h4 class="sub-heading"><a href="<?php echo $websiteUrl; ?>we-aim-for-the-stars">We aim for the stars</a></h4>
                  <?php } ?>
                  <hr>
                  <h4 class="sub-heading">Job Openings</h4>
                  <ul>
                     <?php 
                     foreach($getCareers as $getCareer){
                     ?>
                     <li><a href="<?php echo $websiteUrl.'career/'.$getCareer['slug']; ?>" target="_blank"><?php echo $getCareer['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getLeaderships)){ ?>
                  <hr>
                  <h4 class="sub-heading">Leadership</h4>
                  <ul>
                     <?php 
                     foreach($getLeaderships as $getLeadership){
                     ?>
                     <li><a href="<?php echo $websiteUrl; ?>about-btm#leadership" target="_blank"><?php echo $getLeadership['name']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getWhyUs)){ ?>
                  <hr>
                  <h4 class="sub-heading">Why us</h4>
                  <ul>
                     <?php 
                     foreach($getWhyUs as $getWhyUs){
                     ?>
                     <li><a href="<?php echo $websiteUrl; ?>about-btm#why-us" target="_blank"><?php echo $getWhyUs['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getTechnologies)){ ?>
                  <hr>
                  <h4 class="sub-heading">Technology Stack</h4>
                  <ul>
                     <?php 
                     foreach($getTechnologies as $getTechnology){
                     ?>
                     <li><a href="<?php echo $websiteUrl; ?>about-btm#technology-stack" target="_blank"><?php echo $getTechnology['title']; ?></a></li>
                     <?php } ?>
                  </ul>
                  <?php } ?>
                  
                  <?php if(!empty($getPages)){ ?>
                  <hr>
                  <h4 class="sub-heading">Pages</h4>
                  <ul>
                     <?php 
                     foreach($getPages as $getPage){
                     ?>
                     <?php if($getPage['page_title']=='We do things differently'){ ?>
                     <li><a href="<?php echo $websiteUrl; ?>about-btm#why-choose" target="_blank"><?php echo $getPage['page_title']; ?></a></li>
                     <?php }elseif($getPage['page_title']=='Life At BTM'){ ?>
                     <li><a href="<?php echo $websiteUrl; ?>life-at-btm" target="_blank"><?php echo $getPage['page_title']; ?></a></li>
                     <?php }elseif($getPage['page_title']=='We Aim For The Stars'){ ?>
                     <li><a href="<?php echo $websiteUrl; ?>we-aim-for-the-stars" target="_blank"><?php echo $getPage['page_title']; ?></a></li>
                     <?php } } ?>
                     <li><a href="<?php echo $websiteUrl; ?>terms-of-use" target="_blank">Terms Of Use</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>privacy-policy" target="_blank">Privacy Policy</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>contact-us" target="_blank">Contact us</a></li>
                  </ul>
                  <?php } ?>
                  
                  
               </div>
               <?php } ?>
               
               
               
            </div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>