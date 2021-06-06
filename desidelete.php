
<?php 
include 'dbcon.php';
$id = $_GET['id'];
$query="delete from designation where sr=$id";

mysqli_query($conn,$query);

header("location:designation.php");
  
?>