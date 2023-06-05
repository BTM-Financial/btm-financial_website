<?php

session_start();
error_reporting();
require '../config/config.php';
require 'functions/functions.php';

$db = new dbClass();
$admin = new adminUpdate();

if(isset($_REQUEST['id'])){
  $id = base64_decode($_REQUEST['id']);
  $editval = $db->getData("SELECT * FROM `careers` WHERE `id` = '$id'");
}else{
  $id = '';
}

// insert record query
if(isset($_REQUEST['submit'])){

	$title = $db->addStr($_POST['title']);
	$location = $db->addStr($_POST['location']);
  $experienced = $db->addStr($_POST['experienced']);
  $job_type = $db->addStr($_POST['job_type']);
  $short_desc = $db->addStr($_POST['short_desc']);
	$role_responsibility = $db->addStr($_POST['role_responsibility']);
  $qualifications = $db->addStr($_POST['qualifications']);
	$status = $db->addStr($_POST['status']);
	
	// Slug query	
	$count = $db->getData("SELECT `id` FROM `careers` WHERE `title` = '".addslashes($title)."'");
	$RowId = $count['id'];
	if(empty($RowId)):
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title))),"-")); 
	else: 
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title."-".$RowId))),"-")); 
	endif;
	
	$result = $db->execute("INSERT INTO `careers`(`title`, `location`, `experienced`, `job_type`, `short_desc`, `role_responsibility`, `qualifications`, `slug`, `status`, `deleted`, `created_at`) VALUES ('$title', '$location', '$experienced', '$job_type', '$short_desc', '$role_responsibility', '$qualifications', '$slug', '$status', '0', NOW())");
	
	if($result===true):
		echo '<script>alert("Career has been created successfully")</script>';
		echo '<script>window.location.href="view-careers.php"</script>';
	else:
		$errmsg = 'Sorry Some Error !! Try Again ..';
	endif;

}

// update record query
if(isset($_REQUEST['update'])){

	$title = $db->addStr($_POST['title']);
	$location = $db->addStr($_POST['location']);
  $experienced = $db->addStr($_POST['experienced']);
  $job_type = $db->addStr($_POST['job_type']);
  $short_desc = $db->addStr($_POST['short_desc']);
	$role_responsibility = $db->addStr($_POST['role_responsibility']);
  $qualifications = $db->addStr($_POST['qualifications']);
	$status = $db->addStr($_POST['status']);
	
	// Slug query	
	$count = $db->getData("SELECT `id` FROM `careers` WHERE `title` = '".addslashes($title)."' AND `id`!='$id'");
	$RowId = $count['id'];
	if(empty($RowId)):
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title))),"-")); 
	else: 
		$slug=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', addslashes($title."-".$RowId))),"-")); 
	endif;
	
	$result = $db->execute("UPDATE `careers` SET  `title` = '$title', `location` = '$location', `experienced` = '$experienced', `job_type` = '$job_type', `short_desc` = '$short_desc', `role_responsibility` = '$role_responsibility', `qualifications` = '$qualifications', `slug` = '$slug', `status` = '$status', `deleted` = '0', `updated_at` = NOW() WHERE `id` = '$id'");
	
	if($result===true){
		echo '<script>alert("Record has been updated successfully")</script>';
		echo '<script>window.location.href="view-careers.php"</script>';
	} else {
		$errmsg = 'Sorry Some Error !! Try Again ..';
	}

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $websiteTitle; ?> | Add Careers</title>
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
      <h1> Careers </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Careers</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <?php if(empty($id)): ?>
              <h3 class="box-title">Add Careers</h3>
              <?php else: ?>
              <h3 class="box-title">Update Careers</h3>
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
              <form name="myForm" id="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-6">
                    <input type="text" name="location" class="form-control" placeholder="Location">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Experienced</label>
                  <div class="col-sm-6">
                    <input type="text" name="experienced" class="form-control" placeholder="Experienced">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Job Type</label>
                  <div class="col-sm-6">
                    <input type="text" name="job_type" class="form-control" placeholder="Job Type">
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">BTM Financial LLC</label>
                    <div class="col-sm-6">
                      <textarea name="short_desc" rows="5" cols="10" class="form-control"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Role & Responsibilities</label>
                    <div class="col-sm-6">
                      <textarea id="editor1" name="role_responsibility" rows="20" cols="100"></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Qualifications</label>
                    <div class="col-sm-6">
                      <textarea id="editor2" name="qualifications" rows="20" cols="100"></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
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
              <form name="myForm" id="myForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-6">
                    <input type="text" name="title" value="<?php echo $editval['title']; ?>" class="form-control" placeholder="Title" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Location</label>
                  <div class="col-sm-6">
                    <input type="text" name="location" value="<?php echo $editval['location']; ?>" class="form-control" placeholder="Location">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Experienced</label>
                  <div class="col-sm-6">
                    <input type="text" name="experienced" value="<?php echo $editval['experienced']; ?>" class="form-control" placeholder="Experienced">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Job Type</label>
                  <div class="col-sm-6">
                    <input type="text" name="job_type" value="<?php echo $editval['job_type']; ?>" class="form-control" placeholder="Job Type">
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">BTM Financial LLC</label>
                    <div class="col-sm-6">
                      <textarea name="short_desc" rows="5" cols="10" class="form-control"><?php echo $editval['short_desc']; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Role & Responsibilities</label>
                    <div class="col-sm-6">
                      <textarea id="editor1" name="role_responsibility" rows="20" cols="100"><?php echo $editval['role_responsibility']; ?></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Qualifications</label>
                    <div class="col-sm-6">
                      <textarea id="editor2" name="qualifications" rows="20" cols="100"><?php echo $editval['qualifications']; ?></textarea>
                      <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                        <option value="">Select status</option>
                        <option value="1" <?php if($editval['status']==1){ ?> selected <?php } ?>>Active</option>
                        <option value="0" <?php if($editval['status']==0){ ?> selected <?php } ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="update" value="Update" class="btn btn-success">
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
    oFReader.readAsDataURL(document.getElementById("thumbnail").files[0]);
    oFReader.onload = function(oFREvent) {
     document.getElementById("uploadPreview").src = oFREvent.target.result;
   };
 };
      
</script>
<!-- CK Editor -->
<script src="tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script>

$(document).ready(function() {
  tinymce.init({
    selector: "#editor1,#editor2",
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