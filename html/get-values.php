<?php

session_start();
error_reporting(0);
//ini_set('display_errors',1);
// Require fields
require 'config/config.php';
$conn = new dbClass();

// Insert Webex Meeting
if(isset($_POST['webex_submit'])){
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
	$result = $conn->execute("INSERT INTO `webex_queries`(`name`, `email`, `phone`, `company`, `message`, `created_at`) VALUES ('$name','$email','$phone','$company','$message',NOW())");

	// Send mail function
	if($result==TRUE){
	    // Send mail
		$subject = "Webex Meeting Form Details";
		$mailto = "cs@btm-financial.com";
		
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

// Insert Proposal form
if(isset($_POST['proposal_submit'])){
    $project_name = trim($_POST['project_name']);
    $job_location = trim($_POST['job_location']);
    $start_date = trim($_POST['start_date']);
    $finish_date = trim($_POST['finish_date']);
    $project_leader = trim($_POST['project_leader']);
    $company = trim($_POST['company']);
    $contact_name = trim($_POST['contact_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $summary = trim($_POST['summary']);
    $desired_outcome = trim($_POST['desired_outcome']);
    $action_completion = trim($_POST['action_completion']);
    $project_schedule = trim($_POST['project_schedule']);
    $projected_budget = trim($_POST['projected_budget']);
    $requirements = trim($_POST['requirements']);
    $accepted_date = trim($_POST['accepted_date']);
    $acceptance = trim($_POST['acceptance']);
    
    if($_FILES['signature']['name']!=''){
	 $image = time()."-".$_FILES['signature']['name'];
     $imagetmp = $_FILES['signature']['tmp_name'];
     $dest = "uploads/signature/".$image;
     $attachedurl = $websiteUrl."uploads/signature/".$image;
	 // Upload image
	    move_uploaded_file($imagetmp,$dest);
	} else {
	  $image = '';
	  $attachedurl = "";
	}
    
    // Message Body
	$messages = "<table width='100%'><tr><td colspan='3' align='left'><strong>Here are the details</strong></td></tr>
	          <tr><td>Project Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$project_name."</td></tr>
	          <tr><td>Job Location</td><td align='center' valign='top'><strong>:</strong></td><td>".$job_location."</td></tr>
			  <tr><td>Est. Start Date</td><td align='center' valign='top'><strong>:</strong></td><td>".$start_date."</td></tr>
	          <tr><td>Est. Finish Date</td><td align='center' valign='top'><strong>:</strong></td><td>".$finish_date."</td></tr>
	          <tr><td>Project Leader</td><td align='center' valign='top'><strong>:</strong></td><td>".$project_leader."</td></tr>
	          <tr><td>Company</td><td align='center' valign='top'><strong>:</strong></td><td>".$company."</td></tr>
	          <tr><td>Contact Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$contact_name."</td></tr>
	          <tr><td>Phone</td><td align='center' valign='top'><strong>:</strong></td><td>".$phone."</td></tr>
	          <tr><td>Email</td><td align='center' valign='top'><strong>:</strong></td><td>".$email."</td></tr>
	          <tr><td>Address</td><td align='center' valign='top'><strong>:</strong></td><td>".$address."</td></tr>
	          <tr><td>Summary</td><td align='center' valign='top'><strong>:</strong></td><td>".$summary."</td></tr>
	          <tr><td>Desired Outcome</td><td align='center' valign='top'><strong>:</strong></td><td>".$desired_outcome."</td></tr>
	          <tr><td>Action To Completion</td><td align='center' valign='top'><strong>:</strong></td><td>".$action_completion."</td></tr>
	          <tr><td>Projected Schedule</td><td align='center' valign='top'><strong>:</strong></td><td>".$project_schedule."</td></tr>
	          <tr><td>Projected Budget</td><td align='center' valign='top'><strong>:</strong></td><td>".$projected_budget."</td></tr>
	          <tr><td>Projected Team And Resource Requirements</td><td align='center' valign='top'><strong>:</strong></td><td>".$requirements."</td></tr>
	          <tr><td>Proposal May Be Withdrawn If Not Accepted By Date Of</td><td align='center' valign='top'><strong>:</strong></td><td>".$accepted_date."</td></tr>
	          <tr><td>Date Of Acceptance</td><td align='center' valign='top'><strong>:</strong></td><td>".$acceptance."</td></tr>
	          <tr><td>Signature</td><td align='center' valign='top'><strong>:</strong></td><td><a href='".$attachedurl."'>View Files</a></td></tr>
	          </table>";
    
    // Insert data into database
	$result = $conn->execute("INSERT INTO `proposal_queries`(`project_name`, `job_location`, `start_date`, `finish_date`, `project_leader`, `company`, `contact_name`, `phone`, `email`, `address`, `summary`, `desired_outcome`, `action_completion`, `project_schedule`, `projected_budget`, `requirements`, `accepted_date`, `acceptance`, `signature`, `created_at`) VALUES ('$project_name','$job_location','$start_date','$finish_date','$project_leader','$company','$contact_name','$phone','$email','$address','$summary','$desired_outcome','$action_completion','$project_schedule','$projected_budget','$requirements','$accepted_date','$acceptance','$image',NOW())");
    
    if($result==TRUE){
	    // Send mail
		$subject = "Proposal Form Details";
		$mailto = "cs@btm-financial.com";
		
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