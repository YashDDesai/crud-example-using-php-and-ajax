<?php


	 include("db.php");
	 if(isset($_GET['id'])){
	 	$id = $_GET['id'];
	 	$sname = $_GET['sname'];
	 	$email = $_GET['email'];
	 	$query = "UPDATE studenr set sname='".$sname."', email='".$email."' where id=".$id;
	 	mysqli_query($con, $query);
	 }
	
?>