<?php

class adminUpdate
{
	private $ID;
	private $Username;
	private $Email;
	private $Password;
	private $Mobile;
	private $Address;
	private $Detail;
	private $Icon;
	private $Type;
	private $Image;
	private $Status;
	private $Limit;
	private $Table;
	private $Session;
	private $conndb;
	
	public function checkSession($Session){
		$this->Session = $Session;
		if(empty($Session))
			echo "<script>window.location.href='index.php'</script>";
	}
	
	public function checkUser($Email){  
		$conn = new dbClass;
		$this->Email = $Email;
		$this->conndb = $conn;
	
		$stmt = $conn->getRowCount("SELECT * FROM `admins` WHERE `email` = '$Email'");
		return $stmt;
	}
	
	public function addUser($Username, $Email, $Password, $Mobile, $Type, $Image, $Status){  
		$conn = new dbClass;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Password = $Password;
		$this->Mobile = $Mobile;
		$this->Type = $Type;
		$this->Image = $Image;
		$this->Status = $Status;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("INSERT INTO `admins`(`username`, `email`, `password`, `mobile`, `type`, `image`, `status`, `created_at`) VALUES ('$Username', '$Email', '$Password', '$Mobile', '$Type', '$Image', '$Status', now())");
		return $stmt;
	}
	
	public function updateUser($Username, $Email, $Password, $Mobile, $Type, $Image, $Status, $ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Password = $Password;
		$this->Mobile = $Mobile;
		$this->Type = $Type;
		$this->Image = $Image;
		$this->Status = $Status;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("UPDATE `admins` SET `username` = '$Username', `email` = '$Email', `password` = '$Password', `mobile` = '$Mobile', `type` = '$Type', `image` = '$Image', `status` = '$Status', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}
	
	public function updateProfile($Username, $Email, $Mobile, $Image, $ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Username = $Username;
		$this->Email = $Email;
		$this->Mobile = $Mobile;
		$this->Image = $Image;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("UPDATE `admins` SET `username` = '$Username', `email` = '$Email', `mobile` = '$Mobile', `image` = '$Image', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}
	
	public function changePassword($Password, $ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Password = $Password;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("UPDATE `admins` SET `password` = '$Password', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}
	
	public function allUsers(){  
		$conn = new dbClass;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT * FROM `admins` ORDER BY `id` DESC");
		return $stmt;
	}
	
	public function getNumrowsCount($Table){  
		$conn = new dbClass;
		$this->Table = $Table;
		$this->conndb = $conn;
	
		$stmt = $conn->getRowCount("SELECT id FROM $Table ORDER BY `id` DESC");
		return $stmt;
	}
	
	public function allUsersByLimit($Limit){  
		$conn = new dbClass;
		$this->Limit = $Limit;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT * FROM `admins` ORDER BY `id` DESC LIMIT $Limit");
		return $stmt;
	}
	
	public function getUsers($ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
	
		$stmt = $conn->getData("SELECT * FROM `admins` WHERE `id` = '$ID'");
		return $stmt;
	}
	
}

class Categories{

	private $ID;
	private $CatId;
	private $Name;
	private $Image;
	private $Slug;
	private $Status;
	private $CreatedBy;
	private $UpdatedBy;
	private $Table;
	private $conndb;

	function slug($Name, $Table){
		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '".addslashes($Name)."'");

		$RowId = $count['id'];

		if(empty($RowId)):

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name))),"-")); 

		else: 

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name."-".$RowId))),"-")); 

		endif;

   		return $slug;

	}

	function updateSlug($Name, $Table, $ID){
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '".addslashes($Name)."' AND id!='$ID'");

		$RowId = $count['id'];

		if(empty($RowId)):

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name))),"-")); 

		else: 

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name."-".$RowId))),"-")); 

		endif;

   		return $slug;

	}

	

	function checkCategories($Name,$Table){  
		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;
		$stmt = $conn->getRowCount("SELECT * FROM $Table WHERE `name` = '$Name'");
		return $stmt;

	}

	function addCategories($Name, $Image, $Slug, $Status, $CreatedBy)
	{  

		$conn = new dbClass;
		$this->Name = $Name;
		$this->Image = $Image;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->CreatedBy = $CreatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("INSERT INTO `category`(`name`, `image`, `slug`, `status`, `created_by`, `created_at`) VALUES ('$Name', '$Image', '$Slug', '$Status', '$CreatedBy', now())");

		return $stmt;

	}

	function updateCategories($Name, $Image, $Slug, $Status, $UpdatedBy , $ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Image = $Image;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->UpdatedBy = $UpdatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `category` SET `name` = '$Name', `image` = '$Image', `slug` = '$Slug', `status` = '$Status', `updated_by` = '$UpdatedBy', `updated_at` = now() WHERE `id` = '$ID'");

		return $stmt;

	}

	function allCategories(){  
		$conn = new dbClass;
		$this->conndb = $conn;
		$stmt = $conn->getAllData("SELECT * FROM `category` ORDER BY `id` DESC");
		return $stmt;
	}

	function getCategories($ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
		$stmt = $conn->getData("SELECT * FROM `category` WHERE `id` = '$ID'");
		return $stmt;

	}

}

class CampaignType{

	private $ID;
	private $CatId;
	private $Name;
	private $Slug;
	private $Status;
	private $CreatedBy;
	private $UpdatedBy;
	private $Table;
	private $conndb;

	function slug($Name, $Table){
		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '".addslashes($Name)."'");

		$RowId = $count['id'];

		if(empty($RowId)):

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name))),"-")); 

		else: 

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name."-".$RowId))),"-")); 

		endif;

   		return $slug;

	}

	function updateSlug($Name, $Table, $ID){
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;

		$count = $conn->getData("SELECT id FROM $Table WHERE `name` = '".addslashes($Name)."' AND id!='$ID'");

		$RowId = $count['id'];

		if(empty($RowId)):

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name))),"-")); 

		else: 

			$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($Name."-".$RowId))),"-")); 

		endif;

   		return $slug;

	}

	

	function checkCategories($Name,$Table){  
		$conn = new dbClass;
		$this->Name = $Name;
		$this->Table = $Table;
		$this->conndb = $conn;
		$stmt = $conn->getRowCount("SELECT * FROM $Table WHERE `name` = '$Name'");
		return $stmt;

	}

	function addCategories($Name, $Slug, $Status, $CreatedBy)
	{  

		$conn = new dbClass;
		$this->Name = $Name;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->CreatedBy = $CreatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("INSERT INTO `campaign_type`(`name`, `slug`, `status`, `created_by`, `created_at`) VALUES ('$Name', '$Slug', '$Status', '$CreatedBy', now())");

		return $stmt;

	}

	function updateCategories($Name, $Slug, $Status, $UpdatedBy , $ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Slug = $Slug;
		$this->Status = $Status;
		$this->UpdatedBy = $UpdatedBy;
		$this->conndb = $conn;

		$stmt = $conn->execute("UPDATE `campaign_type` SET `name` = '$Name', `slug` = '$Slug', `status` = '$Status', `updated_by` = '$UpdatedBy', `updated_at` = now() WHERE `id` = '$ID'");

		return $stmt;

	}

	function allCategories(){  
		$conn = new dbClass;
		$this->conndb = $conn;
		$stmt = $conn->getAllData("SELECT * FROM `campaign_type` ORDER BY `id` DESC");
		return $stmt;
	}

	function getCategories($ID){  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
		$stmt = $conn->getData("SELECT * FROM `campaign_type` WHERE `id` = '$ID'");
		return $stmt;

	}

}

?>