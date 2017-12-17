<?php session_start(); ?>
<head>
<meta charset="utf-8">
	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1463bd" />
<title>Webex.sk</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>




<!-- navigation -->
<?php require('menu.php'); ?>
<!-- / navigation -->
	
<!-- HEADER -->
<header>
  <div class="jumbotron parallax-b1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center logo-downer">
          <img src="images/logo-white.svg" alt="logo" class="logo-b">
			<br>
          <p class="wtp caption">"in advertising we trust..."</p>
			<a class="btn btn-default read-more" href="about.php">Read More</a>
			<a class="scroll" type="button" onclick="smoothScroll(document.getElementById('second'))"><img src="images/scroll.gif" alt="scroll" width="60" height="auto" class="center-block"></a>
        </div>
		  
      </div>
    </div>
  </div>
</header>
<!-- / HEADER --> 

<!-- start offers -->
<section class="swb">
  <div class="container" id="second">
    <div class="col-lg-12 page-header text-center">
      <h2>FOR BUSINESSES</h2>
    </div>
  </div>
  <div class="container " >
    <div class="row">
      <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/web-icon.png" data-holder-rendered="true">
        <h3>Websites</h3>
        <p>We believe we can handle yours as well. We make simple websites, as well as design-demanding or functionally oriented web pages.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/shop-icon.png" data-holder-rendered="true">
        <h3>SEO Optimalization</h3>
        <p>With Google Analytics, you'll know exactly how many people came to your page, where they came from, and the keywords they found.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/travel-icon.png" data-holder-rendered="true">
        <h3>Webhosting</h3>
        <p>Webhosting is simply spoken disk space on a powerful computer that is non-stop connected at high speed to the Internet.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/graphic-icon.png" data-holder-rendered="true">
        <h3>Graphic Design</h3>
        <p>Our graphic designers and creative team tell you what direction to take to get the most out of your website and your customers have found exactly what they need.</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/app-icon.png" data-holder-rendered="true">
        <h3>Mobile Apps</h3>
        <p>We know how to prepare an app for: <br> iOS, Android, Windows mobile<br></p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="images/software-icon.png" data-holder-rendered="true">
        <h3>Software</h3>
        <p>One of the key services we provide is software development tailored to your individual requirements - tailored.</p>
      </div>
    </div>
    <div class="row">
		<br>
      <div class="col-lg-12 text-center">

      </div>
    </div>
	  <!-- /end of offers -->
	  
	  
   <!-- /middle contact us with bg --> 
  </div>
  <div class="parallax-b2 b2">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12 b2-middle">
			<h2 class="wtp text-center">Do you have any questions ?</h2> <br>
			<div class="col-lg-12 col-xs-12 col-md-12">
				<div class="col-lg-4"></div>
				<div class="col-lg-4 text-center">
        	<a class="btn btn-default read-more" href="contact.php"><span class="glyphicon glyphicon-earphone"> </span> &nbsp Contact us!</a>
					</div>
				<div class="col-lg-4"></div>
			</div>
		  </div>
      </div>
    </div>
  </div>
	<div class="col-lg-12 page-header text-center">
      <h2>LATEST PROJECTS</h2>
    </div>	
  <br>
  <!-- /little gallery -->
  <?php require('pl-images.php') ?>
  
		<div class="col-lg-12 col-xs-12 text-center"><p><a class="btn btn-default " href="projects.php">View more »</a>
		<?php
			
	if (!empty($_SESSION['uid'])){
			echo'<a class="btn btn-success " href="upload.php"><span class="glyphicon glyphicon-plus"></span>&nbsp Add projects</a> '; } ?> </p></div>
    </div>
  </div>
</section>

<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-lg-12 modal-footer">
		  <br>
		  <p class="text-center">Ostrovského 2 | 04013 Košice | Slovakia | +421 918 699 666 | info@webex.sk</p>
        <p class="text-center">Copyright ©2017 Webex.sk All rights reserved.</p>
		  
      </div>
    </div>
  </div>
</footer>
<script>
window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}</script>
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
