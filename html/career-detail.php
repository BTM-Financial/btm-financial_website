<?php

session_start();
error_reporting(0);
require 'config/config.php';
$conn = new dbClass();

// get career id
$careerId = $_REQUEST['careerId'];

$getDetails = $conn->getData("SELECT * FROM `careers` WHERE `status` = 1 AND `deleted` = 0 AND `slug` = '$careerId'");
$jobTitle = $getDetails['title'];
$jobId = $getDetails['id'];

if(isset($_POST['submit'])){
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $location = trim($_POST['location']);
	$name = $firstname.' '.$lastname;
    
    if($_FILES['resume']['name']!=''){
	 $image = time()."-".$_FILES['resume']['name'];
     $imagetmp = $_FILES['resume']['tmp_name'];
     $dest = "uploads/resume/".$image;
     $attachedurl = $websiteUrl."uploads/resume/".$image;
	 // Store image
	 move_uploaded_file($imagetmp,$dest);
	} else {
	  $image = '';
	  $attachedurl = "";
	}
	
    // Message Body
	$messages = "<table width='100%'><tr><td colspan='3' align='left'><strong>Here are the details</strong></td></tr>
			  <tr><td>Job Title</td><td align='center' valign='top'><strong>:</strong></td><td>".$jobTitle."</td></tr>
	          <tr><td>First Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$firstname."</td></tr>
	          <tr><td>Last Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$lastname."</td></tr>
			  <tr><td>Email</td><td align='center' valign='top'><strong>:</strong></td><td>".$email."</td></tr>
	          <tr><td>Phone</td><td align='center' valign='top'><strong>:</strong></td><td>".$phone."</td></tr>
	          <tr><td>Location</td><td align='center' valign='top'><strong>:</strong></td><td>".$location."</td></tr>
	          <tr><td>Resume</td><td align='center' valign='top'><strong>:</strong></td><td><a href='".$attachedurl."'>View Files</a></td></tr>
	          </table>";
	
	// Insert data into database
	$result = $conn->execute("INSERT INTO `career_queries`(`career_id`, `name`, `email`, `phone`, `location`, `resume`, `created_at`) VALUES ('$jobId','$name','$email','$phone','$location','$image',NOW())");

	// Send mail function
	if($result==TRUE){
	    // Send mail 
		$mailto = "hr@btm-financial.com";
		$subject = "Job Openings Details";
		
		require('phpmailer/class.phpmailer.php');
		$mail = new PHPMailer;
		$mail->IsSMTP();        //Sets Mailer to send message using SMTP
		$mail->Host = $smtp_host;  //Sets the SMTP hosts of your Email hosting, this for gmail
		$mail->Port = $smtp_port;  //Sets the default SMTP server port
		$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = $smtp_user;     //Sets SMTP username
		$mail->Password = $smtp_pass;     //Sets SMTP password
		$mail->SMTPSecure = $smtp_secure;      //Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = $smtp_from;    //Sets the From email address for the message
		$mail->FromName = $smtp_fromName;    //Sets the From name of the message
		$mail->AddAddress($mailto, 'BTM Financial');  //Adds a "To" address
		$mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);       //Sets message type to HTML
		$mail->Subject = $subject;    //Sets the Subject of the message
		$mail->Body = $messages;       //An HTML or plain text message body
		$mail->Send();
		
		echo '<script>window.location.href="https://btm-financial.com/thankyou?msg=Your resume has been submitted successfully"</script>';
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
      <div class="container inner_page_container job-page job-detail">
         <div class="row">
            <div class="col-12 mt-5 mb-5 ">
               <div class="half_divider mx-auto"></div>
               <h3 class="h1 text-center mb-0"><?php echo $getDetails['title']; ?></h3>
               <p class="location text-center"><?php echo $getDetails['location']; ?></p>
               <div class="job-detail-page">
                  <div class="container">
                     <div class="row">
                        <div class="col-12 col-md-12">
                           <h2>BTM Financial LLC</h2>
                           <div class="bar_seprator"></div>
                           <p><?php echo $getDetails['short_desc']; ?></p>
                           <h2>Position Specifications</h2>
                           <div class="bar_seprator"></div>
                           <ul>
                              <li><b>Corporate title : </b> <?php echo $getDetails['title']; ?></li>
                              <?php if(!empty($getDetails['experienced'])){ ?>
							  <li><b>Experience : </b> <?php echo $getDetails['experienced']; ?></li>
							  <?php } ?>
                           </ul>
                           <?php if(!empty($getDetails['role_responsibility'])){ ?>  
						   <h2> Role & Responsibilities and requirements</h2>
                           <div class="bar_seprator"></div>
                           <?php echo $getDetails['role_responsibility']; ?>
						   <?php } ?>
						   
						   <?php if(!empty($getDetails['qualifications'])){ ?>
                           <h2>Mind-set / Skill set / Qualifications</h2>
                           <div class="bar_seprator"></div>
                           <?php echo $getDetails['qualifications']; ?>
						   <?php } ?>

						   <?php if(!empty($getDetails['location'])){ ?>
                           <h2>Location</h2>
                           <div class="bar_seprator"></div>
                           <p><?php echo $getDetails['location']; ?></p>
						   <?php } ?>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
         <div class="row">
            <div class="col-md-8">
               <form method="post" class="job-form" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-12">
                        <h2>Apply For this Job</h2>
                        <div class="bar_seprator"></div>
                     </div>
                     <div class="col-md-2">
                        <label>First Name*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="text" class="form-control" name="firstname" required> 
                     </div>
                     <div class="col-md-2">
                        <label>Last Name*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="text" class="form-control" name="lastname" required> 
                     </div>
                     <div class="col-md-2">
                        <label>Email*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="email" class="form-control" name="email" required> 
                     </div>
                     <div class="col-md-2">
                        <label>Phone*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="text" class="form-control" name="phone" required> 
                     </div>
                     <div class="col-md-2">
                        <label>Location*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="text" class="form-control" name="location" required> 
                     </div>
                     <div class="col-md-2">
                        <label>Resume/CV*</label>
                     </div>
                     <div class="col-md-10">
                        <input type="file" class="form-control" name="resume" required> 
                     </div>
                  </div>
                  <input type="submit" name="submit" value="Send Message" class="btn btn-success submit-bt">
               </form>
            </div>
            <div class="col-md-4">
               <div class="contact-detail">
                  <h4 class="sub-heading">Our contact details</h4>
                  <a href="tel: +91-124-410-4312"> <i class="fa fa-phone"></i> +91-124-410-4312</a> <a href="mailto:cs@btm-financial.com"><i class="fa fa-envelope"></i> cs@btm-financial.com</a> 
               </div>
            </div>
         </div>
   </section>
   <!-- Button trigger modal -->
   <?php include 'includes/footer-content.php';?>
   </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>