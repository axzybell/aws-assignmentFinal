<?php
session_start();

include("connect.php");

if(isset($_POST["login"]))
{
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if($username != "" && $password != "")
	{
		$result = $mysqli->query("SELECT * FROM user WHERE username = '$username' and password = MD5('$password') LIMIT 1"); 
		if(mysqli_num_rows($result) == 1)
		{
			$row = mysqli_fetch_assoc($result);
			$_SESSION["name"] = $row["name"];
			$_SESSION["employeeID"] = $row["employeeID"];
			$_SESSION["position"] = $row["position"];
			$_SESSION["username"] = "username";
			echo "<script language='javascript'>window.location='home.php'</script>"; 
		}
		else
		{
            //echo "<script language='javascript'>console.log('error')</script>"; 
			echo "<script language='javascript'>alert('Incorrect Username or Password')</script>"; 
			echo "<script>window.location='login.php'</script>";
			// echo "<script language='javascript'>document.getElementById('message').innerHTML = 'Please Check Your Username and Password.';</script>";
			//header("Refresh: 1; url='login.php'"); 
            // echo "<script language='javascript'>setTimeout(function(){window.location='login.php'},1000)</script>";
		}
	}
	else
	{
        //echo "<script language='javascript'>console.log('error')</script>"; 
		echo "<script language='javascript'>alert('Error!!!')</script>"; 
		// echo "<script language='javascript'>document.getElementById('message').innerHTML = 'Please Check Your Username and Password.';</script>";
		// header("Refresh: 1; url='login.php'");
        // echo "<script language='javascript'>setTimeout(function(){window.location='login.php'},1000)</script>";
	}
}
?>