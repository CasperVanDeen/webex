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
<body>
	
<?php require('menu.php'); ?>

<!-- HEADER -->
<header>
  <div class="jumbotron parallax-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-left contact-downer">
          <p class="wtp where">WANT TO KNOW MORE</p>
          <h1 class="wtp caption">About us ?</h1>
				<a class="scroll" type="button" onclick="smoothScroll(document.getElementById('second'))"><img src="images/scroll.gif" alt="scroll" width="60" height="auto" class="center-block"></a>
        </div>
		  
      </div>
    </div>
  </div>
</header>
	
<div class="container">
    <div class="col-lg-12 page-header text-center">
    </div>
  </div>
  <div class="container " id="second">
    <div class="row">
      <div class="col-lg-9 col-sm-12 text-left"> 
        <h3>"Competitive struggle means that the first professional criteria have begun"</h3><br>
		  <p>We've got many clients. We have lost many clients. We made mistakes and bad decisions. But thanks to them we have became better. And today? We do everything to improve our visions for our future.</p>
		  <p>We helped to realize more than 1700 projects in different fields.</p>
		  <p>We will create, design and optimize your site so that your customers can easily find you on their prefered search engines.
Competition is a dull, key place. Well, we have our own ideas to catch and not to drop out of our values.</p>
		  <p>You will find comprehensive solutions for web and online application development:</p>
		  <li>
		  Creation of WWW presentations
		  </li>
		  <li>
		  Apple and Android Apps
		  </li>
		  <li>
		  Coding online Apps
		  </li>
		  <li>
		  Implemetation of editorial systems
		  </li>
		  <li>
		  CMS Echelon Online
		  </li>
		  <li>
		  Online games
		  </li>
		  <li>
		  Service, update websites
		  </li>
		  <li>
		  Registration and Administration websites
		  </li>
		  <li>
		  Webhosting for websites
		  </li>
		  <li>
		  SEO Analysis (optimalization for search engines)
		  </li>
		  <li>
		  E-marketing
		  </li>
		  <li>
		  Graphic works
		  </li>
		  <li>
		  Advertising
		  </li>
		  <p>For anyone who decides for us, thank you for your confidence and we believe we will find the optimal solution for you that best suits your needs and budget.</p>
		  <b>Our only boss is our customer</b><br><br>
		  <i>We are looking forward to our cooperation</i><br><br>
		  <i>Team </i><b> Webex</b>
      </div>
		<div class="col-lg-3 col-sm-12 text-left">
        <h3>Headquarters in Košice</h3>
		  <b>Address</b>
        <p>Ostrovského 2
			<br>040 11 Košice
			<br>Slovak Republic<br><br>
		  <b>Phone:</b> +421 918 699 666<br>
			<b>e-mail:</b> kosice@webex.sk<br>
				<b>www:</b> webex.sk
		  </p>
		  
		  <h3>Headquarters in Bratislava</h3>
		  <b>Address</b>
        <p>Panónska cesta 17
			<br>851 04 Bratislava
			<br>Slovak Republic<br><br>
		  <b>Phone:</b> +421 917 990 004<br>
			<b>e-mail:</b> bratislava@webex.sk<br>
				<b>www:</b> webex.sk <br><br>
		  </p>
      </div>      
    </div>
	  
	  
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
