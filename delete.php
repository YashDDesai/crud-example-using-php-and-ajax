<?php


	 include("db.php");
	 $id = $_GET['id'];
	 if(isset($_GET['id'])){
	 	$id = $_GET['id'];
	 	$query = "DELETE FROM studenr where id=".$id;
	 	mysqli_query($con, $query);
	 }
	
?>