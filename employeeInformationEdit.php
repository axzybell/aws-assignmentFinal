<html>
    <head>
        <title>Edit Employee Information</title>
        <style>
            body {
                margin: 5%;
                background: -webkit-linear-gradient(left, #25c481, #25b7c4);
                background: linear-gradient(to right, #25c481, #25b7c4);
                font-family: 'Roboto', sans-serif;
            }

            h1{
                font-size: 30px;
                color: #fff;
                text-transform: uppercase;
                font-weight: 300;
                text-align: center;
                margin-bottom: 15px;
            }

            .white-box {
                background-color: white;
                color: black;
                box-sizing: content-box;  
                width: 450px;
                height: 620px;
                padding: 30px;
                box-shadow: 10px 10px 18px #888888;
            }

            .img{
                height: 200px;
                width: 200px;
            }
            .button {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #4CAF50;
                width: 76%;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
                border-radius: 12px;
            }
            .button:hover,.form button:active,.form button:focus {
                background: #43A047;
            }
        </style>
    </head>

    <body>
    <center>
    <h1>Edit Employee Information</h1>
        <form method="post" action="updateAction.php?action=employeeInformation" enctype="multipart/form-data" class="white-box">
            ID: <input type="text" name="employeeID" id="employeeID" readonly><br/><br/>
            Position: <select name="employeePosition" required>
                    <option value="ceo">CEO</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                    </select><br><br>
            Name: <input type="text" name="employeeName" id="employeeName"><br/><br/>
            Identity No: <input type="text" name="employeeIC" id="employeeIC"><br/><br/>
            Address: <input type="text" name="employeeAddress" id="employeeAddress"><br/><br/>
            Hire Date: <input type="date" name="employeeHireDate" id="employeeHireDate" readonly><br/><br/>
            Payscale: <input type="text" name="employeePayScale" id="employeePayScale"><br/><br/>
            Image: <input type="file" name="employeeImage" id="employeeImage" required><br><br>
            Original:<div id="oriImgPath"></div><br>
            <img id="oriImg" class="img"><br><br>
            <input type="submit" name="action" id="action" value="Submit" class="button">
        </form>
    </center>
    </body>    
</html>
<?php
include_once("connect.php");
$result = $mysqli->query("SELECT * FROM employee WHERE employeeID = '".$_GET['employeeID']."' LIMIT 1");

if(mysqli_num_rows($result) == 0){
    echo "No Record";
}else{
    while($row = mysqli_fetch_array($result)){
        echo "<script>document.getElementById('employeeID').value ='".$row['employeeID']."'</script>";
        echo "<script>document.getElementById('employeePosition').value ='".$row['position']."'</script>";
        echo "<script>document.getElementById('employeeName').value ='".$row['name']."'</script>";
        echo "<script>document.getElementById('employeeIC').value ='".$row['ic']."'</script>";
        echo "<script>document.getElementById('employeeAddress').value ='".$row['address']."'</script>";
        echo "<script>document.getElementById('employeeHireDate').value ='".$row['hire_date']."'</script>";
        echo "<script>document.getElementById('employeePayScale').value ='".$row['payscale']."'</script>";
        echo "<script>document.getElementById('oriImgPath').innerHTML ='".$row['image']."'</script>";
        echo "<script>document.getElementById('oriImg').src ='".$row['image']."'</script>";
    }
}
?>