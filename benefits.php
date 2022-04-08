<html>
    <head>
        <title>Benefits</title>
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
        <h1>Benefits</h1>
        <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <th>Benefits ID</th>
                <th>Employee ID</th>
                <th>Date</th>
                <th>Details</th>
                <th></th>
            </tr>
        </table>
        </div>
        <?php
            include_once("connect.php");
            $result = $mysqli->query("SELECT * FROM benefits");
            echo "<div class='tbl-content'>";
            echo "<table cellpadding='0' cellspacing='0' border='0'>";
            if(mysqli_num_rows($result) == 0){
                echo "<td>No Record</tr>";
            }else{
                while($row = mysqli_fetch_array($result)){

                    echo "<tr>";
                    echo "<td>";
                    echo $row['benefitsID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['employeeID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['date'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['details'];
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='benefitsEdit.php?benefitsID=".$row['benefitsID']."'>Edit</a>";
                    echo "&nbsp";
                    echo "&nbsp";
                    echo "<a href='deleteAction.php?action=benefits&benefitsID=".$row['benefitsID']."'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
    </div>
        <br><br>
        <a href="benefitsNew.php">Add New</a>
        </center>
    </body>
</html>