<?php

class Authentication {

	private $email;
	private $pass;
	private $conn;
	
	public function adminLogin($email,$pass) {
	
		$conn = new dbClass();
		$this->conn = $conn;
		$this->email = $email;
		$this->pass = $pass;
		
		$result = $conn->getData("SELECT * FROM `admins` WHERE `email` = '$email' AND `password` = '$pass' AND `status` = '1'");
		
		if($result!=''){
		
			$conn->updateExecute("UPDATE `admins` SET 
			`login_ip` = '".$_SERVER['REMOTE_ADDR']."', `login_date` = now() WHERE `email` = '$email'");
		
			$_SESSION['ADMIN_USER'] = $result['username'];
			$_SESSION['ADMIN_USER_ID'] = $result['id'];
			$_SESSION['ADMIN_USER_TYPE'] = $result['type'];
			$_SESSION['ADMIN_USER_IP'] = $_SERVER['REMOTE_ADDR'];
			
			return true; 
		
		} else {
			return false;
		}
	
	}
	
	public function forgetPass($email){     
  
  		$conn = new dbClass();
		$this->email = $email;
		$this->conn = $conn;

		$result = $conn->getData("SELECT * FROM `admins` WHERE `email` = '$email'");

		if($result!='')
		{
			$to = $result['email'];
			$subject = 'Forget Password';
			$from = 'xyz@xyz.info';
			
			$query = $query."<table width='100%'>";
			$query = $query."<tr><td colspan='3' align='left'><strong>Recover Password</strong></td></tr>";
			$query = $query."<tr><td colspan='3' align='left'><strong>Dear ".ucwords($result['username'])."</strong></td></tr>";
			$query = $query."<tr><td>Admin login password is <strong>".$result['password']."</strong></td></tr>";
			$query = $query."</table>";
			
			mail($to, $subject, $query, "From: <$from>\r\nContent-type: text/html\r\n");
			
			return true;
		
		}

		else

            $conn->disconnect();
			return false;
	}
	
	public function SignOut() {
		unset($_SESSION['ADMIN_USER']);
		unset($_SESSION['ADMIN_USER_ID']);
		unset($_SESSION['ADMIN_USER_TYPE']);
		unset($_SESSION['ADMIN_USER_IP']);
		//session_destroy();
		echo "<script>window.location.href='index.php'</script>";
	}

}

?>