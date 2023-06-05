<?php $currentpage = "services"; ?>

<!doctype html>
<html lang="en">

<head>
  <?php include 'head.php';?>
</head>
<body>
  <?php include 'header.php';?>
  <div id="butter">
  <section class="inner_page_banner" style="background-image: url(images/banner/btm-contact.webp);">
  <div class="container">
    <div  class="row vertical_align banner-height">
      <div class="col-12">
        <h5>Contact Us</h5>
        <div class="clearfix"></div>
        <h1 id="expert-talk" >Start Your Way to Digital Success</h1> </div>
    </div>
  </div>
  <div class="container inner_page_container">
    <div class="row row-eq-height" style="background: #f6f8f8">
      <div class="col-md-12 col-lg-8">
        <h2 class="h1">Tell Us About Your Project!</h2>
        <h5>Give us some details about your project and we'll get in touch with you as soon as possible! We look forward to hearing from you!</h5>
        <div class="contact_page_form mt-4">
          <form method="post" action="contact-form-handler.php">
            <div class="row">
              <div class="col-md-12">
                <h4>Personal Details</h4></div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="Name*"  required /> </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="email" placeholder="Email Address*" required/> </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" name="number" placeholder="Phone Number* " required/> </div>
              <div class="col-md-6">
                <input type="text" class="form-control" name="company" placeholder="Company Name* " required/> </div>
            </div>
            <div class="row ">
              <div class="col-md-12">
                <h4>Project Details</h4></div>
              <div class="col-md-12">
                <textarea rows="6" class="form-control" name="message" placeholder="Please leave a few words about your project."></textarea>
              </div>
            </div>
            <button class="btn btn-success submit-bt">Send Message <i class="fa fa-long-arrow-right ml-2 mt-1"></i></button>
             </form>
        </div>
       
        <div class="clearfix"></div>
      </div>
      <div class="col-md-12 col-lg-4 bg-white contact_info p-4">
        <h3 class="h1">Contact Info</h3>
        <p>A firm with global reach, with teams across New Jersey and India.</p>
        <div class="col-md-12 bg-light p-4 contact_block lead mt-2">
          <h4 class="h3"><img src="images/united-states-flag.svg">New Jersey, USA</h4>
          4 Canterbury Road, Denville, NJ -07834, United States
          <a href="tel:+18624371138"><i class="uil uil-phone"></i> +1-862-437-1138</a>
          <a href="mailto:cs@btm-financial.com"><i class="uil uil-envelope-alt"></i> cs@btm-financial.com</a> 
        </div>


        <div class="col-md-12 bg-light p-4 contact_block lead mt-2">
          <h4 class="h3"><img src="images/india-flag.svg"> Gurugram, India</h4>
          Unit No. 807, Tower-B4, Spaze I Tech Park, Sector-49, Sohna Road, Gurgaon Haryana, India (122018)
          <a href="tel:+911244104312"><i class="uil uil-phone"></i> +91-124-410-4312</a>
          <a href="mailto:cs@btm-financial.com"><i class="uil uil-envelope-alt"></i> cs@btm-financial.com</a> </div>
       
        <div class="col-md-12  contact_block lead mt-2">
          <div class="social">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    </div>
</section>

<?php include 'footer-template.php';?>
</div>
</body>
<?php include 'footer.php';?>
</html>