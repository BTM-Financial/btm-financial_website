<?php

session_start();
error_reporting(0);
require '../config/config.php';
require 'functions/functions.php';

$db = new dbClass();
$admin = new adminUpdate();
// delete record query
if(isset($_REQUEST['delete']) && $_REQUEST['delete']=='y'){

$id = $_REQUEST['id'];

	$sqlDelete = $db->execute("DELETE FROM `proposal_queries` WHERE `id` = '$id'");
	if($sqlDelete==true):
		$msg = 'Record successfully deleted.';
	else:
		$errmsg = 'Sorry some error. Try Again';
	endif;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $websiteTitle; ?> | View Proposal Queries</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
      <h1> Manage Proposal Queries <small>View Proposal Queries</small> </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Proposal Queries</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Proposal Queries</h3>
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
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Project Name</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
				  
				  	$i=1;
					$cateogryQuery = $db->getAllData("SELECT * FROM `proposal_queries` ORDER BY `id` DESC");
					foreach($cateogryQuery as $row):
				  
				  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['project_name']; ?></td>
                    <td><?php echo $row['contact_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['created_at'])); ?></td>
                    <td>
                     <a href="view-proposal-details.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a> ||
                     <a href="?id=<?php echo $row['id']; ?>&delete=y" onClick="return confirm('Are you sure !! Record will be delete parmanently ..!!')"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <?php include 'footer.php'; ?>
    
  <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>