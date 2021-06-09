<?php
include 'dbcon.php';

$program = $_POST["program"];
$branch = $_POST["branch"];
$semester = $_POST["semester"];
// echo $uname;
// $pass = $_POST["pass"];
$query = "insert into timetable (program, branch, semester , status, action) values ('$program', '$branch', '$semester', 'OK', 'active')";
 mysqli_query($conn,$query);

    header("location:timetable.php");

?>