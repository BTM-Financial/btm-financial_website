<?php

// --- Check session value --- //
$admin->checkSession($_SESSION['ADMIN_USER_ID']);
// --- Get logged in user detail -- //
$userRow = $admin->getUsers($_SESSION['ADMIN_USER_ID']);

?>
<a href="home.php" class="logo"> 
<span class="logo-mini"><!--<img src="dist/img/logo-icon.ico">--><strong style="color:#000000">BTM</strong></span> 
<span class="logo-lg"><!--<img src="dist/img/logo-light-text.png">--><strong style="color:#000000"><?php echo $websiteTitle; ?></strong></span>
</a>
<nav class="navbar navbar-static-top"> <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> <span class="sr-only">Toggle navigation</span> </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu"> 
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
        <?php if(!empty($userRow['image'])){ ?>
        <img src="../uploads/user-image/<?php echo $userRow['image']; ?>" class="user-image">
        <?php }else{ ?>
        <img src="dist/img/user-image.jpg" class="user-image">
        <?php } ?> 
        <span class="hidden-xs"><?php echo $userRow['username']; ?></span> 
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header"> 
          <?php if(!empty($userRow['image'])){ ?>
          <img src="../uploads/user-image/<?php echo $userRow['image']; ?>" class="img-circle" alt="User Image">
          <?php }else{ ?>
          <img src="dist/img/user-image.jpg" class="img-circle" alt="User Image">
          <?php } ?> 
            <p> <?php echo $userRow['username']; ?> <small> <?php echo $userRow['email']; ?> </small> </p>
          </li>
          <!-- Menu Body -->
          <li class="user-footer">
            <div class="pull-left"> <a href="change-password.php" class="btn btn-default btn-flat">Change Password</a> </div>
            <div class="pull-right"> <a href="signout.php" class="btn btn-default btn-flat">Sign out</a> </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>