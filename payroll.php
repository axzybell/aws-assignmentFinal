<html>
    <head>
        <title>Payroll</title>
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
                margin: 10%;
                background: -webkit-linear-gradient(left, #25c481, #25b7c4);
                background: linear-gradient(to right, #25c481, #25b7c4);
                font-family: 'Roboto', sans-serif;
            }
            section{
                margin: 50px;
            }

            table{
                width:100%;
                table-layout: fixed;
            }
            .tbl-header{
                background-color: rgba(255,255,255,0.3);
            }
            .tbl-content{
                height:40px;
                margin-top: 0px;
                border: 1px solid rgba(255,255,255,0.3);
            }
            th{
                padding: 20px 15px;
                text-align: left;
                font-weight: 500;
                font-size: 12px;
                color: #fff;
                text-transform: uppercase;
            }
            td{
                padding: 15px;
                text-align: left;
                vertical-align:middle;
                font-weight: 300;
                font-size: 12px;
                color: #fff;
                border-bottom: solid 1px rgba(255,255,255,0.1);
            }
        </style>
        </head>

    <body>
    <a href="home.php" style="margin-top:-200px;"><img src="homeLogo.png" width="10%" height="10%"></a>
        <center>
        <h1>Payroll</h1>
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th class="tbl-header">Repay ID</th>
                <th class="tbl-header">Employee ID</th>
                <th class="tbl-header">Date</th>
                <th class="tbl-header">Basic Salary</th>
                <th class="tbl-header">Overtime Rate</th>
                <th class="tbl-header">Overtime Hour</th>
                <th class="tbl-header">EPF</th>
                <th class="tbl-header">Deduction</th>
                <th class="tbl-header">Total Amount Paid</th>
                <th class="tbl-header"></th>
            </tr>

        <?php
            include_once("connect.php");
            $result = $mysqli->query("SELECT * FROM payroll");

            if(mysqli_num_rows($result) == 0){
                echo "<tr><td>No Record</td></tr>";
            }else{
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td class='tbl-content'>";
                    echo $row['repayID'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['employeeID'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['date'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['basicSalary'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['overtimeRate'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['overtimeHour'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['epf'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['deduction'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo $row['totalAmountPaid'];
                    echo "</td>";
                    echo "<td class='tbl-content'>";
                    echo "<a href='payrollEdit.php?repayID=".$row['repayID']."'>Edit</a>";
                    echo "&nbsp";
                    echo "&nbsp";
                    echo "<a href='deleteAction.php?action=payroll&repayID=".$row['repayID']."'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        </div>
        <br><br>
        <a href="payrollNew.php">Add New</a>
        </center>
    </body>
</html>