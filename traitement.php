<?php
	include("connexion.php");

	if (isset($_POST["submit"])) 
	{
			$news = $_POST["news"];
		
			$stmt = mysqli_prepare($con, "INSERT INTO mail VALUES(NULL, ?, CURRENT_TIMESTAMP)");
			mysqli_stmt_bind_param($stmt, "s", $news);
			$req = mysqli_stmt_execute($stmt);

			 if ($req) 
			 {
			 header("location:modal.html");
			 }
			 else{echo "error2.0";}

	}

?>