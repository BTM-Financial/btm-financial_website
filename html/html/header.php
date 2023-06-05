
 <nav class="navbar navbar-expand-lg navbar-light header">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo.jpg"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> <a class="nav-link <?php if($currentpage=='home'){?>active<?php }?>" href="index.php" tabindex="-1" aria-disabled="true">Home</a> </li>

         <li class="nav-item dropdown"><a class="nav-link dropdown-toggle <?php if($currentpage=='about_us'){?>active<?php }?>" href="about-btm.php"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">About BTM Financial</a> 
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="about-btm.php#why-choose">Who We Are?</a></li>
            <li><a class="dropdown-item" href="about-btm.php#leadership">Leadership</a></li>
            <li><a class="dropdown-item" href="about-btm.php#why-us">Why Us</a></li>
            <li><a class="dropdown-item" href="about-btm.php#technology-stack">Technology Stack</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown"><a class="nav-link dropdown-toggle  <?php if($currentpage=='services'){?>active<?php }?>" href="services.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a> 
         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="application-services.php">Application Services</a></li>
            <li><a class="dropdown-item" href="data-analytics.php">Data & Analytics</a></li>
            <li><a class="dropdown-item" href="technology-consulting.php">Technology Consulting</a></li>
            <li><a class="dropdown-item" href="cloud-computing.php">Cloud Computing</a></li>
            <li><a class="dropdown-item" href="structured-finance.php">Structured Finance</a></li>
            <li><a class="dropdown-item" href="quant-analytics.php">Quant Analytics </a></li>
            <li><a class="dropdown-item" href="fixed-income-equity-analytics.php">Fixed Income & Equity Analytics</a></li>
            <li><a class="dropdown-item" href="valuation-advisory-services.php">Valuation and Advisory Services</a></li>
            <li><a class="dropdown-item" href="artificial-intelligence-machine-learning.php">Artificial Intelligence & Machine Learning</a></li>
            <li><a class="dropdown-item" href="specialized-support-team.php">Specialized Support Team</a></li>
          </ul>
        </li>
            
               <li class="nav-item dropdown"><a class="nav-link dropdown-toggle  <?php if($currentpage=='solution'){?>active<?php }?>" href="solution.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Solutions</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="solution.php">Success Stories</a></li>
               </ul></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle  <?php if($currentpage=='industries'){?>active<?php }?>" href="industries.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Industries</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="industries.php#Commercial">Commercial and Investment Banks</a></li>
                  <li><a class="dropdown-item" href="industries.php#Asset ">Asset Management Companies</a></li>
                  <li><a class="dropdown-item" href="industries.php#Accounting">Accounting Firms</a></li>
                  <li><a class="dropdown-item" href="industries.php#Special">Special Servicers</a></li>
                  <li><a class="dropdown-item" href="industries.php#Private">Private Equity & Venture Capital Firms</a></li>
                  <li><a class="dropdown-item" href="industries.php#Hedge">Hedge Funds</a></li>
                  <li><a class="dropdown-item" href="industries.php#Insurance">Insurance Companies</a></li>
                  <li><a class="dropdown-item" href="industries.php#Institutional">Institutional Investors</a></li>
                  <li><a class="dropdown-item" href="industries.php#Real">Real Estate Companies</a></li>
               </ul></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle  <?php if($currentpage=='career'){?>active<?php }?>" href="career.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Careers</a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="life-at-btm.php">Life at BTM</a></li>
                  <li><a class="dropdown-item" href="we-aim-for-the-stars.php">We aim for the stars</a></li>
                  <li><a class="dropdown-item" href="job-openings.php">Job Openings</a></li>
               </ul></li>


      </ul>   <div class="search-button d-flex">



          <button id="search" class="search-text" onclick="location.href='search-result.php';"><i class="fa fa-search"></i><span class="search-text">Search</span></button>
        </div>


    
    </div>
  </div>
</nav>