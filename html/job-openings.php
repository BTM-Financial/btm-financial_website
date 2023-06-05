<?php

session_start();
error_reporting(0);
// Require fields
require 'config/config.php';
$conn = new dbClass();

// Pagination Code Start Here	  
$tbl_name = "careers";
$adjacents = 3;
// count all records
$query = $conn->getData("SELECT COUNT(*) as num FROM $tbl_name WHERE `deleted` = 0 and `status` = 1 ORDER BY `id` DESC");
$total_pages = $query['num'];

$targetpage = $websiteUrl.'career/';
$limit = 20; 				
$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 	
else
	$start = 0;	
// fetch all records
$result = $conn->getAllData("SELECT * FROM $tbl_name WHERE `deleted` = 0 and `status` = 1 ORDER BY `id` DESC LIMIT $start, $limit");

if ($page == 0) $page = 1;					
$prev = $page - 1;							
$next = $page + 1;						
$lastpage = ceil($total_pages/$limit);	
$lpm1 = $lastpage - 1;	

$pagination = "";
if($lastpage > 1)
{	
	$pagination .= "<div class=\"pagination\">";
	
	if ($page > 1) 
		$pagination.= "<a href=\"$targetpage/$prev\"> « </a>";
	else
		$pagination.= "<a class=\"#\"> « </a>";	
	
	if ($lastpage < 7 + ($adjacents * 2))
	{	
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $page)
				$pagination.= "<a class=\"\"> $counter </a>";
			else
				$pagination.= "<a href=\"$targetpage/$counter\"> $counter </a>";					
		}
	}
	elseif($lastpage > 5 + ($adjacents * 2))
	{
		
		if($page < 1 + ($adjacents * 2))		
		{
			for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
			{
				if ($counter == $page)
					$pagination.= "<a class=\"\"> $counter </a>";
				else
					$pagination.= "<a href=\"$targetpage/$counter\"> $counter </a>";					
			}
			$pagination.= "...";
			$pagination.= "<a href=\"$targetpage/$lpm1\"> $lpm1 </a>";
			$pagination.= "<a href=\"$targetpage/$lastpage\"> $lastpage </a>";		
		}
		elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
		{
			$pagination.= "<a href=\"$targetpage/1\">1</a>";
			$pagination.= "<a href=\"$targetpage/2\">2</a>";
			$pagination.= "...";
			for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<a class=\"\"> $counter </a>";
				else
					$pagination.= "<a href=\"$targetpage/$counter\"> $counter </a>";					
			}
			$pagination.= "...";
			$pagination.= "<a href=\"$targetpage/$lpm1\"> $lpm1 </a>";
			$pagination.= "<a href=\"$targetpage/$lastpage\"> $lastpage< /a>";		
		}
		else
		{
			$pagination.= "<a href=\"$targetpage/1\"> 1 </a>";
			$pagination.= "<a href=\"$targetpage/2\"> 2 </a>";
			$pagination.= "...";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<a class=\"\"> $counter </a>";
				else
					$pagination.= "<a href=\"$targetpage/$counter\"> $counter </a>";					
			}
		}
	}
	
	if ($page < $counter - 1) 
		$pagination.= "<a href=\"$targetpage/$next\"> » </a>";
	else
		$pagination.= "<a class=\"#\"> » </a>";
	$pagination.= "</div>\n";		
}	
// Pagination Code End Here

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
               <h1>Job Openings</h1>
            </div>
         </div>
      </div>
      <div class="container inner_page_container job-page">
      <div class="row">
         <div class="col-12 mt-5 mb-5">
            <div class="half_divider mx-auto"></div>
            <h3 class="h1 text-center mb-4">Current openings at BTM Financial</h3>
            <div class="job-list">
               <div class="container">
                  <div class="row">
				  	<?php 
        			foreach($result as $row){
					?> 
				  	<div class="col-md-6">
                        <div class="job-container">
                           <div class="job-requirement">
                              <h3><?php echo $row['title']; ?></h3>
                              <div class="bar_seprator"></div>
                              <span class="location"><?php echo $row['location']; ?></span>
                              <h4>Position Specifications</h4>
                              <ul>
                                 <li><span>Corporate title:</span><?php echo $row['title']; ?></li>
                                 <?php if(!empty($row['experienced'])){ ?>
								 <li><span>Experienced Level:</span><?php echo $row['experienced']; ?></li>
								 <?php } ?>
								 <?php if(!empty($row['job_type'])){ ?>
                                 <li><span>Job Type:</span><?php echo $row['job_type']; ?></li>
								 <?php } ?>
                              </ul>
                           </div>
                            <div class="col-12 txt-right"> 
							   <a class="service_btn" href="<?php echo $websiteUrl.'career/'.$row['slug']; ?>">Apply Now</a> 
							</div>
                        </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="clearfix"></div>
				  <div><?php echo $pagination; ?></div>
               </div>
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