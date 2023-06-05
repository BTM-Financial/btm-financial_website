<?php

session_start();
error_reporting(0);
// Require fields
require 'config/config.php';
$conn = new dbClass();

// Pagination Code Start Here	  
$tbl_name = "success_stories";
$adjacents = 3;
// count all records
$query = $conn->getData("SELECT COUNT(*) as num FROM $tbl_name WHERE `status` = 1 ORDER BY `id` DESC");
$total_pages = $query['num'];

$targetpage = $websiteUrl.'solutions/';
$limit = 12; 				
$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 	
else
	$start = 0;	
// fetch all records
$result = $conn->getAllData("SELECT * FROM $tbl_name WHERE `status` = 1 ORDER BY `id` DESC LIMIT $start, $limit");

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

if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $message = trim($_POST['message']);
	
    // Send mail
    $to = $MailTo;
    $from = $MailFrom;
    $subject = "Project Query Form details";
    // Message Body
	$messages = "<table width='100%'><tr><td colspan='3' align='left'><strong>Here are the details</strong></td></tr>
	          <tr><td>Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$name."</td></tr>
			  <tr><td>Email</td><td align='center' valign='top'><strong>:</strong></td><td>".$email."</td></tr>
	          <tr><td>Phone</td><td align='center' valign='top'><strong>:</strong></td><td>".$phone."</td></tr>
	          <tr><td>Company</td><td align='center' valign='top'><strong>:</strong></td><td>".$company."</td></tr>
	          <tr><td>Message</td><td align='center' valign='top'><strong>:</strong></td><td>".$message."</td></tr>
	          </table>";
	
	// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: BTM <cs@btm-financial.com>' . "\r\n";
    //$headers .= 'Cc: pinki@zenwebnet.com' . "\r\n";
	
	// Insert data into database
	$result = $conn->execute("INSERT INTO `queries`(`name`, `email`, `phone`, `company`, `message`, `created_at`) VALUES ('$name','$email','$phone','$company','$message',NOW())");

	// Send mail function
	if($result==TRUE){
	    // Send mail 
		mail($to,$subject,$messages,$headers);
	    // Redirect to the 'thank you' page
	    header('Location:thank-you.php');
	}else{
	    echo '<script>alert("Oops something went wrong. Try again.")</script>';
	    echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}
    
}


?>

<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   </head>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
         <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/case-study.webp);">
            <div class="container">
               <div class="row vertical_align banner-height ">
                  <div class="col-12">
                     <h5>Solutions</h5>
                     <div class="clearfix"></div>
                     <h1> Success Stories</h1>
                  </div>
               </div>
            </div>
            <div class="container inner_page_container spacing-class">
               <div class="row">
                  <?php 
                    $i=0;
                    foreach($result as $row){
                      $i++
                  ?> 
                  <?php if($i==1 || $i==2 || $i==6 || $i==7 || $i==11 || $i==12){echo '<div class="col-md-6 col-sm-12">'; }else{echo '<div class="col-md-4 col-sm-12">';} ?>
                  
                     <div class="case-study-grid">
                        <a href="<?php echo $websiteUrl.'solution/'.$row['slug']; ?>" class="case-study-link">
                           <div class="case-study-content-wrapper">
                              <div class="image-wrapper"> <img src="<?php echo $websiteUrl.'uploads/success-stories/'.$row['image']; ?>"> </div>
                              <div class="content-block">
                                 <h4><?php echo $row['title']; ?></h4>
                        <a class="read_more_btn" href="<?php echo $websiteUrl.'solution/'.$row['slug']; ?>">Read More</a> </div>
                        </div>
                        </a>
                     </div>
                  </div>
                  <?php } ?>
                  <div><?php echo $pagination; ?></div>
                  
               </div>
            </div>
            <div class="form-bg">
               <div class="container">
                  <div class="row">
                     <div class="col-12 ">
                        <h2>Need help with a similar project?</h2>
                        <div class="bar_seprator"></div>
                        <h5>Drop us a line, and our rep will contact you within 30 minutes to arrange an initial discussion</h5>
                     </div>
                     <div class="col-md-9 col-sm-12">
                        <div class="form-section">
                           <form method="post" name="form">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4>Personal Details</h4>
                                 </div>
                                 <div class="col-md-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name*" required/> 
                                 </div>
                                 <div class="col-md-3">
                                    <input type="text" class="form-control" name="email" placeholder="Email Address*" required/> 
                                 </div>
                                 <div class="col-md-3">
                                    <input type="text" class="form-control" name="phone" placeholder="Phone Number*" required/> 
                                 </div>
                                 <div class="col-md-3">
                                    <input type="text" class="form-control" name="company" placeholder="Company Name*" required/> 
                                 </div>
                              </div>
                              <div class="row ">
                                 <div class="col-md-12">
                                    <h4>Project Details</h4>
                                 </div>
                                 <div class="col-md-12">
                                    <textarea rows="6" class="form-control" name="message" placeholder="Please leave a few words about your project."></textarea>
                                 </div>
                              </div>
                              <input type="submit" name="submit" value="Send Message" class="btn btn-success submit-bt">
                           </form>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-12">
                        <div class="contact-detail">
                           <h4 class="sub-heading">Our contact details</h4>
                           <a href="tel: +91-124-410-4312"> <i class="fa fa-phone"></i> +91-124-410-4312</a> <a href="mailto:cs@btm-financial.com"><i class="fa fa-envelope"></i> cs@btm-financial.com</a> 
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="bg-clr">
               <div class="container">
                  <div class="row pt-5 pb-2">
                     <div class="col-12">
                        <h2>Related Case Studies</h2>
                        <div class="bar_seprator"></div>
                        <div  class="owl-carousel owl-theme detail_section related-case-study-section">
                        <?php 
                          $getStories = $conn->getAllData("SELECT * FROM `success_stories` WHERE `status` = 1");
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
               </div>
            </div>
            <div class="clearfix"></div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>