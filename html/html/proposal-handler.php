<?php 


if(isset($_POST['submit'])){
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
     $attachedurl = "https://zentest.top/btm/uploads/signature/".$image;
	} else {
	  $image = '';
	  $attachedurl = "";
	}
    
    // Send mail
    $to = "cs@btm-financial.com";
    $from = "cs@btm-financial.com";
    $subject = "Proposal Form";
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