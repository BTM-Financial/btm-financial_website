<?php 
$errors = '';
$myemail = 'cs@btm-financial.com';//<-----Put Your email address here. 


$name = $_POST['name']; 

$email_address = $_POST['email']; 

$phone = $_POST['number']; 

$company = $_POST['company'];

$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Subject: Quotation Form Details";
	
	$email_body = "".
	" Here are the details:
	\n Name:- $name 
	\n Phone No:- $phone 
	\n E-mail Address:- $email_address
	\n Company:- $company
	\n Message:- $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location:thank-you.php');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
<title>Contact form handler</title>
<link rel="shortcut icon" href="img/favicon.ico"></head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>