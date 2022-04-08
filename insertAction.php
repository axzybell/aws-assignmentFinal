<?php
session_start();
include_once("connect.php");
if(isset($_POST["action"])){
    switch($_GET['action'])
    {
        case "employeeInformation":
			if($_POST["employeeID"] != "" && $_POST["employeePosition"] != "" && $_POST["employeeName"] != ""  && $_POST["employeeIC"] != "" && $_POST["employeeAddress"] != "" && $_POST["employeeHireDate"] != "" && $_POST["employeePayScale"] != "")
				{
						$file_name = $_FILES['employeeImage']['name'];
						$file_type = $_FILES['employeeImage']['type'];
						$file_size = $_FILES['employeeImage']['size'];
						$file_tem_loc = $_FILES['employeeImage']['tmp_name'];

						
						$file_store = "img/".$file_name;
						$file_sql = "img/".$file_name;

						move_uploaded_file($file_tem_loc, $file_store);

					$insert = "INSERT INTO employee (employeeID, position, name, ic, address, hire_date, payscale, image) VALUES ('".$_POST["employeeID"]."','".$_POST["employeePosition"]."','".$_POST["employeeName"]."','".$_POST["employeeIC"]."','".$_POST["employeeAddress"]."','".$_POST["employeeHireDate"]."','".$_POST["employeePayScale"]."','".$file_sql."')";
					executeQuery($insert,"employeeInformation");
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
		break;

		case "payroll":
			if($_POST["repayID"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "" && $_POST["basicSalary"] != "" && $_POST["overtimeRate"] != "" && $_POST["overtimeHour"] && $_POST["epf"] != "" && $_POST["deduction"] != "" && $_POST["totalAmount"] != "")
				{
					$insert = "INSERT INTO payroll (repayID, employeeID, date, basicSalary, overtimeRate, overtimeHour, epf, deduction, totalAmountPaid) VALUES ('".$_POST["repayID"]."','".$_POST["employeeID"]."','".$_POST["date"]."','".$_POST["basicSalary"]."','".$_POST["overtimeRate"]."','".$_POST["overtimeHour"]."','".$_POST["epf"]."','".$_POST["deduction"]."','".$_POST["totalAmount"]."')";
					executeQuery($insert,"payroll");
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
		break;

		case "benefits":
			if($_POST["benefitsID"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "" && $_POST["details"] != "")
				{
					$insert = "INSERT INTO benefits (benefitsID, employeeID, date, details) VALUES ('".$_POST["benefitsID"]."','".$_POST["employeeID"]."','".$_POST["date"]."','".$_POST["details"]."')";
					executeQuery($insert,"benefits");
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
		break;

		case "workforceManagement":
			if($_POST["workforceRecordID"] != "" && $_POST["workforceDetails"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "")
				{
					$insert = "INSERT INTO workforce_management (workforceRecordID, workforceDetails, employeeID, date) VALUES ('".$_POST["workforceRecordID"]."','".$_POST["workforceDetails"]."','".$_POST["employeeID"]."','".$_POST["date"]."')";
					executeQuery($insert,"workforceManagement");
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
		break;

		case "timeAttendance":
				date_default_timezone_set("Asia/Kuala_Lumpur");
				$date = date("Y-m-d");
				$time = date("H:i:s");
				$recordID = "";
				$details = $_POST['action'];
				
				do{
				$a = uniqid();
				$result = $mysqli->query("SELECT * FROM time_attendance WHERE recordID = '$a'");
				}while(mysqli_num_rows($result) != 0);

				$recordID = $a;

				if($recordID != "" && $_SESSION['employeeID'] != "" && $date != "" && $time != "" && $details != "")
					{
						$insert = "INSERT INTO time_attendance (recordID, employeeID, date, time, details) VALUES ('".$recordID."','".$_SESSION['employeeID']."','".$date."','".$time."','".$details."')";
						echo "<script language='javascript'>alert('".$details." Successfully!')</script>";
						executeQuery($insert,"home");
					}
				else
					{
						echo $_SESSION['employeeID'];
						echo $recordID;
						echo "<script language='javascript'>console.log('error')</script>";
					}
					
    }
}

function executeQuery($getQuery, $redirect)
{
	$mysqli = mysqli_connect("aws-assignment.cfg0bodzn4uw.us-east-1.rds.amazonaws.com", "root", "leefuquan123","aws_assignment");
	$result = $mysqli->query($getQuery);
	
	if($result)
	{
		mysqli_close($mysqli);
		// foreach($_POST as $key => $value)
		// {
		// 	$_SESSION[$key] = "";
		// }
		//echo "<script language='javascript'>document.getElementById('message').innerHTML = 'Success';</script>";
		//header("Refresh: 1; url='".$redirect.".php'"); 
		echo "<script language='javascript'>alert('Success!!!')</script>";
		echo "<script language='javascript'>window.location='".$redirect.".php'</script>";
	}
	else
	{
		mysqli_connect_errno();
		echo "<script language='javascript'>console.log('error123')</script>";
		// incomplete($redirectError);
		 
		// echo "<script language='javascript'>alert('Insert failed. test".$getQuery."')</script>";
		// echo "<script language='javascript'>window.location='".$redirect.".php'</script>"; 
	}
}
?>