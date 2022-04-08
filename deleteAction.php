<?php
    if(isset($_GET['action'])){
        switch ($_GET['action']){
            case 'employeeInformation':
                if($_GET['employeeID'] != "" && $_GET['employeeID'] != null)
                    {
                        $delete = "DELETE FROM employee WHERE employeeID = '".$_GET['employeeID'] ."'";
                        executeQuery($delete,"employeeInformation");
                    }
                else
                    {
				        echo "<script language='javascript'>console.log('error')</script>";
                    }
            break;

            case 'payroll':
                if($_GET['repayID'] != "" && $_GET['repayID'] != null)
                    {
                        $delete = "DELETE FROM payroll WHERE repayID = '".$_GET['repayID'] ."'";
                        executeQuery($delete,"payroll");
                    }
                else
                    {
                        echo "<script language='javascript'>console.log('error')</script>";
                    }
            break;

            case 'timeAttendance':
                if($_GET['recordID'] != "" && $_GET['recordID'] != null)
                    {
                        $delete = "DELETE FROM time_attendance WHERE recordID = '".$_GET['recordID'] ."'";
                        executeQuery($delete,"timeAttendance");
                    }
                else
                    {
                        echo "<script language='javascript'>console.log('error')</script>";
                    }
            break;

            case 'benefits':
                if($_GET['benefitsID'] != "" && $_GET['benefitsID'] != null)
                    {
                        $delete = "DELETE FROM benefits WHERE benefitsID = '".$_GET['benefitsID'] ."'";
                        executeQuery($delete,"benefits");
                    }
                else
                    {
                        echo "<script language='javascript'>console.log('error')</script>";
                    }
            break;

            case 'workforceManagement':
                if($_GET['workforceRecordID'] != "" && $_GET['workforceRecordID'] != null)
                    {
                        $delete = "DELETE FROM workforce_management WHERE workforceRecordID = '".$_GET['workforceRecordID'] ."'";
                        executeQuery($delete,"workforceManagement");
                    }
                else
                    {
                        echo "<script language='javascript'>console.log('error')</script>";
                    }
            break;
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