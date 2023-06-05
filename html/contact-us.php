<?php

session_start();
error_reporting();
require 'config/config.php';
$conn = new dbClass();

// Insert Webex Meeting
if(isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $message = trim($_POST['message']);
	
	// Message Body
	$messages = "<table width='100%'><tr><td colspan='3' align='left'><strong>Here are the details</strong></td></tr>
	          <tr><td>Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$name."</td></tr>
			  <tr><td>Email</td><td align='center' valign='top'><strong>:</strong></td><td>".$email."</td></tr>
	          <tr><td>Phone</td><td align='center' valign='top'><strong>:</strong></td><td>".$phone."</td></tr>
	          <tr><td>Company</td><td align='center' valign='top'><strong>:</strong></td><td>".$company."</td></tr>
	          <tr><td>Message</td><td align='center' valign='top'><strong>:</strong></td><td>".$message."</td></tr>
	          </table>";
	
	// Insert data into database
	$result = $conn->execute("INSERT INTO `queries`(`name`, `email`, `phone`, `company`, `message`, `created_at`) VALUES ('$name','$email','$phone','$company','$message',NOW())");
	
	// Send mail function
	if($result==TRUE){
		// Send mail 
		$mailto = "masi@zenwebnet.com";
		$subject = "Contact Us Form Details";
		
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
		
		echo '<script>window.location.href="thankyou?msg=Your query has been submitted successfully"</script>';
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
         <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/btm-contact.webp);">
            <div class="container">
               <div  class="row vertical_align banner-height">
                  <div class="col-12">
                     <h5>Contact Us</h5>
                     <div class="clearfix"></div>
                     <h1 id="expert-talk" >Start Your Way to Digital Success</h1>
                  </div>
               </div>
            </div>
            <div class="container inner_page_container">
               <div class="row row-eq-height" style="background: #f6f8f8">
                  <div class="col-md-12 col-lg-8">
                     <h2 class="h1">Tell Us About Your Project!</h2>
                     <h5>Give us some details about your project and we'll get in touch with you as soon as possible! We look forward to hearing from you!</h5>
                     <div class="contact_page_form mt-4">
                        <form method="post" name="form">
                           <div class="row">
                              <div class="col-md-12">
                                 <h4>Personal Details</h4>
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="form-control" name="name" placeholder="Name*"  required /> 
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="form-control" name="email" placeholder="Email Address*" required/> 
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <input type="text" class="form-control" name="phone" placeholder="Phone Number* " required/> 
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="form-control" name="company" placeholder="Company Name* " required/> 
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
                     <div class="clearfix"></div>
                  </div>
                  <div class="col-md-12 col-lg-4 bg-white contact_info p-4">
                     <h3 class="h1">Contact Info</h3>
                     <p>A firm with global reach, with teams across New Jersey and India.</p>
                     <div class="col-md-12 bg-light p-4 contact_block lead mt-2">
                        <h4 class="h3"><img src="<?php echo $websiteUrl; ?>images/united-states-flag.svg">New Jersey, USA</h4>
                        4 Canterbury Road, Denville, NJ -07834, United States
                        <a href="tel:+18624371138"><i class="uil uil-phone"></i> +1-862-437-1138</a>
                        <a href="mailto:cs@btm-financial.com"><i class="uil uil-envelope-alt"></i> cs@btm-financial.com</a> 
                     </div>
                     <div class="col-md-12 bg-light p-4 contact_block lead mt-2">
                        <h4 class="h3"><img src="<?php echo $websiteUrl; ?>images/india-flag.svg"> Gurugram, India</h4>
                        Unit No. 807, Tower-B4, Spaze I Tech Park, Sector-49, Sohna Road, Gurgaon Haryana, India (122018)
                        <a href="tel:+911244104312"><i class="uil uil-phone"></i> +91-124-410-4312</a>
                        <a href="mailto:cs@btm-financial.com"><i class="uil uil-envelope-alt"></i> cs@btm-financial.com</a> 
                     </div>
                     <div class="col-md-12  contact_block lead mt-2">
                        <div class="social">
                           <ul>
                              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>