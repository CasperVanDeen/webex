<nav class="navbar navbar-default col-sm-12 col-xs-12 col-md-12 col-lg-12 ">
  <div class="container-fluid"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="logo-fixer" href="index.php"><span  class="navbar-brand logo" href="index.php"></span></a> </div>
    
    <div class="collapse navbar-collapse panel-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right wtp">
        <li><a href="projects.php">Projects</a> </li>
        <li><a href="about.php">About</a> </li>
		<li><a href="contact.php">Contact</a> </li>
		 
		  <? if (!empty($_SESSION['uid'])){ echo'
		  <li><a href="admin.php">Administration</a> </li> 
		 <li><a class="btn btn-danger" href="logout.php"> Logout &nbsp <span class="glyphicon glyphicon-log-out"> </span></a></li>

		 '; } else {
	echo'<li><a href="login.php"> Login &nbsp<span class="glyphicon glyphicon-log-in"> </span></a> </li>';
}?>
      </ul>
    </div>
  </div>
</nav>