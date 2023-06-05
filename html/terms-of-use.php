<?php

session_start();
error_reporting();
require 'config/config.php';
$conn = new dbClass();
?>
<!doctype html>
<html lang="en">
   <head>
   <?php include 'includes/head.php';?>
   </head>
   <body>
   <?php include 'includes/header.php';?>
      <div id="butter">
         <section class="inner_page_banner" style="background-image: url(<?php echo $websiteUrl; ?>images/banner/case-study.webp);">
            <div class="container">
               <div class="row vertical_align banner-height">
                  <div class="col-12">
                     <!-- <h5>Privacy Policy</h5> -->
                     <div class="clearfix"></div>
                     <h1>Terms of Use</h1>
                  </div>
               </div>
            </div>
            <div class="container inner_page_container spacing-class">
               <div class="row">
                  <div class="col-12">
                     <p> Please read these terms and conditions carefully. By accessing this web site and any pages hereof, you are indicating that you have read, acknowledge and agree to be bound by these Terms of Use. If you do not agree to these Terms of Use, do not access this web site. BTM Financial LLC reserves the right to change these Terms of Use which you are responsible for regularly reviewing and your continued use of this web site constitutes agreement to all such changes. As used herein, BTM Financial LLC means BTM Financial LLC and its affiliates.</p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <h2>General Information</h2>
                     <div class="bar_seprator"></div>
                     <!--<p>This web site is comprised of various web sites operated by BTM Financial LLC (collectively, the "web site"). Certain sections of or pages on this web site may contain separate terms and conditions, which are in addition to these Terms of Use. You should read those additional terms and conditions carefully. By accessing such sections or pages, you agree to be bound by those additional terms and conditions. In the event of a conflict, those additional terms and conditions will govern your use of those sections or pages. </p>-->
                     <p>
                        Unauthorized use of BTM Financial LLC's web site and systems, including, but not limited to, unauthorized entry into BTM Financial LLC's systems, misuse of passwords or misuse of any other information, is strictly prohibited. You may not use this web site in any manner that could damage, disable, overburden, or impair any BTM Financial LLC site or service or interfere with any other party's use and enjoyment of any BTM Financial LLC site or service. You may not attempt to gain unauthorized access to any BTM Financial LLC site or service, computer systems or networks connected to any BTM Financial LLC site or service, through hacking, password mining or any other means. You agree that you will not engage in any activities related to this web site that are contrary to applicable laws or regulations. 
                     </p>
                     <p>BTM Financial LLC reserves the right, in its sole discretion, without any obligation and without any notice requirement, to change, improve or correct the information, materials and descriptions on this web site and to suspend and/or deny access to this web site for scheduled or unscheduled maintenance, upgrades, improvements or corrections. The information and materials on this web site may contain typographical errors or inaccuracies. Any dated information is published as of its date only, and BTM Financial LLC does not undertake any obligation or responsibility to update or amend any such information. BTM Financial LLC may discontinue or change any product or service described in or offered on this web site at any time</p
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <h2>Disclaimer of Warranty and Limitation of Liability</h2>
                     <div class="bar_seprator"></div>
                     <p>The information, products and services on this web site are provided on an "AS IS," "WHERE IS" and "WHERE AVAILABLE" basis. BTM Financial LLC does not warrant the information or services provided herein or your use of this web site generally, either expressly or impliedly, for any particular purpose and expressly disclaims any implied warranties, including but not limited to, warranties of title, non-infringement, merchantability or fitness for a particular purpose. BTM Financial LLC will not be responsible for any loss or damage that could result from interception by third parties of any information or services made available to you via this web site. Although the information provided to you on this web site is obtained or compiled from sources we believe to be reliable, BTM Financial LLC cannot and does not guarantee the accuracy, validity, timeliness or completeness of any information or data made available to you for any particular purpose. Neither BTM Financial LLC, nor any of its affiliates, directors, officers or employees, nor any third party vendor, will be liable or have any responsibility of any kind for any loss or damage that you incur in the event of any failure or interruption of this web site, or resulting from the act or omission of any other party involved in making this web site, the data contained herein or the products or services offered on this web site available to you, or from any other cause relating to your access to, inability to access, or use of the web site or these materials, whether or not the circumstances giving rise to such cause may have been within the control of BTM Financial LLC or of any vendor providing software or services. In no event will BTM Financial LLC or any such parties be liable to you, whether in contract or tort, for any direct, special, indirect, consequential or incidental damages or any other damages of any kind even if BTM Financial LLC or any other such party has been advised of the possibility thereof. This limitation on liability includes, but is not limited to, the transmission of any viruses which may infect a user's equipment, failure of mechanical or electronic equipment or communication lines, telephone or other interconnect problems (e.g., you cannot access your internet service provider), unauthorized access, theft, operator errors, strikes or other labor problems or any force majeure. BTM Financial LLC cannot and does not guarantee continuous, uninterrupted or secure access to the web site.
                     </p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <h2>Proprietary Rights</h2>
                     <div class="bar_seprator"></div>
                     <p>All right, title and interest in this web site and any content contained herein is the exclusive property of BTM Financial LLC, except as otherwise stated. Unless otherwise specified, this web site is for your personal and non-commercial use only and you may print, copy and download any information or portion of this web site for your personal use only. You may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, frame, create derivative works from, transfer, or otherwise use in any other way for commercial or public purposes in whole or in part any information, software, products or services obtained from this web site, except for the purposes expressly provided herein, without BTM Financial LLC's prior written approval. If you copy or download any information or software from this web site, you agree that you will not remove or obscure any copyright or other notices or legends contained in any such information.</p>
                     <p>BTM Financial LLC, the BTM Financial LLC logo and other BTM Financial LLC trademarks and service marks referenced herein are trademarks and service marks of BTM Financial LLC. The names of other companies and third-party products or services mentioned herein may be the trademarks or service marks of their respective owners. You are prohibited from using any marks for any purpose including, but not limited to use as metatags on other pages or sites on the World Wide Web without the written permission of BTM Financial LLC or such third party, which may own the marks. </p>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <h2>Use of Links</h2>
                     <div class="bar_seprator"></div>
                     <p>This web site contains links to third party web sites. These links are provided only as a convenience. The inclusion of any link is not and does not imply an affiliation, sponsorship, endorsement, approval, investigation, verification or monitoring by BTM Financial LLC of any information contained in any third party web site. In no event shall BTM Financial LLC be responsible for the information contained on that site or your use of or inability to use such site. You should also be aware that the terms and conditions of such site and the site's privacy policy may be different from those applicable to your use of this web site.</p>
                  </div>
               </div>
               <!--              <div class="row">-->
               <!--              <div class="col-12">-->
               <!--                <h2>Securities Products</h2>-->
               <!--                <div class="bar_seprator"></div>-->
               <!--                <p>None of the information contained in this web site constitutes a recommendation, solicitation or offer by BTM Financial LLC or its affiliates to buy or sell any securities, futures, options or other financial instruments or provide any investment advice or service. The information contained in this web site has been prepared without reference to any particular user's investment requirements or financial situation. Certain transactions give rise to substantial risk and are not suitable for all investors. Prior to the execution of any transaction by you involving information you received from this web site, you should consult your business advisor, attorney and tax and accounting advisors with respect to the price, suitability, value, risk or other aspects of any stock, mutual fund, security or other investment. Pricing and other information generated through the use of data or services made available herein may not reflect actual prices or values that would be available in the market at the time provided or at the time that the user may want to purchase or sell a particular security or other instrument. The information and services provided on this web site are not provided to and may not be used by any person or entity in any jurisdiction where the provision or use thereof would be contrary to applicable laws, rules or regulations of any governmental authority or regulatory or self-regulatory organization or clearing organization or where BTM Financial LLC is not authorized to provide such information or services. Some products and services described in this web site may not be available in all jurisdictions or to all clients.-->
               <!--</p>-->
               <!--              </div>-->
               <!--            </div>-->
               <div class="row">
                  <div class="col-12">
                     <h2>Choice of Law</h2>
                     <div class="bar_seprator"></div>
                     <p>These Terms of Use shall be governed by and construed in accordance with the laws of the state of New York, without regard to conflicts of laws provisions. Sole and exclusive jurisdiction for any action or proceeding arising out of or related to these Terms of Use shall be in an appropriate state or federal court located in the County of New York, State of New York and the parties unconditionally waive their respective rights to a jury trial. Any cause of action you may have with respect to your use of this web site must be commenced within one (1) year after the claim or cause of action arises. If for any reason a court of competent jurisdiction finds any provision of these Terms of Use, or a portion thereof, to be unenforceable, that provision shall be enforced to the maximum extent permissible so as to affect the intent of these Terms of Use, and the remainder of these Terms of Use shall continue in full force and effect. These Terms of Use constitutes the entire agreement between BTM Financial LLC and you with respect to this site and it supersedes all prior or contemporaneous communications, agreements and understandings between BTM Financial LLC and you with respect to the subject matter hereof.A printed version of these Terms of Use shall be admissible in judicial or administrative proceedings.</p>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </section>
         <?php include 'includes/footer-content.php';?>
      </div>
   </body>
   <?php include 'includes/footer.php';?>
</html>