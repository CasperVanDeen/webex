
<div class="col-lg-12 col-xs-12">
<?php 
error_reporting(0);
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
				echo '<div class="col-lg-12">
				<div class="alert alert-success alert-dismissable">
  				<a href="admin.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 				 <strong>Success!</strong> Project successfuly deleted !</div></div>';
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
	
	require_once('dbcon.php');
	$sql = 'SELECT id,title,sub_title,project_pic FROM project order by id desc limit 3';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $ipic);
	$stmt->execute();
	$stmt->bind_result($pID, $tit, $stit, $project_pic);
	while($stmt->fetch()){
	
?>
	

	<a href="picdetail.php?projectid=<?=$pID?>">
	<div class="col-lg-4 col-sm-6 col-xs-12 pbottom text-center">
		<div class="container-p">
 		 <img src="images/<?php echo $project_pic ;?>" alt="<?php echo $tit; ?>" class="image-p">
 		 	<div class="overlay-p">
    			<div class="text-p text-center">
					<h1><span class="glyphicon glyphicon-fullscreen"></span></h1>
					<h1><?php echo $tit; ?></h1>
				</div>
		    </div>
		</div>
		</a>
		
		<?php if (!empty($_SESSION['uid'])){ ?>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<input type="hidden" name="picid" value="<?php echo $pID; ?>" />
		<br>
		<button class="btn btn-danger delete-btn" type="submit" name="cmd" value="delete-project">Delete Project: <br> <? echo $tit; ?></button>
		</form>
		<?php } 
		
		?>
</div>
<?php } ?>
        