<?php
session_start();

if(isset($_SESSION["username"]))
{
    unset($_SESSION["name"]);
    unset($_SESSION["employeeID"]);
    unset($_SESSION["position"]);
    unset($_SESSION["username"]);
}
echo "<script>window.location='login.php'</script>";
?>