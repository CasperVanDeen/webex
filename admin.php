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
<?php 
	if (!empty($_SESSION['uid'])){
	if($cmd = filter_input(INPUT_POST, 'cmd')){
			if($cmd == 'delete-message'){
			// code to delete the video
			
			$cID = filter_input(INPUT_POST, 'messageid', FILTER_VALIDATE_INT)
				or die('Missing/illegal delete message parameter');
			
			require_once('dbcon.php');
			$sql = 'DELETE FROM contact WHERE id=?';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('i', $cID);
			$stmt->execute();
			
			if($stmt->affected_rows > 0){
				echo '<div class="col-lg-12">
				<div class="alert alert-success alert-dismissable">
  				<a href="admin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				 <strong>Success!</strong> Message successfuly deleted !</div></div>';
			}
			
			else{
				echo '<div class="col-lg-12">
				<div class="alert alert-danger alert-dismissable">
  				<a href="admin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				<strong>Error!</strong> Message was not deleted !</div></div>';
			}	
		}
	
	}		
}
	?>
<?php require('menu.php'); ?>


<!-- HEADER -->
<header>
  <div class="jumbotron parallax-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center admin-downer">
          <img src="images/logo-white.svg" alt="logo" class="logo-b">
			<?php
				if (!empty($_SESSION['uid'])){
					echo '<h1 class="wtp caption">Website Administration</h1>';}
				else {
					echo'<h1 class="text-center wtp caption"> <span class="glyphicon glyphicon-lock"></span><br> Not logged in</h1>';} ?>
			<a class="scroll" type="button" onclick="smoothScroll(document.getElementById('second'))"><img src="images/scroll.gif" alt="scroll" width="60" height="auto" class="center-block"></a>
        </div>
		  
      </div>
    </div>
  </div>
</header>
	
<?php
	if (!empty($_SESSION['uid'])){
		
		
		
		echo '	
 
<div class="container id="second"">
	<div class="col-lg-3 col-md-3">
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">';
				 echo '<h3><span class="glyphicon glyphicon-user"></span> '.$_SESSION['un'];
				 echo '</h3>
					</div>
					<div class="profile-usertitle-job">
						Admin rights<br> enabled <span class="glyphicon glyphicon-check"></span>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="admin.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Messages </a>
						</li>
						<li>
							<a href="upload.php">
							<i class="glyphicon glyphicon-upload"></i>
							Add new projects </a>
						</li>
						</div> 
	</div>
	'; }?> 
<?php 	
	
if (!empty($_SESSION['uid'])){
	echo'<div class="col-lg-9 col-md-9 container">';
	require_once('dbcon.php');
	$sql = 'SELECT id,name,surname,email,subject,comment,date FROM contact order by date desc';
	$stmt = $link->prepare($sql);
	$stmt->bind_result($cID, $na, $sn, $em, $su, $co, $da);
	$stmt->execute();
	while($stmt->fetch()){
		echo '	<div class="col-lg-5 col-md-5 messages">
				<form action="';?><?= $_SERVER['PHP_SELF'] ?><?php echo'" method="post">
				<input type="hidden" name="messageid" value="'.$cID.'" /><br>
				<button class="btn btn-danger delete-btn" type="submit" name="cmd" value="delete-message">X</button>
					
				<p class="date">'.$da.'</p>
				<h1>'.$na.' '.$sn.'</h1>
				<p>Customers email: <br>'.$em.'</p>
				<hr>'.$cID.'
				<h4>Subject: '.$su.'</h4>
				<p class="text-left">'.$co.'</p>
				
	</div>

	';}	
	}
?>	
<?php 
echo'</div>';
	if (!empty($_SESSION['uid'])){ }
	else {?>	
<script type="text/javascript">
setTimeout(function(){window.location.href='login.php'}, 2000);
</script>
<?php }?>  
      
	  
	  
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
}
	var modal = document.getElementById('myModal');

</script>
<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
