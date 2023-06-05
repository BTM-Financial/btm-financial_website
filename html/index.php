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
   </head>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
      <!-- Header Section Start-->
      <!-- Header Section End -->
      <!-- Banner Section Start-->
      <section class="Banner">
         <div class="container-fluid">
            <div class="row">
               <div id="carouselExampleCaptions" class="carousel slide p-0" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                     <?php 
                     $banner=0;
                     $getBanners = $conn->getALLData("SELECT * FROM `banners` WHERE `status` = 1 ORDER BY `id` DESC");
                     foreach($getBanners as $getBanner){
                     
                     ?>
                     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $banner; ?>" <?php if($banner==0){ ?> class="active" aria-current="true" <?php } ?> aria-label="Slide <?php echo $banner; ?>"></button>
                     <?php $banner++; } ?>
                  </div>
                  <div class="carousel-inner">
                     <?php 
                     $banner=0;
                     $getBanners = $conn->getALLData("SELECT * FROM `banners` WHERE `status` = 1 ORDER BY `id` DESC");
                     foreach($getBanners as $getBanner){
                     
                     ?>
                    <div class="carousel-item <?php if($banner==0){ ?> active <?php } ?>">
                        <img src="<?php echo $websiteUrl.'uploads/banners/'.$getBanner['image']; ?>" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                           <h3><?php echo $getBanner['title']; ?></h3>
                           <p><?php echo $getBanner['heading']; ?></p>
                        </div>
                     </div>
                     <?php $banner++; } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Banner Section End -->
      <!-- About Section Start  -->
      <section class="about_section">
         <div class="container-fluid">
            <div class="row vertical_align ">
               <div class="col-12 col-md-6">
                  <div class="about_img"> <img src="<?php echo $websiteUrl; ?>images/about_img.png"> </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="about_content">
                     <h3>We are a trusted partner to businesses around the world and give our customers the confidence to reach their full potential.</h3>
                     <p>For modern marketers, leveraging data is the key to brand growth. Which is why more advertisers are prioritizing the value of the open internet. Unlike walled gardens, the open internet lets you use data to grow your audience across the widest range of websites, apps, podcasts, streaming TV platforms, and more — comparing performance openly and objectively.</p>
                     <a class="read_more_btn" href="<?php echo $websiteUrl; ?>about-btm">Learn More</a> 
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- About Section End -->
      <!-- Service Section Start -->
      <section class="services">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h3>Everything you need</h3>
                  <h4>to tame the modern cloud</h4>
                  <div class="seprator"> <img src="<?php echo $websiteUrl; ?>images/separator.png"> </div>
                  <p class="w-75 p-3 mx-auto">Simplify cloud complexity, innovate faster, and consistently deliver better business outcomes with observability, automation, and intelligence in one platform.</p>
               </div>
            </div>
            <div class="row">
               <div class="outer">
                  <!---Carousel Tabs-->
                  <div id="thumbs" class="owl-carousel owl-theme">
                    <?php 
                    $getServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1");
                    foreach($getServices as $getService){
                        $explodeText = explode(' ', $getService['title']);
                    ?>
                     <div class="item">
                        <li class="" role="presentation"><i></i><span><?php echo $getService['title']; //for($x=0; $x <count($explodeText); $x++) {echo "$explodeText[$x] <br>";} ?></span></li>
                     </div>
                     <?php } ?>
                     
                  </div>
                  <!---Carousel Tabs-->
                  <!---Carousel Data-->
                  <div id="big" class="owl-carousel owl-theme detail_section">
                     <!---1 Tab Data-->
                     <?php
                      $ser=0; 
                      foreach($getServices as $getService){
                          $ser++;
                          $num_padded = sprintf("%02d", $ser);
                      ?>
                      <?php if($ser%2 == 1){ ?>
                     <div class="item custom_row">
                        <div class="container-fluid p-0 ">
                           <div class="row vertical_align ">
                              <div class="col-12 col-md-6 p-0">
                                 <div class="service_img"> <img src="<?php echo $websiteUrl.'uploads/services/'.$getService['home_image']; ?>" /></div>
                              </div>
                              <div class="col-12 col-md-6 ">
                                 <div class="service_content_block">
                                    <div class="number"><?php echo $num_padded; ?></div>
                                    <h3><?php echo $getService['title']; ?></h3>
                                    <p><?php echo $getService['home_desc']; ?></p>
                                    <a href="<?php echo $websiteUrl.'service/'.$getService['slug']; ?>" class="read_more_2">Learn More</a> 
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php }else{ ?>
                      <div class="item society_management_block custom_row">
                        <div class="container-fluid p-0 ">
                           <div class="row vertical_align custom_row">
                              <div class="col-12 col-md-6 second-on-mobile">
                                 <div class="service_content_block">
                                    <div class="number"><?php echo $num_padded; ?></div>
                                    <h3><?php echo $getService['title']; ?></h3>
                                    <p><?php echo $getService['home_desc']; ?></p>
                                    <a href="<?php echo $websiteUrl.'service/'.$getService['slug']; ?>" class="read_more_2">Learn More</a>
                                 </div>
                              </div>
                              <div class="col-12 col-md-6 p-0 first-on-mobile">
                                 <div class="service_img"> <img src="<?php echo $websiteUrl.'uploads/services/'.$getService['home_image']; ?>" /></div>
                              </div>
                           </div>
                        </div>
                     </div>
                      <?php } } ?>
                     <!---1 Tab Data-->
                     <!---2 Tab Data-->
                     
                  </div>
                  <!---Carousel Data-->
                  <div class="cl"></div>
               </div>
            </div>
            <!-- <div class="row">
               <div class="col-12"> <a class="service_btn" href="#">EXPLORE ALL SERVICES</a> </div>
               </div> -->
         </div>
      </section>
      <!-- Service Section End -->
      <!-- Map Section Start-->
      <section class="map_section">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <h3>The world is our workplace</h3>
                  <h4>We go global so you can too</h4>
               </div>
               <div class="col-12">
                  <div class="map-image-wrapper">
                     <img src="images/map-img.png">             
                     <button type="button" class="btn btn-secondary points point1 ripple"><span>Vancouver</span></button>
                     <button type="button" class="btn btn-secondary points point2 ripple" ><span>New York</span></button>
                     <button type="button" class="btn btn-secondary points point3 ripple"><span>London</span></button>
                     <button type="button" class="btn btn-secondary points point4 ripple"><span>San Francisco</span></button>
                     <button type="button" class="btn btn-secondary points point5 ripple"><span>Zurich</span></button>
                     <button type="button" class="btn btn-secondary points point6 ripple"><span>Los Angeles</span></button>
                     <button type="button" class="btn btn-secondary points point7 ripple"><span>Gurgaon</span></button>
                     <button type="button" class="btn btn-secondary points point8 ripple"><span>Singapore</span></button>
                     <button type="button" class="btn btn-secondary points point9 ripple"><span>Toronto</span></button>
                     <button type="button" class="btn btn-secondary points point10 ripple"><span>Chicago</span></button>
                     <button type="button" class="btn btn-secondary points point11 ripple"><span>Sydney</span></button>
                     <button type="button" class="btn btn-secondary points point12 ripple"><span>Dubai</span></button>
                     <button type="button" class="btn btn-secondary points point13 ripple"><span>Boston</span></button>
                  </div>
                  <div class="col-12">
                     <div class="mt-5 mb-5">
                     </div>
                  </div>
               </div>
            </div>
      </section>
      <!-- Map Section End-->
      <!-- PRoject start End -->
      <section class="project">
      <div class="container-fluid">
      <div class="row">
      <div class="col-12 col-md-4">
      <div class="project_section">
      <h3>We've helped<br>companies create</h3>
      <h4 class="gradient_text">Amazing Projects</h4>
      </div>
      </div>
      <div class="col-12   col-md-8">
      <div class="project-carousel">
      <div class="owl-stage-outer">
      <section class="testimonials">
      <div class="container">
      <div class="row">
      <div class="col-sm-12">
      <div id="customers-testimonials" class="owl-carousel">
      <!--case-study 1 -->
      <?php 
        $getStories = $conn->getAllData("SELECT * FROM `success_stories` WHERE `status` = 1");
        foreach($getStories as $getStory){
      ?>
      <div class="item">
      <div class="shadow-effect">
      <h3 class="title"><?php echo $getStory['title']; ?></h3> 
      <img class="img-responsive" src="<?php echo $websiteUrl.'uploads/success-stories/'.$getStory['image']; ?>" alt="">
      <div class="item-details">
      <p><?php echo $getStory['short_desc']; ?></p> 
      <a class="case_study" href="<?php echo $websiteUrl.'solution/'.$getStory['slug']; ?>">View SUCCESS STORY</a> 
      </div>
      </div>
      </div>
      <?php } ?>
      <!--END OF case-study 1 -->
      
      </div>
      </div>
      </div>
      </div>
      </section>
      <!-- END OF TESTIMONIALS -->
      </div>
      <div class="owl-controls">
      <div class="owl-nav">
      <div class="owl-prev" style="display: none;"><i class="fa fa-angle-left"></i></div>
      <div class="owl-next" style="display: none;"><i class="fa fa-angle-right"></i></div>
      </div>
      <div class="owl-dots" style="">
      <div class="owl-dot active"><span></span></div>
      <div class="owl-dot"><span></span></div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </section>
      <!-- Project End -->
      <!-- Team Section Start -->
      <section class="team">
      <div class="container">
      <div class="row custom-row vertical_align">
      <div class="col-12 col-md-12 second-on-mobile">
      <div class="team-section-content">
      <img src="images/square.jpg">
      <h2>AWE-INSPIRING LEADERSHIP,<br>
      GLOBAL STRATEGY</h2>
      <p>“We’ve learned that when product strategy and UX design starts with real people — when it starts with empathy — it ends with customer success.”</p>
      <a href="about-btm.php#leadership" class="team_btn">MEET THE TEAM</a>
      </div>
      </div>
      <!--<div class="col-12 col-md-12 first-on-mobile">-->
      <!--  <div class="team-img">-->
      <!--    <img src="images/team-img.png">-->
      <!--  </div>-->
      <!--</div>-->
      </div>
      </div>
      </section>
      <!-- Team Section End -->
      <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>