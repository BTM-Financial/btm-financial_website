<?php

class Banners
{
	private $ID;
	private $Title;
	private $Image;
	private $Heading;
	private $Slug;
	private $Status;
	private $CreatedBy;
	private $UpdatedBy;
	private $conndb;
	
	function addBanners($Title, $Image, $Heading, $Status)
	{  
		$conn = new dbClass;
		$this->Title = $Title;
		$this->Image = $Image;
		$this->Heading = $Heading;
		$this->Status = $Status;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("INSERT INTO `banners`(`title`, `image`, `heading`, `status`, `created_at`) VALUES ('$Title', '$Image', '$Heading', '$Status', now())");
		return $stmt;
	}
	
	function updateBanners($Title, $Image, $Heading, $Status, $ID)
	{  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->Title = $Title;
		$this->Image = $Image;
		$this->Heading = $Heading;
		$this->Status = $Status;
		$this->conndb = $conn;
	
		$stmt = $conn->execute("UPDATE `banners` SET `title` = '$Title', `image` = '$Image', `heading` = '$Heading', `status` = '$Status', `updated_at` = now() WHERE `id` = '$ID'");
		return $stmt;
	}
	
	function allBanners() 
	{  
		$conn = new dbClass;
		$this->conndb = $conn;
	
		$stmt = $conn->getAllData("SELECT * FROM `banners` ORDER BY `id` DESC");
		return $stmt;
	}
	
	function getBanners($ID) 
	{  
		$conn = new dbClass;
		$this->ID = $ID;
		$this->conndb = $conn;
	
		$stmt = $conn->getData("SELECT * FROM `banners` WHERE `id` = '$ID'");
		return $stmt;
	}
	
}

?>