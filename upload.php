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

function sql_execute($tit, $stit, $project_pic, $p_description) {
    // database connection
    require_once('dbcon.php');

    $sql = 'INSERT INTO project (title, sub_title, project_pic, p_description) VALUES (?,?,?,?)';
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssss', $tit, $stit, $project_pic, $p_description);
    $stmt->execute();

    if ($stmt->affected_rows >0) {
        echo 'project ' . $tit . ' is added :-)';
    }
    else {
        echo 'Error adding project ' . $tit . ' does this project already exist?';
    }
}
	
	
	
	
	if (!empty($_SESSION['uid'])){
		

	if(!empty(filter_input(INPUT_POST, 'submit'))) {
    
    $tit = filter_input(INPUT_POST, 'title') 
		or die('Missing/illegal project name parameter');
	
	$stit = filter_input(INPUT_POST, 'sub_title') 
		or die('Missing/illegal project SubTitle parameter');
	
		$p_description = filter_input(INPUT_POST, 'p_description') 
		or die('Missing/illegal project name parameter');
    
    // upload img
    $target_dir = "images/";
    $project_pic = $_FILES["project_pic"]["name"];
    $target_file = $target_dir . basename($_FILES["project_pic"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
   
		// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["project_pic"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image";
            $uploadOk = 0;
        }
    }
		
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["project_pic"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    
	// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["project_pic"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["project_pic"]["name"]). " has been uploaded.";
			sql_execute($tit, $stit, $project_pic, $p_description);
			 }
		else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



		
		echo '	

<div class="container">
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
						<li>
							<a href="admin.php">
							<i class="glyphicon glyphicon-envelope"></i>
							Messages </a>
						</li>
						<li class="active">
							<a href="upload.php">
							<i class="glyphicon glyphicon-upload"></i>
							Add new projects </a>
						</li>
						</div>
	</div>';?>
	<br>
	<div class="col-lg-3 col-md-2"></div>
	<div class="col-lg-3 col-md-4 center-block v-center">
	<form class="form-group-lg" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <input class="form-control" type="text" name="title" placeholder="Project name" required>
    <br>
    <input class="form-control" type="text" name="sub_title" placeholder="SubTitle" required>
    <br>
	<textarea class="form-control" name="p_description" placeholder="Project Description" ></textarea>
	<br>
    <input class="form-group" type="file" id="project_pic" name="project_pic" placeholder="project_pic" required>
    <br>
    <input class="btn btn-info" type="submit" name="submit" value="Upload">
</form>	
	</div>
</div>
 <?php }
	else {
		?>
<script type="text/javascript">
setTimeout(function(){window.location.href='login.php'}, 2000);
</script>
	<?
	}
?>    
 
    
    
   
	  
	  
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
