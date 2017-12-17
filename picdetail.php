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
<?php
require('menu.php'); ?>
<?php 
if (!empty($_SESSION['uid'])){
if($cmd = filter_input(INPUT_POST, 'cmd')){
			if($cmd == 'delete-project'){
			// code to delete the video
			
			$pID = filter_input(INPUT_POST, 'picid', FILTER_VALIDATE_INT)
				or die('Missing/illegal delete project parameter');
			
			require_once('dbcon.php');
			$sql = 'DELETE FROM project WHERE id=?';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('i', $pID);
			$stmt->execute();
			
			if($stmt->affected_rows > 0){
				header("location:projects.php");
				exit();
			}
			
			else{
				echo '<div class="col-lg-12">
				<div class="alert alert-danger alert-dismissable">
  				<a href="admin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				<strong>Error!</strong> Project was not deleted !</div></div>';
			}	
		}
	
	}		
}
?>
<?php
$projectid= filter_input(INPUT_GET,'projectid',FILTER_VALIDATE_INT) 
or die('Missing/illegal projectid parameter'); ?>

<?php
	require_once ('dbcon.php');
// selecting title for specific movie
$sql = '
SELECT id,title,sub_title,project_pic,p_description FROM project WHERE id=?;
';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $projectid);
	$stmt->execute();
	$stmt->bind_result($pID, $tit, $stit, $project_pic, $p_description);
	while($stmt->fetch()){
		
?>
	
	<header>
  <div class="jumbotron pd-overflow">
	  <img src="images/<? echo $project_pic;?>" alt="<? echo $tit;?>" class="parallax-details">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-left contact-downer">
          <p class="wtp where"><? echo $stit;?></p>
          <h1 class="wtp caption"><? echo $tit;?></h1>
			<a class="scroll" type="button" onclick="smoothScroll(document.getElementById('second'))"><img src="images/scroll.gif" alt="scroll" width="60" height="auto" class="center-block"></a>
        </div>
		  
      </div>
    </div>
  </div>
</header>

<div class="container pdb">
    <div class="col-lg-12 page-header text-center" id="second">
      <h1>Project <? echo $tit;?> description</h1>
	</div>
		<div class="col-lg-12">
			<div class="col-lg-6 col-xs-12 col-sm-6">
				<? echo $p_description; ?>
				<br><br><br>
			</div>
    		<div class="col-lg-6 col-xs-12 col-sm-6 text-center text-capitalize">
			<img src="images/<? echo $project_pic;?>" alt="<? echo $tit;?>" class="img-responsive">
			<h1><? echo $tit;?></h1>
			<h2><? echo $stit;?></h2>
			
			</div>
<?php } ?>	
	
		
	<?php if (!empty($_SESSION['uid'])){ ?>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<input type="hidden" name="picid" value="<?php echo $pID; ?>" />
		<br>
		<button class="btn btn-danger delete-btn center-block" type="submit" name="cmd" value="delete-project">Delete Project: <br> <? echo $tit; ?></button>
		</form>
		<?php } ?>	
	</div>
</div>
	<br>
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

<script src="js/jquery-1.11.3.min.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>
