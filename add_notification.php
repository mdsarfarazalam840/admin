<?php
include 'dbcon.php';

$notification = $_POST["notification"];
$context = $_POST["context"];

// echo $uname;
// $pass = $_POST["pass"];
$query = "insert into notification (notification , context , status, action) values ('$notification', '$context' , 'OK', 'active')";
// echo $query;
// die();
mysqli_query($conn,$query);

    header("location:notification.php");

?>