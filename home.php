<?php session_start(); if($_SESSION["username"] == null){echo "<script language='javascript'>window.location='login.php'</script>";} ?>

<html>
    <head>
        <title>Home</title>
    <style>
        h1{
                font-size: 30px;
                color: #fff;
                text-transform: uppercase;
                font-weight: 300;
                text-align: center;
                margin-bottom: 15px;
            }
        body {
            margin: 5%;
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
            font-family: 'Roboto', sans-serif;
        }

        .dropdown {
            color: black;
            box-sizing: content-box;
            width: 450px;
            height: 450px;
            padding: 20px;
        }

        button {
            border: none;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            background-color: #f2f2f2;
            border: 1px solid #f2f2f2;
            border-radius: 12px;
            font-style: italic;
            font-family: "Times New Roman";
            font-size: 30px;

        }

        button:hover {
            background-color: #ffffcc;
        }
    </style>
    </head>

    <body>
    <a href="home.php" style="margin-top:-200px;"><img src="homeLogo.png" width="10%" height="10%"></a>
        <center>
        <h1 style="font-size: 60px">WELCOME</h1>
        <div class="dropdown">
        
            <button onclick="document.location='employeeInformation.php'">Employee Information</a></button><br><br>
            <button onclick="document.location='workforceManagement.php'">Workforce Management</a></button><br><br>
            <button onclick="document.location='payroll.php'">Payroll</a></button><br><br>
            <button onclick="document.location='benefits.php'">Benefits</a></button><br><br>
            <button onclick="document.location='timeAttendance.php'">Time and Attendance</a></button>
            
            <br><br><br>
            <form method="post" action="insertAction.php?action=timeAttendance">
                        <?php
                            include_once("connect.php");
                            date_default_timezone_set("Asia/Kuala_Lumpur");
                            $date = date("Y-m-d");

                            $result = $mysqli->query("SELECT * FROM time_attendance WHERE date = '$date' AND employeeID ='".$_SESSION['employeeID']."' AND time = (SELECT MAX(time) FROM time_attendance WHERE date = '$date' AND employeeID ='".$_SESSION['employeeID']."')");
                           // echo "SELECT * FROM time_attendance WHERE date = '$date' AND employeeID ='".$_SESSION['employeeID']."' AND time = (SELECT MAX(time) FROM time_attendance)";
                            if(mysqli_num_rows($result) == 0){
                                echo "You had not yet sign in for today &nbsp;&nbsp;";
                                echo "<input type='submit' name='action' value='Sign In Attendance'>";
                            }else{
                                while($row = mysqli_fetch_array($result)){
                                    if($row['details'] == 'Sign In Attendance'){
                                        echo "Signed In at ".$row['time']."&nbsp;".$row['date']."&nbsp;";
                                        echo "<input type='submit' name='action' value='Sign Out Attendance'>";
                                    }else if($row['details'] == 'Sign Out Attendance'){
                                        echo "Signed Out at".$row['time'];
                                    }
                                }
                            }
                        ?>
                
                
            </form>
            <a href="logout.php">Sign Out</a>
            <!-- <button class="dropbtn">Payroll</button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            <button class="dropbtn">Time and Attendance</button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            <button class="dropbtn">Benefits</button>
                <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div> -->
            </div>
        </center>
    </body>
</html>