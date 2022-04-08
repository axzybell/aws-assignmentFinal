<html>
    <head><title>Add New Employee</title></head>
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
            height: 345px;
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
    <body>
        <center>
            <h1>Add New Employee</h1>
            <form method="post" action="insertAction.php?action=employeeInformation" enctype="multipart/form-data" class="white-box">
            
            ID:<input type="text" name="employeeID" required><br><br>
            Position:
                <select name="employeePosition" required>
                    <option value="ceo">CEO</option>
                    <option value="manager">Manager</option>
                    <option value="staff">Staff</option>
                </select><br><br>
            Name:<input type="text" name="employeeName" required><br><br>
            Identity No:<input type="text" name="employeeIC" required><br><br>
            Address:<input type="text" name="employeeAddress" required><br><br>
            Hire Date:<input type="date" name="employeeHireDate" required><br><br>
            Payscale:<input type="text" name="employeePayScale" required><br><br>
            Image:<input type="file" name="employeeImage" id="employeeImage"><br><br>
            <input type="submit" name="action" class="button"><br><br>
        </form>
    </center>
    </body>
</html>