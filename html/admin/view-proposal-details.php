<?php

session_start();
error_reporting(0);
require '../config/config.php';
require 'functions/functions.php';

$db = new dbClass();
$admin = new adminUpdate();
// delete record query
if(isset($_REQUEST['id'])){

$id = $_REQUEST['id'];

	$row = $db->getData("SELECT * FROM `proposal_queries` WHERE `id` = '$id'");
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
                
                <tbody>
                  
                  <tr>
                    <td><strong>Project Name</strong></td>
                    <td><?php echo $row['project_name']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Job Location</strong></td>
                    <td><?php echo $row['job_location']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Est. Start Date</strong></td>
                    <td><?php echo $row['start_date']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Est. Finish Date</strong></td>
                    <td><?php echo $row['finish_date']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Project Leader</strong></td>
                    <td><?php echo $row['project_leader']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Company</strong></td>
                    <td><?php echo $row['company']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Contact Name</strong></td>
                    <td><?php echo $row['contact_name']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Phone</strong></td>
                    <td><?php echo $row['phone']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td><?php echo $row['email']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Address</strong></td>
                    <td><?php echo $row['address']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Summary</strong></td>
                    <td><?php echo $row['summary']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Desired Outcome</strong></td>
                    <td><?php echo $row['desired_outcome']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Action To Completion</strong></td>
                    <td><?php echo $row['action_completion']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Projected Schedule</strong></td>
                    <td><?php echo $row['project_schedule']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Projected Budget</strong></td>
                    <td><?php echo $row['projected_budget']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Projected Team And Resource Requirements</strong></td>
                    <td><?php echo $row['requirements']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Proposal May Be Withdrawn If Not Accepted By Date Of</strong></td>
                    <td><?php echo $row['accepted_date']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Date Of Acceptance</strong></td>
                    <td><?php echo $row['acceptance']; ?></td>
                  </tr>
                  <tr>
                    <td><strong>Signature</strong></td>
                    <td><a href="../uploads/signature/<?php echo $row['signature']; ?>" target="_blank">File</a></td>
                  </tr>
                  
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