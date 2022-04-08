<?php
if(isset($_POST["action"])){
    switch($_GET['action'])
    {
        case "employeeInformation":
			if($_POST["employeeID"] != "" && $_POST["employeePosition"] != "" && $_POST["employeeName"] != ""  && $_POST["employeeIC"] != "" && $_POST["employeeAddress"] != "" && $_POST["employeeHireDate"] != "" && $_POST["employeePayScale"] != "" && $_FILES['employeeImage']['name'] != "")
				{
					$file_name = $_FILES['employeeImage']['name'];
					$file_type = $_FILES['employeeImage']['type'];
					$file_size = $_FILES['employeeImage']['size'];
					$file_tem_loc = $_FILES['employeeImage']['tmp_name'];

					$file_store = "img/".$file_name;
					$file_sql = "img/".$file_name;

					move_uploaded_file($file_tem_loc, $file_store);

					$update = "UPDATE employee SET position='".$_POST["employeePosition"]."', name='".$_POST["employeeName"]."', ic='".$_POST["employeeIC"]."' , address='".$_POST["employeeAddress"]."', hire_date='".$_POST["employeeHireDate"]."', payscale='".$_POST["employeePayScale"]."', image='".$file_sql."' WHERE employeeID='".$_POST["employeeID"]."'";

					executeQuery($update,"employeeInformation", $_POST["employeeID"]);
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
			break;

		case "payroll":
			if($_POST["repayID"] != "" && $_POST["employeeID"] != "" && $_POST["basicSalary"] != "" && $_POST["overtimeRate"] != "" && $_POST["overtimeHour"] && $_POST["epf"] != "" && $_POST["deduction"] != "" && $_POST["totalAmount"] != "")
				{
					$update = "UPDATE payroll SET repayID ='".$_POST["repayID"]."', employeeID ='".$_POST["employeeID"]."', basicSalary ='".$_POST["basicSalary"]."', overtimeRate ='".$_POST["overtimeRate"]."', overtimeHour ='".$_POST["overtimeHour"]."', epf = '".$_POST["epf"]."', deduction = '".$_POST["deduction"]."', totalAmountPaid = '".$_POST["totalAmount"]."'";
					executeQuery($update,"payroll", $_POST["repayID"]);
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
			break;
		
		case "timeAttendance":
			if($_POST["recordID"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "" && $_POST["time"] != "" && $_POST["details"] != "")
				{
					$update = "UPDATE time_attendance SET recordID ='".$_POST["recordID"]."', employeeID ='".$_POST["employeeID"]."', date ='".$_POST["date"]."', details ='".$_POST["details"]."'";
					executeQuery($update,"time_attendance", $_POST["recordID"]);
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
			break;
		
		case "benefits":
			if($_POST["benefitsID"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "" && $_POST["details"] != "")
				{
					$update = "UPDATE benefits SET benefitsID ='".$_POST["benefitsID"]."', employeeID ='".$_POST["employeeID"]."', date ='".$_POST["date"]."', details ='".$_POST["details"]."'";
					executeQuery($update,"benefits", $_POST["benefitsID"]);
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
			break;

		case "workforceManagement":
			if($_POST["workforceRecordID"] != "" && $_POST["workforceDetails"] != "" && $_POST["employeeID"] != "" && $_POST["date"] != "")
				{
					$update = "UPDATE workforce_management SET workforceRecordID ='".$_POST["workforceRecordID"]."', workforceDetails ='".$_POST["workforceDetails"]."', employeeID ='".$_POST["employeeID"]."', date ='".$_POST["date"]."'";
					executeQuery($update,"workforceManagement", $_POST["workforceRecordID"]);
				}
			else
				{
					echo "<script language='javascript'>console.log('error')</script>";
				}
			break;
    }
}

function executeQuery($getQuery, $redirect, $employeeId)
{
	$mysqli = mysqli_connect("aws-assignment.cfg0bodzn4uw.us-east-1.rds.amazonaws.com", "root", "leefuquan123","aws_assignment");
	$result = $mysqli->query($getQuery);
	
    // if($employeeId != null){
    //     $redirectId = "?employeeID=".$employeeId;
    // }
    
	if($result)
	{
		mysqli_close($mysqli);
		// foreach($_POST as $key => $value)
		// {
		// 	$_SESSION[$key] = "";
		// }
		//echo "<script language='javascript'>document.getElementById('message').innerHTML = 'Success';</script>";
		//header("Refresh: 1; url='".$redirect.".php'"); 
		// echo "<script language='javascript'>window.location='".$redirect.".php".$redirectId."'</script>";
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