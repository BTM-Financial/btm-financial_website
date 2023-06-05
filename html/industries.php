<?php

session_start();
error_reporting(0);
// Require fields
require 'config/config.php';
$conn = new dbClass();

// Pagination Code Start Here	  
$tbl_name = "industries";
$adjacents = 3;
// count all records
$query = $conn->getData("SELECT COUNT(*) as num FROM $tbl_name WHERE `status` = 1 ORDER BY `id` ASC");
$total_pages = $query['num'];

$targetpage = $websiteUrl.'industries/';
$limit = 20; 				
$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 	
else
	$start = 0;	
// fetch all records
$result = $conn->getAllData("SELECT * FROM $tbl_name WHERE `status` = 1 ORDER BY `id` ASC LIMIT $start, $limit");

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
      	<style type="text/css">
	

.t div {
  padding: 15px;
  margin: 50px auto;
  /*background: #f1f1f1;*/
  margin-bottom: 300px;
  /*border-radius: 30px;*/
}

.t a {
  /*text-decoration: none;*/
  /*color: #fff;*/
}
.navbar {
  position: fixed;
  top: 0;
  margin: auto;
  width: 100%;
  /*text-align: center;*/
}
.t button {
  /*background-color: #8bc34a;*/
/*   border: none; */
  padding: 15px;
  /*border-radius: 30px;*/
}

.t #top {
  /*background: red;*/
  height: 300px;
}
.t #middle {
  /*background: mediumturquoise;*/
  height: 180px;
}
.t #bottom {
  /*background: purple;*/
  /*height: 900px;*/
}
.t .half_divider{
    display:none;
}
.img-margin, .t .col-md-6{
    margin-bottom:0!important;
}
.t col-md-6
	</style>
   </head>
   <?php include 'includes/header.php';?>
   <div id="butter">
      <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/industries.webp);">
         <div class="container">
            <div class="row vertical_align banner-height">
               <div class="col-12">
                  <h5>Industries</h5>
                  <!--<div class="clearfix"></div>-->
                  <h1>Solutions For Big Industries</h1>
               </div>
            </div>
         </div>
         <div class="container inner_page_container">
            <div class="industry-page t" >
               <!--Industry start here -->
               <?php
               $i=0; 
               foreach($result as $row){
                  $i++;
               ?>
               <?php if($i%2 == 0){ ?>
               <div id="<?php echo $row['slug']; ?>" class="row border-bottom pb-5">
                  <div class="col-md-6 col-12 ds-vertical-align">
                     <h3 class="h2 fw-bold"><?php echo $row['title']; ?></h3>
                     <div class="half_divider"></div>
                     <?php echo $row['short_desc']; ?>
                     <!--<div class="clearfix"></div>-->
                  </div>
                  <div class="col-md-6 col-12">
                     <img class="img-margin" src="<?php echo $websiteUrl.'uploads/industries/'.$row['image']; ?>">
                     <!--<div class="clearfix"></div>-->
                  </div>
               </div>
               <?php }else{ ?>
               <div id="<?php echo $row['slug']; ?>" class="row border-bottom pt-5 pb-5 custom_row ">
                  <div class="col-md-6  col-12 second-on-mobile">
                     <img src="<?php echo $websiteUrl.'uploads/industries/'.$row['image']; ?>">
                     <!--<div class="clearfix"></div>-->
                  </div>
                  <div class="col-md-6 col-12 first-on-mobile ds-vertical-align">
                     <h3 class="h2 fw-bold"><?php echo $row['title']; ?></h3>
                     <div class="half_divider"></div>
                     <?php echo $row['short_desc']; ?>
                     <!--<div class="clearfix"></div>-->
                  </div>
               </div>
               <?php } } ?>
            </div>
            <!--<div class="clearfix"></div>-->
            <?php echo $pagination; ?>
         </div>
      </section>
      <?php include 'includes/footer-content.php';?>
   </div>
   </body>
   <?php include 'includes/footer.php';?>
   <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
   
<script type="text/javascript">
	$(document).ready(function(){
		$('.scrollTo').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top 
    }, 500);
    return false;
});


	});
</script>
</html>