<!-- Technology Partner Start -->
<section class="Technology_section txt-center">
   <div class="container">
      <div class="row">
         <h2>Need a reliable technology partner?</h2>
         <h3>Want to know more about the new art of problem solving?</h3>
         <div class="technology_buttons">
            <a data-bs-toggle="modal" data-bs-target="#free-proposal"><span><img src="<?php echo $websiteUrl; ?>images/proposal.svg"></span>Get a free proposal</a> 
            <span>Or</span> 
            <!-- <a data-bs-toggle="modal" data-bs-target="#zoom-meeting"><span><img src="images/zoom.svg"></span>Book a zoom meeting</a>  -->
            <a data-bs-toggle="modal" data-bs-target="#webex-meeting"><span><img src="<?php echo $websiteUrl; ?>images/webex.png"></span>Book a Webex meeting</a> 
         </div>
      </div>
   </div>
   <img src="<?php echo $websiteUrl; ?>images/technology_bg.png" width="100%"> 
</section>
<!-- Technology Partner End -->
<!-- Footer Start -->
<section class="footer ">
   <div class="shape">
      <div class="container">
         <div class="row">
            <div class="col-12 col-md-6 responsive-full-width">
               <div class="row">
                  <div class="col-12 col-md-6">
                     <h3>SERVICES</h3>
                     <div class="footer-links">
                        <ul>
                           <?php 
                           $getFooterServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1 ORDER BY `id` ASC LIMIT 0,5");
                           foreach($getFooterServices as $getFooterService){
                           ?>
                           <li><a href="<?php echo $websiteUrl.'service/'.$getFooterService['slug']; ?>"><?php echo $getFooterService['title']; ?></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <h3></h3>
                     <div class="footer-links">
                        <ul>
                        <?php 
                           $getFooterServices = $conn->getAllData("SELECT * FROM `services` WHERE `status` = 1 ORDER BY `id` ASC LIMIT 5,10");
                           foreach($getFooterServices as $getFooterService){
                           ?>
                           <li><a href="<?php echo $websiteUrl.'service/'.$getFooterService['slug']; ?>"><?php echo $getFooterService['title']; ?></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-3 third-col responsive-half-width ">
               <h3>COMPANY</h3>
               <div class="footer-links">
                  <ul>
                     <li><a href="<?php echo $websiteUrl; ?>industries">Industries</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>solutions">Solutions</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>terms-of-use">Terms Of Use</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>privacy-policy">Privacy Policy</a></li>
                     <li><a href="<?php echo $websiteUrl; ?>contact-us">Contact Us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-12 col-md-3 p-0 footer_info responsive-half-width">
               <div class="address">
                  <img src="<?php echo $websiteUrl; ?>images/footer-logo.png">
                  <div class="clearfix"></div>
                  <img src="<?php echo $websiteUrl; ?>images/united-states-flag.svg" class="float-start flag"> 
                  <p class="float-start"> 4 Canterbury Road, Denville, NJ -07834, United States</p>
                  <!-- <div class="footer_contact_info"> <span><img src="images/mobile-icon.png"></span> <a  href="tel:18624371138">+1-862-437-1138</a>
                     <div class="clearfix"></div> <a href="mailto:cs@btm-financial.com"><i class="fa fa-paper-plane" aria-hidden="true"></i>cs@btm-financial.com</a> </div> -->
               </div>
               <div class="address">
                  <img src="<?php echo $websiteUrl; ?>images/india-flag.svg" class="float-start flag"> 
                  <p class="float-start">Unit No. 807, Tower-B4, Spaze I Tech Park, Sector-49, Sohna Road, Gurgaon Haryana, India (122018)</p>
                  <!-- <div class="footer_contact_info"> <span><img src="images/mobile-icon.png"></span> <a  href="tel:911244104312">+91-124-410-4312</a>
                     <div class="clearfix"></div> <a href="mailto:cs@btm-financial.com"><i class="fa fa-paper-plane" aria-hidden="true"></i>cs@btm-financial.com</a> </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="bottom">
      <div class="container">
         <div class="row vertical_align">
            <div class="col-12 col-md-12">
               <div class="copyright-content"> <?php echo $copyright; ?> </div>
            </div>
            <div class="col-12 col-md-4">
               <!-- <div class="copyright-content txt-center"> <a class="" href="#">Privacy</a>|<a class="" href="#">Policy </a> </div> -->
            </div>
            <!-- <div class="col-12 col-md-4">
               <div class="copyright-content powered-by"> Website design and Developed By - <span><img src="images/company-logo.png"></span> </div>
               </div> -->
         </div>
      </div>
   </div>
</section>
<!-- Footer End -->