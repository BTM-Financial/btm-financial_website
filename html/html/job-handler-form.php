<?php 



if(isset($_POST['submit'])){
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $company = trim($_POST['company']);
    $location = trim($_POST['location']);
    
    if($_FILES['resume']['name']!=''){
	 $image = time()."-".$_FILES['resume']['name'];
     $imagetmp = $_FILES['resume']['tmp_name'];
     $dest = "uploads/resume/".$image;
     $attachedurl = "https://zentest.top/btm/uploads/resume/".$image;
	} else {
	  $image = '';
	  $attachedurl = "";
	}
	
    // Send mail
    $to = "cs@btm-financial.com";
    $from = "cs@btm-financial.com";
    $subject = "Job Opening";
    // Message Body
	$messages = "<table width='100%'><tr><td colspan='3' align='left'><strong>Here are the details</strong></td></tr>
	          <tr><td>First Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$firstname."</td></tr>
	          <tr><td>Last Name</td><td align='center' valign='top'><strong>:</strong></td><td>".$lastname."</td></tr>
			  <tr><td>Email</td><td align='center' valign='top'><strong>:</strong></td><td>".$email."</td></tr>
	          <tr><td>Company</td><td align='center' valign='top'><strong>:</strong></td><td>".$company."</td></tr>
	          <tr><td>Location</td><td align='center' valign='top'><strong>:</strong></td><td>".$location."</td></tr>
	          <tr><td>Resume</td><td align='center' valign='top'><strong>:</strong></td><td><a href='".$attachedurl."'>View Files</a></td></tr>
	          </table>";
	
	// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: BTM <cs@btm-financial.com>' . "\r\n";
    //$headers .= 'Cc: pinki@zenwebnet.com' . "\r\n";
	// Send mail function
	if(mail($to,$subject,$messages,$headers)){
	    move_uploaded_file($imagetmp,$dest);
	    // Redirect to the 'thank you' page
	    header('Location:thank-you.php');
	}else{
	    echo '<script>alert("Oops something went wrong. Try again.")</script>';
	    echo '<script>window.location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
	}
    
}

?>