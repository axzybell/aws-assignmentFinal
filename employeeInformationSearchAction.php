<?php
include_once("connect.php");
$result = $mysqli->query("SELECT * FROM employee");

if(mysqli_num_rows($result) == 0){
    echo "No Record";
}else{
    while($row = mysqli_fetch_array($result)){
        echo $row['name'];
    }
}

?>