
<?php 
include 'dbcon.php';
$id = $_GET['id'];
$query="delete from notification where sr=$id";

mysqli_query($conn,$query);

header("location:notification.php");
  
?>