<html>
    <head>
    <title>Edit Workforce Management</title>
        <style>
            body {
                margin: 12%;
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
                height: 290px;
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
        <h1>Edit Workforce Management</h1>
        <form method="post" action="updateAction.php?action=workforceManagement" class="white-box">
            Workforce Record ID:<input type="text" name="workforceRecordID" id="workforceRecordID" required><br><br><br>
            Workforce Details:<input type="text" name="workforceDetails" id="workforceDetails"required><br><br><br>
            Employee ID:<input type="text" name="employeeID" id="employeeID"required><br><br><br>
            Date:<input type="text" name="date" id="date" required><br><br><br>
            <input type="submit" name="action" id="action" value="Done" class="button">
        </form>
        </center>
    </body>    
</html>
<?php
include_once("connect.php");
$result = $mysqli->query("SELECT * FROM workforce_management WHERE workforceRecordID = '".$_GET['workforceRecordID']."' LIMIT 1");

if(mysqli_num_rows($result) == 0){
    echo "No Record";
}else{
    while($row = mysqli_fetch_array($result)){
        echo "<script>document.getElementById('workforceRecordID').value ='".$row['workforceRecordID']."'</script>";
        echo "<script>document.getElementById('workforceDetails').value ='".$row['workforceDetails']."'</script>";
        echo "<script>document.getElementById('employeeID').value ='".$row['employeeID']."'</script>";
        echo "<script>document.getElementById('date').value ='".$row['date']."'</script>";
    }
}
?>