<div class="progress-wrap">
   <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
   </svg>
</div>
<!--Bootstrap script -->
<!-- <script src="js/butter.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
<script src="<?php echo $websiteUrl; ?>js/script.js"></script>
<script src="<?php echo $websiteUrl; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="js/owl.carousel.min.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
<script src="<?php echo $websiteUrl; ?>js/index.js"></script>
<script>
   butter.init({
     cancelOnTouch: true
   });
</script>
<script type="text/javascript">
   jQuery(document).ready(function($) {
     "use strict";
     jQuery('#customers-testimonials').owlCarousel({
       loop: true,
       // center: true,
       items: 2,
       margin: 20,
       autoplay: true,
       dots: true,
       nav: true,
       autoplayTimeout: 11000,
       // smartSpeed: 450,
       navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
       responsive: {
         0: {
           items: 1
         },
         768: {
           // margin: 0,
           items: 1
         },
         1170: {
           items: 2
         }
       }
     });
   });
   // $('#search').click(function() {
   //   $('.search-form').animate({
   //     right: 0
   //   }, 50);
   //   $('.search-popup').show();
   //   $('.search-bg').click(function() {
   //     $('.search-popup').hide();
   //     $('.search-form').animate({
   //       right: '-100%'
   //     }, 50);
   //   });
   // });
</script>
<!--Map Pointers Script-->
<script>
   $(document).ready(function() {
      $(".points").click(function () {   
   
       var title = $(this).find("span");
       Alert(title);
   
       // if (!title.length) {
       //     $(this).append('<span class="map-pointers">' + $(this).attr("title") + '</span>');
       // } else {
       //     title.remove();
       // }
   });});
</script>
<script type="text/javascript">
   // toggle class scroll
   $(window).scroll(function() {
     if($(this).scrollTop() > 50) {
       $(".header").addClass("fixed-header");
     } else {
       $(".header").removeClass("fixed-header");
     }
   });
</script>

<!-- More case study carousel -->
<script type="text/javascript">
   $(document).ready(function() {
     $('.related-case-study-section').owlCarousel({
       loop: true,
       margin: 15,
       arrow: false,
       dots: false,
       autoplay: true,
       nav: false,
       responsiveClass: true,
       responsive: {
         0: {
           items: 1,
           nav: true
         },
         600: {
           items: 1,
           nav: false
         },
         1000: {
           items: 1,
           nav: true,
           loop: false
         }
       }
     })
     $(".related-case-study-section .owl-prev").html('<i class="fa fa-chevron-left"></i>');
     $(".related-case-study-section .owl-next").html('<i class="fa fa-chevron-right"></i>');
      
   });

</script>
<!--Get free proposal form -->
<div class="container d-flex justify-content-center">
   <div class="modal fade" id="free-proposal" tabindex="-1" role="dialog" aria-labelledby="free-proposal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">
         <div class="modal-content border-0 mx-3">
            <div class="modal-body p-0">
               <div class="row justify-content-center">
                  <div class="col-auto">
                     <div class="card border-0 justify-content-center">
                        <div class="card-header pb-0 bg-white">
                           <div class="row mb-0 justify-content-end p-2">
                              <div class="col-11">
                                 <h3 class="text-white fw-bold"><img src="<?php echo $websiteUrl; ?>images/proposal.svg" class="d-inline" width="50px"> Get a free proposal</h3>
                              </div>
                              <div class="col-1"><img class="img-fluid cross pull-right " src="<?php echo $websiteUrl; ?>images/close-btn.svg" data-bs-dismiss="modal"></div>
                           </div>
                        </div>
                        <div class="card-body px-lg-4 px-md-4 mb-3">
                           <div class="contact_page_form pop-up-form">
                              <form method="post" action="get-values.php" enctype="multipart/form-data">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h4 class="text-white">BTM financial llc proposal form</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" placeholder="Project Name*" name="project_name" required> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" placeholder="Job Location*" name="job_location" required> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input placeholder="EST. Start Date" name="start_date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="start-date" /> 
                                    </div>
                                    <div class="col-md-6">
                                       <input placeholder="EST. Finish Date" name="finish_date" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="finish-date" /> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" placeholder="Project Leader*" name="project_leader"> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" placeholder="Company*" name="company"> 
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Personal Details</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" name="contact_name" placeholder="Contact Name*" required> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="tel" name="phone" placeholder="Phone*" required> 
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-md-6">
                                       <input type="email" name="email" placeholder="Email Address*" required> 
                                    </div>
                                    <div class="col-md-6">
                                       <textarea rows="6" name="address" class="form-control" placeholder="Address"></textarea>
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Other Information</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <textarea placeholder="Summary" name="summary"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="number" name="desired_outcome" placeholder="Desired Outcome"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" name="action_completion" placeholder="Action to completion"> 
                                    </div>
                                    <div class="col-md-6">
                                       <input placeholder="Projected  Schedule" name="project_schedule" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="project-schedule" /> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="number" name="projected_budget" placeholder="Projected  Budget"> 
                                    </div>
                                    <div class="col-md-6">
                                       <textarea placeholder="Project Team & Resource Requirements" name="requirements"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                       <input name="accepted_date" placeholder="Proposal may be withdrawn if not accepted by date of" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="accepted-date" /> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Acceptance of proposal</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="file" name="signature">
                                       
                                    </div>
                                    <div class="col-md-6">
                                       <input placeholder="Date of acceptance" name="acceptance" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="Date-of-acceptance" /> 
                                    </div>
                                 </div>
                                 <input type="submit" name="proposal_submit" value="Send Message" class="btn btn-success submit-bt">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Get free proposal form -->
<!--Book a webex meeting -->
<div class="container d-flex justify-content-center">
   <div class="modal fade" id="webex-meeting" tabindex="-1" role="dialog" aria-labelledby="webex-meeting" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">
         <div class="modal-content border-0 mx-3">
            <div class="modal-body p-0">
               <div class="row justify-content-center">
                  <div class="col-auto">
                     <div class="card border-0 justify-content-center">
                        <div class="card-header pb-0 bg-white">
                           <div class="row mb-0 justify-content-end p-2">
                              <div class="col-11">
                                 <h3 class="text-white fw-bold"><img src="<?php echo $websiteUrl; ?>images/webex.png" class="d-inline" width="50px">&nbsp;Book a webex meeting</h3>
                              </div>
                              <div class="col-1"><img class="img-fluid cross pull-right " src="<?php echo $websiteUrl; ?>images/close-btn.svg" data-bs-dismiss="modal"></div>
                           </div>
                        </div>
                        <div class="card-body px-lg-4 px-md-4 mb-3">
                           <div class="contact_page_form pop-up-form">
                              <form method="post" action="get-values.php">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Personal Details</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="name" placeholder="Name*" required/> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="email" placeholder="Email Address*" required/> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="phone" placeholder="Phone Number*" required/> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="company" placeholder="Company Name*" required/> 
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Project Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                       <textarea rows="6" class="form-control" name="message" placeholder="Please leave a few words about your project."></textarea>
                                    </div>
                                 </div>
                                 <input type="submit" name="webex_submit" value="Send Message" class="btn btn-success submit-bt">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="quote-meeting" tabindex="-1" role="dialog" aria-labelledby="zoom-meeting" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">
         <div class="modal-content border-0 mx-3">
            <div class="modal-body p-0">
               <div class="row justify-content-center">
                  <div class="col-auto">
                     <div class="card border-0 justify-content-center">
                        <div class="card-header pb-0 bg-white">
                           <div class="row mb-0 justify-content-end p-2">
                              <div class="col-11">
                                 <h3 class="text-white fw-bold"><img src="<?php echo $websiteUrl; ?>images/proposal.svg" class="d-inline" width="60px">&nbsp;Get a quote</h3>
                              </div>
                              <div class="col-1"><img class="img-fluid cross pull-right " src="<?php echo $websiteUrl; ?>images/close-btn.svg" data-bs-dismiss="modal"></div>
                           </div>
                        </div>
                        <div class="card-body px-lg-4 px-md-4 mb-3">
                           <div class="contact_page_form pop-up-form">
                              <form method="post" action="get-values.php">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Personal Details</h4>
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="name" placeholder="Name*"  required /> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="email" placeholder="Email Address*" required/> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="number" placeholder="Phone Number*" required/> 
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" class="form-control" name="company" placeholder="Company Name*" required/> 
                                    </div>
                                 </div>
                                 <div class="row ">
                                    <div class="col-md-12">
                                       <h4 class="text-white">Project Details</h4>
                                    </div>
                                    <div class="col-md-12">
                                       <textarea rows="6" class="form-control" name="message" /></textarea>
                                    </div>
                                 </div>
                                 <input type="submit" name="webex_submit" value="Send Message" class="btn btn-success submit-bt">
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Book a zoom meeting -->