<html>
    <head>
        <title>Add New Benefits</title>
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
                height: 320px;
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
            <h1>Edit The Benefits</h1>
        <form method="post" action="updateAction.php?action=benefits" class="white-box">
            Benefits ID: <input type="text" name="benefitsID" id="benefitsID" readonly><br/><br/><br/>
            Employee ID: <input type="text" name="employeeID" id="employeeID"><br/><br/><br/>
            Date: <input type="text" name="date" id="date"><br/><br/><br/>
            Details: <input type="text" name="details" id="details"><br/><br/><br/><br/>
            <input type="submit" name="action" id="action" value="Submit" class="button">
        </form>
        </center>
    </body>    
</html>
<?php
include_once("connect.php");
$result = $mysqli->query("SELECT * FROM benefits WHERE benefitsID = '".$_GET['benefitsID']."' LIMIT 1");

if(mysqli_num_rows($result) == 0){
    echo "No Record";
}else{
    while($row = mysqli_fetch_array($result)){
        echo "<script>document.getElementById('benefitsID').value ='".$row['benefitsID']."'</script>";
        echo "<script>document.getElementById('employeeID').value ='".$row['employeeID']."'</script>";
        echo "<script>document.getElementById('date').value ='".$row['date']."'</script>";
        echo "<script>document.getElementById('details').value ='".$row['details']."'</script>";
    }
}
?>