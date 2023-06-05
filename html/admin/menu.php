<!-- Sidebar user panel -->
<div class="user-panel">
   <div class="pull-left image"> 
      <?php if(!empty($userRow['image'])){ ?>
      <img src="../uploads/user-image/<?php echo $userRow['image']; ?>" class="img-circle">
      <?php }else{ ?>
      <img src="dist/img/user-image.jpg" class="img-circle" alt="User Image">
      <?php } ?> 
   </div>
   <div class="pull-left info">
      <p><?php echo $userRow['username']; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a> 
   </div>
</div>
<section class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: auto;">
   <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active"> <a href="home.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a> </li>
	  <li> <a href="view-banner.php"> <i class="fa fa-file-image-o"></i> <span>Banners</span> </a> </li>
      <li> <a href="view-industries.php"> <i class="fa fa-file"></i> <span>Industries</span> </a> </li>
      <li> <a href="view-services.php"> <i class="fa fa-file"></i> <span>Services</span> </a> </li>
      <li> <a href="view-success-stories.php"> <i class="fa fa-file"></i> <span>Success Stories</span> </a> </li>
      <li> <a href="view-leadership.php"> <i class="fa fa-file"></i> <span>Leadership</span> </a> </li>
      <li> <a href="view-why-choose.php"> <i class="fa fa-file"></i> <span>Why Choose US</span> </a> </li>
      <li> <a href="view-technology.php"> <i class="fa fa-file"></i> <span>Technology Stack</span> </a> </li>
      <li class="treeview">
         <a href="#"> <i class="fa fa-industry"></i> <span>Careers</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
         <ul class="treeview-menu">
            <li><a href="view-careers.php"><i class="fa fa-circle-o"></i> Careers</a></li>
            <li><a href="view-careers-queries.php"><i class="fa fa-circle-o"></i> Careers Queries</a></li>
         </ul>
      </li>
      <li class="treeview">
         <a href="#"> <i class="fa fa-industry"></i> <span>Pages</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
         <ul class="treeview-menu">
            <li><a href="add-about-us.php"><i class="fa fa-circle-o"></i> About BTM</a></li>
            <li><a href="add-life.php"><i class="fa fa-circle-o"></i> Life At BTM</a></li>
            <li><a href="add-we-aim.php"><i class="fa fa-circle-o"></i> We Aim</a></li>
         </ul>
      </li>
      <li class="treeview">
         <a href="#"> <i class="fa fa-industry"></i> <span>Queries</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
         <ul class="treeview-menu">
            <li><a href="view-queries.php"><i class="fa fa-circle-o"></i> Contact Us</a></li>
            <li><a href="view-webex-queries.php"><i class="fa fa-circle-o"></i> Webex Queries</a></li>
            <li><a href="view-proposal-queries.php"><i class="fa fa-circle-o"></i> Proposal Queries</a></li>
         </ul>
      </li>
   </ul>
</section>