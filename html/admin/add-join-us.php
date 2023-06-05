<?php

session_start();
error_reporting(0);
require '../config/config.php';
require 'functions/functions.php';
include 'functions/image-resize.php';

$db = new dbClass();
$admin = new adminUpdate();

$editval = $db->getData("SELECT * FROM `pages` WHERE `page_id` = '2'");
// update record query
if(isset($_REQUEST['update'])){
	$page_name = 'Help';
	$page_title = $db->addStr($_POST['page_title']);
	$page_detail = $db->addStr($_POST['page_detail']);
	$meta_title = $db->addStr($_POST['meta_title']);
	$meta_description = $db->addStr($_POST['meta_description']);
	$meta_keyword = $db->addStr($_POST['meta_keyword']);
	$status = $db->addStr($_POST['status']);

	$result = $db->execute("UPDATE `pages` SET `page_title` = '$page_title', `page_detail` = '$page_detail', `meta_title` = '$meta_title', `meta_description` = '$meta_description', `meta_keyword` = '$meta_keyword', `is_active` = '$status', `modified_by` = '".$_SESSION['ADMIN_USER_ID']."', `modified_at` = NOW() WHERE `page_id` = '2'");

	if($result===true){
		$msg = 'Page has been updated successfully ..';
	} else {
		$errmsg = 'Sorry Some Error !! ..';
	}

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $websiteTitle; ?> | Add Join Us</title>
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
      <h1> Join Us </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Join Us</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Join Us</h3>
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
              
              <form name="pages" id="pages" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Page Title</label>
                  <div class="col-sm-6">
                    <input type="text" name="page_title" value="<?php echo $editval['page_title']; ?>" class="form-control" placeholder="Page Title" required>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Long Description</label>
                    <div class="col-sm-6">
                      <textarea id="editor1" name="page_detail" rows="20" cols="100"><?php echo $editval['page_detail']; ?></textarea>
                    <input name="imageEditor" type="file" id="upload" class="hidden" onChange="" style="display:none;">
</div>
                </div>
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">
                    <select name="status" class="form-control" required>
                        <option value="">Select Status</option>
                        <option value="1" <?php if($editval['is_active']==1): ?> selected="selected" <?php endif; ?>>Active</option>
                        <option value="0" <?php if($editval['is_active']==0): ?> selected="selected" <?php endif; ?>>Inactive</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Meta Title</label>
                    <div class="col-sm-6">
                      <textarea name="meta_title" class="form-control" rows="4" placeholder="Meta Title"><?php echo $editval['meta_title']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Meta Description</label>
                    <div class="col-sm-6">
                      <textarea name="meta_description" class="form-control" rows="4" placeholder="Meta Description"><?php echo $editval['meta_description']; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Meta Keywords</label>
                    <div class="col-sm-6">
                      <textarea name="meta_keyword" class="form-control" rows="4" placeholder="Meta Keywords"><?php echo $editval['meta_keyword']; ?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="update" value="Update" class="btn btn-danger">
                  </div>
                </div>
              </form>
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
<!-- CK Editor -->
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>