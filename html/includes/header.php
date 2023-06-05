<nav class="navbar navbar-expand-lg navbar-light header">
   <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo $websiteUrl; ?>"><img src="<?php echo $websiteUrl; ?>images/logo.jpg"> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"> <a class="nav-link <?php if($currentpage=='home'){?>active<?php }?>" href="<?php echo $websiteUrl; ?>" tabindex="-1" aria-disabled="true">Home</a> </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle <?php if($currentpage=='about_us'){?>active<?php }?>" href="about-btm.php"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">About BTM Financial</a> 
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>about-btm#why-choose">Who We Are?</a></li>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>about-btm#leadership">Leadership</a></li>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>about-btm#why-us">Why Us</a></li>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>about-btm#technology-stack">Technology Stack</a></li>
               </ul>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle  <?php if($currentpage=='services'){?>active<?php }?>" href="services" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a> 
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php 
                  $getHeaderServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1");
                  foreach($getHeaderServices as $getHeaderService){
                  ?>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl.'service/'.$getHeaderService['slug']; ?>"><?php echo $getHeaderService['title']; ?></a></li>
                  <?php } ?>
               </ul>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle  <?php if($currentpage=='solution'){?>active<?php }?>" href="solution" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solutions</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>solutions">Success Stories</a></li>
               </ul>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle  <?php if($currentpage=='industries'){?>active<?php }?>" href="industries" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Industries</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php 
                  $getHeaderIndustries = $conn->getAllData("SELECT * FROM `industries` WHERE `status` = 1");
                  foreach($getHeaderIndustries as $getHeaderIndustry){
                  ?>
                  <li><a class="dropdown-item   scrollTo" href="<?php echo $websiteUrl; ?>industries#<?php echo $getHeaderIndustry['slug']; ?>"><?php echo $getHeaderIndustry['title']; ?></a></li>
                  <?php } ?>
               </ul>
            </li>
            <li class="nav-item dropdown ">
               <a class="nav-link dropdown-toggle  <?php if($currentpage=='career'){?>active<?php }?>" href="career.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Careers</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>life-at-btm">Life at BTM</a></li>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>we-aim-for-the-stars">We aim for the stars</a></li>
                  <li><a class="dropdown-item" href="<?php echo $websiteUrl; ?>job-openings">Job Openings</a></li>
               </ul>
            </li>
         </ul>
         <div class="search-button d-flex">
            <button id="search" class="search-text" onclick="location.href='<?php echo $websiteUrl; ?>search';"><i class="fa fa-search"></i><span class="search-text">Search</span></button>
         </div>
      </div>
   </div>
</nav>