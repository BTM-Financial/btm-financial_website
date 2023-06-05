<?php

session_start();
error_reporting(0);
require '../config/config.php';
require 'functions/functions.php';

$db = new dbClass();
$admin = new adminUpdate();

if(isset($_REQUEST['id'])){
$id = base64_decode($_REQUEST['id']);
$editval = $db->getData("SELECT * FROM `services` WHERE `id` = '$id'");
}else{
  $id = '';
}

// insert record query
if(isset($_REQUEST['submit'])){

	$title = $db->addStr($_POST['title']);
	$short_desc = $db->addStr($_POST['short_desc']);
	$home_desc = $db->addStr($_POST['home_desc']);
  $description_1 = $db->addStr($_POST['description_1']);
  $description_2 = $db->addStr($_POST['description_2']);
	$status = $db->addStr($_POST['status']);

  if(!empty($_FILES['image']['name'])){
		$image = time()."-".$_FILES['image']['name'];
		$imagetmp = $_FILES['image']['tmp_name'];
		$dest = "../uploads/services/".$image;
	}else{
		$image = '';
	}
	
	if(!empty($_FILES['home_image']['name'])){
		$home_image = time()."-".$_FILES['home_image']['name'];
		$home_imagetmp = $_FILES['home_image']['tmp_name'];
		$home_imagedest = "../uploads/services/".$home_image;
	}else{
		$home_image = '';
	}
	
	if(!empty($_FILES['header_image']['name'])){
		$header_image = time()."-bg-".$_FILES['header_image']['name'];
		$header_imagetmp = $_FILES['header_image']['tmp_name'];
		$header_imagedest = "../uploads/services/".$header_image;
	}else{
		$header_image = '';
	}

    // Slug query	
	$count = $db->getData("SELECT `id` FROM `services` WHERE `title` = '".addslashes($title)."'");
	$RowId = $count['id'];
	if(empty($RowId)):
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title))),"-")); 
	else: 
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title."-".$RowId))),"-")); 
	endif;
	
	$result = $db->execute("INSERT INTO `services`(`title`, `home_desc`, `short_desc`, `description_1`, `description_2`, `image`, `home_image`, `header_image`, `slug`, `status`, `created_at`) VALUES ('$title', '$home_desc', '$short_desc', '$description_1', '$description_2', '$image', '$home_image', '$header_image', '$slug', '$status', NOW())");
	
	if($result===true){
		move_uploaded_file($imagetmp,$dest);
		move_uploaded_file($home_imagetmp,$home_imagedest);
		move_uploaded_file($header_imagetmp,$header_imagedest);
    $msg = 'Record has been updated successfully ..';
	} else {
		$errmsg = 'Sorry Some Error !! Accurd ..';
	}

}

// update record query
if(isset($_REQUEST['update'])){

	$title = $db->addStr($_POST['title']);
	$short_desc = $db->addStr($_POST['short_desc']);
	$home_desc = $db->addStr($_POST['home_desc']);
    $description_1 = $db->addStr($_POST['description_1']);
    $description_2 = $db->addStr($_POST['description_2']);
	$status = $db->addStr($_POST['status']);

    $oldfile = $_POST['oldfile'];
    $oldfile1 = $_POST['oldfile1'];
    $oldfile2 = $_POST['oldfile2'];
	
	if($_FILES['image']['name']!='')
	{
	  unlink("../uploads/services/".$oldfile);
	  $image = time()."-".$_FILES['image']['name'];
		$imagetmp = $_FILES['image']['tmp_name'];
		$dest = "../uploads/services/".$image;
	} else {
	  $image = $oldfile;
	}
	
	if($_FILES['home_image']['name']!='')
	{
	  unlink("../uploads/services/".$oldfile1);
	  $home_image = time()."-".$_FILES['home_image']['name'];
	  $home_imagetmp = $_FILES['home_image']['tmp_name'];
	  $home_imagedest = "../uploads/services/".$home_image;
	} else {
	  $home_image = $oldfile1;
	}
	
	if($_FILES['header_image']['name']!='')
	{
	  unlink("../uploads/services/".$oldfile2);
	  $header_image = time()."-bg-".$_FILES['header_image']['name'];
	  $header_imagetmp = $_FILES['header_image']['tmp_name'];
	  $header_imagedest = "../uploads/services/".$header_image;
	} else {
	  $header_image = $oldfile2;
	}

  // Slug query	
	$count = $db->getData("SELECT `id` FROM `services` WHERE `title` = '".addslashes($title)."' AND `id`!='$id'");
	$RowId = $count['id'];
	if(empty($RowId)):
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title))),"-")); 
	else: 
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title."-".$RowId))),"-")); 
	endif;
	
	$result = $db->execute("UPDATE `services` SET `title` = '$title', `home_desc` = '$home_desc', `short_desc` = '$short_desc', `description_1` = '$description_1', `description_2` = '$description_2', `image` = '$image', `home_image` = '$home_image', `header_image` = '$header_image', `slug` = '$slug', `status` = '$status', `updated_at` = NOW() WHERE `id` = '$id'");
	
	if($result===true){
		move_uploaded_file($imagetmp,$dest);
		move_uploaded_file($home_imagetmp,$home_imagedest);
		move_uploaded_file($header_imagetmp,$header_imagedest);
    $msg = 'Record has been updated successfully ..';
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
    <title><?= $websiteTitle; ?> | Add Services</title>
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
      <h1> Services </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Services</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <?php if(empty($id)): ?>
              <h3 class="box-title">Add Services</h3>
              <?php else: ?>
              <h3 class="box-title">Update Services</h3>
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
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Home Description</label>
                    <div class="col-sm-6">
                      <textarea name="home_desc" class="form-control"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-6">
                      <!--<textarea name="short_desc" class="form-control"></textarea>-->
                      <textarea id="editor3" name="short_desc" rows="20" cols="100"></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>
                
                

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description 1</label>
                    <div class="col-sm-6">
                      <textarea id="editor1" name="description_1" rows="20" cols="100"></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description 2</label>
                    <div class="col-sm-6">
                      <textarea id="editor2" name="description_2" rows="20" cols="100"></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="image" id="image" onChange="PreviewImages();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreviews" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Home Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="home_image" id="home_image" onChange="PreviewImage();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Header Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="header_image" id="header_image" onChange="PreviewImageHeader();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreviewHeader" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
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
                    <input type="text" name="title" value="<?php echo $editval['title']; ?>" class="form-control" placeholder="Title" required>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Home Description</label>
                    <div class="col-sm-6">
                      <textarea name="home_desc" class="form-control"><?php echo $editval['home_desc']; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Short Description</label>
                    <div class="col-sm-6">
                      
                      <textarea id="editor3" name="short_desc" rows="20" cols="100"><?php echo $editval['short_desc']; ?></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description 1</label>
                    <div class="col-sm-6">
                      <textarea id="editor1" name="description_1" rows="20" cols="100"><?php echo $editval['description_1']; ?></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description 2</label>
                    <div class="col-sm-6">
                      <textarea id="editor2" name="description_2" rows="20" cols="100"><?php echo $editval['description_2']; ?></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="image" id="image" onChange="PreviewImages();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img src="../uploads/services/<?php echo $editval['image']; ?>" id="uploadPreviews" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Home Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="home_image" id="home_image" onChange="PreviewImage();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreview" src="../uploads/services/<?php echo $editval['home_image']; ?>" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Header Image</label>
                  <div class="col-sm-6">
                    <input type="file" name="header_image" id="header_image" onChange="PreviewImageHeader();" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <img id="uploadPreviewHeader" src="../uploads/services/<?php echo $editval['header_image']; ?>" style="width: 233px; height: 132px; border:1px solid #83888C; background-color: #ffffff;">
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
                  <input type="hidden" name="oldfile" value="<?php echo $editval['image']; ?>">  
                  <input type="hidden" name="oldfile1" value="<?php echo $editval['home_image']; ?>">  
                  <input type="hidden" name="oldfile2" value="<?php echo $editval['header_image']; ?>">  
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

 function PreviewImages() 
  {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image").files[0]);
    oFReader.onload = function(oFREvent) {
     document.getElementById("uploadPreviews").src = oFREvent.target.result;
   };
 };
 
 function PreviewImage() 
  {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("home_image").files[0]);
    oFReader.onload = function(oFREvent) {
     document.getElementById("uploadPreview").src = oFREvent.target.result;
   };
 };
 
 function PreviewImageHeader() 
  {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("header_image").files[0]);
    oFReader.onload = function(oFREvent) {
     document.getElementById("uploadPreviewHeader").src = oFREvent.target.result;
   };
 };
      
</script>
<!-- CK Editor -->
<script src="tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>

$(document).ready(function() {
  tinymce.init({
    selector: "#editor1,#editor2,#editor3",
    paste_data_images: true,
    height: 600,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
    templates: [{
      title: 'Test template 1',
      content: 'Test 1'
    }, {
      title: 'Test template 2',
      content: 'Test 2'
    }]
  });
});
</script>
</body>
</html>