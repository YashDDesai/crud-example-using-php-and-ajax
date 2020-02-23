<?php

	if(isset($_POST["sname"]))
	{
	 include("db.php");
	 $sname = mysqli_real_escape_string($con, $_POST["sname"]);
	 $email = mysqli_real_escape_string($con, $_POST["email"]);
	 $query = "INSERT INTO studenr(sname, email) VALUES ('$sname', '$email')";
	 mysqli_query($con, $query);
	}
?>