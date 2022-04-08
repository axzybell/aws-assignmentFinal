<html>
    <head>
        <title>Add New Workforce Management</title>
        <style>
        body {
            margin: 12%;
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #25c481, #25b7c4);
            font-family: 'Roboto', sans-serif;
        }

        h1 {
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
            height: 325px;
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
        <h1>Add New Workforce Management</h1>
        <form method="post" action="insertAction.php?action=workforceManagement" class="white-box">          
            Workforce Record ID:<input type="text" name="workforceRecordID" required><br><br><br>
            Workforce Details:<input type="text" name="workforceDetails" required><br><br><br>
            Employee ID:<select name="employeeID" required>
                        <?php
                            include_once("connect.php");
                            $result = $mysqli->query("SELECT * FROM employee");
                            if(mysqli_num_rows($result) == 0){
                                echo "<option value=''>No Record</option>";
                            }else{
                                while($row = mysqli_fetch_array($result)){
                                    echo "<option value=".$row['employeeID'].">".$row['employeeID']."&nbsp;".$row['name']."</option>";
                                }
                            }
                        ?>
                        </select><br><br><br>
            Date:<input type="date" name="date" required><br><br> <br>
            <input type="submit" name="action" class="button"><br><br><br>
        </form>
        </center>
    </body>
</html>