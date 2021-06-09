
<?php 
include 'dbcon.php';
$id = $_GET['id'];
$query="delete from timetable where sr=$id";

mysqli_query($conn,$query);

header("location:timetable.php");
  
?>