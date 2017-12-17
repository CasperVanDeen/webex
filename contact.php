<?php session_start(); ?>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1463bd" />
<title>Webex.sk</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">
<script src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>
<body>
	
<?php require('menu.php'); ?>	
<?php
 if($cmd = filter_input(INPUT_POST, 'cmd')){
	
	if($cmd == 'submit'){
		// code to add a new category
		
		$name = filter_input(INPUT_POST, 'name')
			or die('Missing/illegal name parameter');
			
		$surname = filter_input(INPUT_POST, 'surname')
			or die('Missing/illegal surname parameter');
			
		$email = filter_input(INPUT_POST, 'email')
			or die('Missing/illegal email parameter');
		
		$subject = filter_input(INPUT_POST, 'subject')
			or die('Missing/illegal subject parameter');
		
		$comment = filter_input(INPUT_POST, 'comment')
			or die('Missing/illegal comment parameter');
		
		require_once('dbcon.php');
		
		$sql = 'INSERT INTO contact (name, surname, email, subject, comment) VALUES (?, ?, ?, ?, ?)';
		
		    
  		
		
		$stmt = $link->prepare($sql);
		$stmt->bind_param('sssss', $name, $surname, $email, $subject, $comment);
		$stmt->execute();
		if($stmt->affected_rows > 0){ 	
			echo '<div class="col-lg-12 alert alert-success">Thank you "'.$name.'" for contacting us</div>';
		}
		else{
			echo '<div class="col-lg-12 alert alert-danger">Sorry, something went wrong :(</div>';
			}		
		}
 	}?>
<!-- HEADER -->
<header>
  <div class="jumbotron parallax-contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-left contact-downer">
          <p class="wtp where">WHERE WE ARE</p>
          <h1 class="wtp caption">Košice, Bratislava</h1>
			<a class="scroll" type="button" onclick="smoothScroll(document.getElementById('second'))"><img src="images/scroll.gif" alt="scroll" width="60" height="auto" class="center-block"></a>
        </div>
		  
      </div>
    </div>
  </div>
</header>
	
<div class="container">
    <div class="col-lg-12 page-header text-center">
		
      <h2>CONTACT</h2>
    </div>
  </div>
  <div class="container " id="second">
    <div class="row">
      <div class="col-lg-4 col-sm-4 col-xs-12 text-center"> 
        <p><iframe src="https://www.google.com/maps/d/embed?mid=1dyZF4vUxi92lSt2iu7JvPEz27TA" width="100%" height="500"></iframe></p><br>
      </div>
		<div class="col-lg-4 col-sm-4 col-xs-6 text-left">
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
      <div class="col-lg-4 col-sm-4 col-xs-6 text-center">
		  <h3>Any questions ?</h3>
		  <br>

		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
		  <div class="form-group text-left">
			  		<label for="name">* Name:</label>
       			 		<input class="form-control" name="name" type="text" placeholder="Name" >
			  				<span class="error"> </span><br>
			  		<label for="surname">* Surname:</label>
       			 		<input class="form-control" name="surname" type="text" placeholder="Surname" >
			  				<span class="error"> </span><br>
			  		<label for="email">* Email:</label>
       			 		<input class="form-control" name="email" type="email" placeholder="Email" >
			  				<span class="error"> </span><br>
			  		<label for="comment"> Subject:</label>
			  		<input class="form-control" name="subject" type="text" placeholder="Subject" >
			  		<br>
			  		<label for="comment">* Comment:</label>
 						<textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
			  				<span class="error"> </span>
			  		<br>
			  <button class="btn btn-info pull-right col-lg-12 col-md-12 col-xs-12" name="cmd" value="submit" type="submit">Submit</button>
			  
			 
		  </div>
		</form>
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
