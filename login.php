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
<div class="col-lg-12 col-xs-12">
<?php 
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	
	

   	$un = filter_input(INPUT_POST, 'un') 
	or die('Missing/illegal name parameter');
    

			
	
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal name parameter');
	   

	require_once('dbcon.php');
	// hash and salt the password
	


	$pw = password_hash($pw, PASSWORD_DEFAULT); 
	
//	echo 'Creating user: '.$un.' => '.$pw;

//checking if the user exist in the database
			$sqlcheck = 'SELECT username FROM users WHERE username=?';
			$stmtcheck = $link->prepare($sqlcheck);
			$stmtcheck->bind_param('s', $un);
			$stmtcheck->execute();
			$stmtcheck->bind_result($uncheck);
			while($stmtcheck->fetch()){}
			if($un == $uncheck){
				
			}
			else{
			
			//now when everything works fine, it's time to put those infromation to the database
			$sql = 'INSERT INTO users (username, pwhash) VALUES (?,?)';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('ss', $un, $pw);
			$stmt->execute(); }

	


	if ($stmt->affected_rows >0){
		echo '
		<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> user ['.$un.'] is added :-)
</div>';}
	else {
		echo '
		<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> Error adding user ['.$un.']  this user already exist
</div>
';
	}
}	
				
	if(!empty(filter_input(INPUT_POST, 'login'))) {

	require_once('dbcon.php');
	

    $un = filter_input(INPUT_POST, 'un')
	or die('Missing/illegal name parameter');
    // check if name only contains letters and whitespace		
	
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');

	$sql = 'SELECT id, pwHash FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);

	while ($stmt->fetch()) {} // fill result variables
	
	if (password_verify($pw, $pwhash)){
		$_SESSION['uid'] = $uid;
		$_SESSION['un'] = $un;
		echo'<div class="alert alert-success">Hello '.$un.'</div>
		';?>
		<script type="text/javascript">
setTimeout(function(){window.location.href='index.php'}, 2000);
</script>
<?php	
    }
	else {
		echo '
<div class="alert alert-danger alert-dismissable">
  <a href="index.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> illegal username/password combination.
</div>';
	}
}
?>
</div>
	
<?php require('menu.php'); ?>

<!-- HEADER -->
<header>
  <div class="jumbotron parallax-login">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 login-downer">
			<div class="col-lg-12 text-center">
          <h1 class="wtp caption">Login</h1>
			<p class="wtp where ">Website Administration <br></p>
        </div>
			<div class="col-lg-4 center-block "></div>
			<div class="col-lg-4 center-block ">


				
	
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<fieldset><br><br>
				<p class="wtp">User Name: <input class="form-control" type="text" name="un" required></p>
					<br>
				<p class="wtp">Password: <input class="form-control" type="password" name="pw" required> </p>
					<br>
				<input class="btn btn-danger" type="submit" name="submit" value="Create user" />
				<input class="btn btn-success" type="submit" name="login" value="Login" />
					<br>
						

						
				</fieldset>
			</form>	 
				</div>
			
		  </div>
      </div>
    </div>
  </div>
</header>
	
 
	  
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
