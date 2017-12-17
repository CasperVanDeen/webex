<?php
require_once('dbcon.php');
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	$name = filter_input(INPUT_POST, 'name') 
		or die('Missing/illegal name parameter');
	$surname = filter_input(INPUT_POST, 'name') 
		or die('Missing/illegal name parameter');
	$email = filter_input(INPUT_POST, 'name') 
		or die('Missing/illegal name parameter');
	$comment = filter_input(INPUT_POST, 'name') 
		or die('Missing/illegal name parameter');
         // define variables and set to empty values
         $name = $email = $surname = $comment = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            $surname = test_input($_POST["surname"]);
            $comment = test_input($_POST["comment"]);
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
	$sql = 'INSERT INTO contact (name, surname, email, comment ) VALUES (?,?,?,?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ssss', $name, $surname, $email, $comment);
	$stmt->execute();
if ($stmt->affected_rows >0){
		echo 'Thank you ['.$name.'] for contacting us :-)';
	}
	else {
		echo 'Ups we are so sorry ! ['.$name.'] but something went wrong.';
	}
}
      ?>