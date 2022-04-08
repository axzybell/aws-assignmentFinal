<html>
    <head>
        <title>Employee Information</title>
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
        <h1>Employee Information</h1>
        <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th>Name</th>
                <th>ID</th>
                <th>Position</th>
                <th>IC</th>
                <th>Address</th>
                <th>Hire Date</th>
                <th>Payscale</th>
                <th></th>
            </tr>
        </table>
        </div>
        <?php
            include_once("connect.php");
            $result = $mysqli->query("SELECT * FROM employee");
            
            if(mysqli_num_rows($result) == 0){
                echo "<div class='tbl-content'>";
            echo "<table cellpadding='0' cellspacing='0' border='0'>";
                echo "<tr><td>No Record</td></tr>";
                
            }else{
                while($row = mysqli_fetch_array($result)){
                    echo "<div class='tbl-content'>";
            echo "<table cellpadding='0' cellspacing='0' border='0'>";
                    echo "<tr>";
                    echo "<td>";
                    echo $row['name'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['employeeID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['position'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['ic'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['address'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['hire_date'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['payscale'];
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='employeeInformationEdit.php?employeeID=".$row['employeeID']."'>Edit</a>";
                    echo "&nbsp";
                    echo "&nbsp";
                    echo "<a href='deleteAction.php?action=employeeInformation&employeeID=".$row['employeeID']."'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</div>";
                }
            }
        ?>
        </table>
        <br>
        <a href="employeeInformationNew.php">Add New</a>
        
        </center>
    </body>
</html>