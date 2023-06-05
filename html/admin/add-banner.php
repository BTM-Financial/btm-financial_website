<?php

session_start();
error_reporting(0);
require '../config/config.php';
require 'functions/functions.php';
require 'functions/banner.php';
include 'functions/image-resize.php';

$db = new dbClass();
$admin = new adminUpdate();
$banner = new Banners();

if(isset($_REQUEST['id'])){
  $id = base64_decode($_REQUEST['id']);
  $editval = $banner->getBanners($id);
}else{
  $id='';
}

$w = 1920; $h = 868;
$time = time();

// insert record query
if(isset($_REQUEST['submit'])){

	$title = $db->addStr($_POST['title']);
	$heading = $db->addStr($_POST['heading']);
	$status = $db->addStr($_POST['status']);
	
	$image = time()."-".$_FILES['image']['name'];
  /*$imagetmp = $_FILES['image']['tmp_name'];*/
  $dest = "../uploads/banners/".$image;
	
	$files = resize($w, $h, $time, $dest);
	
	$result = $banner->addBanners($title, $image, $heading, $status);
	
	if($result===true):
		//move_uploaded_file($imagetmp,$dest);
		$msg = 'Banner has been added successfully.';
	else:
		$errmsg = 'Sorry Some Error !! Accurd ..';
	endif;

}

// update record query
if(isset($_REQUEST['update'])){

	$title = $db->addStr($_POST['title']);
	$heading = $db->addStr($_POST['heading']);
	$status = $db->addStr($_POST['status']);
	
	$oldimage = $_POST['oldimage'];

	if($_FILES['image']['name']!='')
	{
	 unlink("../uploads/banners/".$oldimage);
	 $image = time()."-".$_FILES['image']['name'];
   /*$imagetmp = $_FILES['image']['tmp_name'];*/
   $dest = "../uploads/banners/".$image;
	 $files = resize($w, $h, $time, $dest);
	 
	} else {
	  $image = $oldimage;
	}
	
	$result = $banner->updateBanners($title, $image, $heading, $status, $id);
	
	if($result===true){
		//move_uploaded_file($imagetmp,$dest);
		$msg = 'Banner has been updated successfully ..';
	} else {
		$errmsg = 'Sorry Some Error !! Accurd ..';
	}

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $websiteTitle; ?> | Add Banner</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
  <header class="main-header"> 
    <?php include 'header.php'; ?>
  </header>
  <aside class="main-sidebar">
    <?php include 'menu.php'; ?>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Banner </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Banner</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <?php if(empty($id)): ?>
              <h3 class="box-title">Add Banner</h3>
              <?php else: ?>
              <h3 class="box-title">Update Banner</h3>
              <?php endif; ?>
            </div>
            <div class="box-body">
                <?php if(isset($msg)){ ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> <?php echo $msg; ?></h4>
                </div>
                <?php } if(isset($errmsg)){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $errmsg; ?></h4>
                </div>
                <?php } ?>
              
			  <?php if(empty($id)): ?>
              <form name="mybanner" id="mybanner" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Heading</label>
                  <div class="col-sm-6">
                    <input type="text" name="heading" class="form-control" placeholder="Heading">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="image" id="image" onChange="PreviewImage();" class="form-control" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <h5>Image Size Must be (Width : 1920 Pixel &amp; Height : 585 Pixel)</h5>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Submit" class="btn btn-success">
                  </div>
                </div>
              </form>
              <?php else: ?>
              <form name="mybanner" id="mybanner" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-6">
                    <input type="text" name="title" value="<?php echo $editval['title']; ?>" class="form-control" placeholder="Title">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Heading</label>
                  <div class="col-sm-6">
                    <input type="text" name="heading" value="<?php echo $editval['heading']; ?>" class="form-control" placeholder="Heading">
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-6">
                      <input type="file" name="image" id="image" onChange="PreviewImage();" class="form-control">
                      <input type="hidden" name="oldimage" value="<?php echo $editval['image']; ?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img src="../uploads/banners/<?php echo $editval['image']; ?>" id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <h5>Image Size Must be (Width : 1920 Pixel &amp; Height : 585 Pixel)</h5>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="1" <?php if($editval['status']==1): ?> selected="selected" <?php endif; ?>>Active</option>
                        <option value="0" <?php if($editval['status']==0): ?> selected="selected" <?php endif; ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="update" value="Update" class="btn btn-danger">
                  </div>
                </div>
              </form>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>
  
  <div class="control-sidebar-bg"></div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Image Prieview -->
<script>

  function PreviewImage() 
  {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function(oFREvent) {
     document.getElementById("uploadPreview").src = oFREvent.target.result;
   };
 };
      
</script>
</body>
</html>