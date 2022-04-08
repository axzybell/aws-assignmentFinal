<html>
    <head>
    <title>Edit Payroll</title>
        <style>
            body {
                margin: 10%;
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
                height: 400px;
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
        <h1>Edit Payroll</h1>
        <form method="post" action="updateAction.php?action=payroll" class="white-box">
            
            Repay ID:<input type="text" name="repayID" id="repayID" required><br><br>
            Employee ID:<input type="text" name="employeeID" id="employeeID" required><br><br>
            Date:<input type="date" name="date" required><br> <br>
            Basic Salary:<input type="text" name="basicSalary" id="basicSalary" required><br><br>
            Overtime Rate Per Hour:<input type="text" name="overtimeRate" id="overtimeRate" required><br><br>
            Overtime Hour:<input type="text" name="overtimeHour" id="overtimeHour" required><br><br>
            EPF:<input type="text" name="epf" id="epf" required><br><br>
            Deduction:<input type="text" name="deduction" id="deduction" required><br><br>
            Total Amount to Pay:<input type="text" name="totalAmount" id="totalAmount" required><br><br>
            <input type="submit" name="action" class="button"><br>

        </form>
        </center>
    </body>
</html>

<?php
include_once("connect.php");
$result = $mysqli->query("SELECT * FROM payroll WHERE repayID = '".$_GET['repayID']."' LIMIT 1");

if(mysqli_num_rows($result) == 0){
    echo "No Record";
}else{
    while($row = mysqli_fetch_array($result)){
        echo "<script>document.getElementById('repayID').value ='".$row['repayID']."'</script>";
        echo "<script>document.getElementById('employeeID').value ='".$row['employeeID']."'</script>";
        echo "<script>document.getElementById('date').value ='".$row['date']."'</script>";
        echo "<script>document.getElementById('basicSalary').value ='".$row['basicSalary']."'</script>";
        echo "<script>document.getElementById('overtimeRate').value ='".$row['overtimeRate']."'</script>";
        echo "<script>document.getElementById('overtimeHour').value ='".$row['overtimeHour']."'</script>";
        echo "<script>document.getElementById('epf').value ='".$row['epf']."'</script>";
        echo "<script>document.getElementById('deduction').value ='".$row['deduction']."'</script>";
        echo "<script>document.getElementById('totalAmount').value ='".$row['totalAmountPaid']."'</script>";
    }
}
?>