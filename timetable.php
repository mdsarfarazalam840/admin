<?php
include './header.php';
include './footer.php';
include './sidemenu.php';
include 'dbcon.php';
?>
<!DOCTYPE html>
<html>
<head>
<!--link-->
<link rel="stylesheet" href="css/all.min.css">
<!-- Table-->
	<style type="text/css">
	 table.center {
  margin-left: auto; 
  margin-right: auto;
  margin-top: 160px
}
	</style>

<!-- Popup window-->
	<style>	

.popup .overlay {
  position:fixed;
  top:0px;
  left:0px;
  width:100vw;
  height:100vh;
  background:rgba(0,0,0,0.7);
  z-index:1;
  display:none;
}
 
.popup .content {
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:270px;
  height:200px;
  z-index:2;
  text-align:center;
  padding:20px;
  box-sizing:border-box;
  font-family:"Open Sans",sans-serif;
}
 
.popup .close-btn {
  cursor:pointer;
  position:absolute;
  right:20px;
  top:20px;
  width:30px;
  height:30px;
  background:#222;
  color:#fff;
  font-size:25px;
  font-weight:600;
  line-height:30px;
  text-align:center;
  border-radius:50%;
}
 
.popup.active .overlay {
  display:block;
}
 
.popup.active .content {
  transition:all 300ms ease-in-out;
  transform:translate(-50%,-50%) scale(1);
  
}
	</style>

<!-- Button-->	
	<style>
.button {
  border: 2;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: blink;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  position:absolute;
     top:0;
     right:0;
    margin: 200px 12px 75px 300px;
}
.button1 {background-color: #4CAF50;} /* Green */
</style>

<!-- Button2-->
<style>
.button2 {
  border: 1;
  color: white;
  padding: 5px 3px;
  text-align: center;
  text-decoration: blink;
  display: inline-block;
  font-size: 18px;
  cursor: pointer;
    margin: 150px 190px 140px 150px;

}
.button2 {background-color: #4CAF50;} /* Green */
</style>
</head>
<body>
<form name='addtimetable' action='add_timetable.php' method='post'>
	<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <h1>Time Table</h1>
    <div class="data">

    <table align="center" cellpadding = "1000">
    <!----- Program ---------------------------------------------------------->

    <tr>
      <td>Program</td>
      <td><select name="program" id="">
      <?php 
        $query="select * from program";

        if ($result = mysqli_query($conn, $query)) {
          
          while ($row = mysqli_fetch_row($result)) {
            
            ?>
            <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
       

            <?php
            
          }
          
        }
        ?>
      </select>
      </td>
      </tr>

    <!----- Branch ---------------------------------------------------------->

    <tr>
      <td>Branch</td>
      <td><select name="branch" id="">
      <?php 
        $query="select * from branch";

        if ($result = mysqli_query($conn, $query)) {
          
          while ($row = mysqli_fetch_row($result)) {
            
            ?>
            <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
       

            <?php
            
          }
          
        }
        ?>
      </select>
      </td>
      </tr>


    <!----- Semester ---------------------------------------------------------->

    <tr>
      <td>Semester</td>
      <td><select name="semester" id="">
      <?php 
        $query="select * from semester";

        if ($result = mysqli_query($conn, $query)) {
          
          while ($row = mysqli_fetch_row($result)) {
            
            ?>
            <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
       

            <?php
            
          }
          
        }
        ?>
      </select>
      </td>
      </tr>

     <!----- Submit and Reset ------------------------------------------------->
    <tr>
    <td colspan="2" align="center">
    <input type="submit" value="Save">
    <input type="reset" value="Reset">
    </td>
    </tr>

    </table>

    </div>
    <div>

    </div>
  </div>
</div>
</form>

<button class="button button1" onclick="togglePopup()" style="width: 180px">+ Add New</button>

<script>
	function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>

<h1 style="margin-left:200px; margin-top:20px;" >TIME TABLE</h1>


<table border="7" cellpadding="15" style="width:70%" class="center">
	<tr>
		<th>Sr.No</th>
		<th>Program</th>
		<th>Branch</th>
		<th>Semester</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
  <?php 
$query="select * from timetable";

if ($result = mysqli_query($conn, $query)) {
  $count=1;
  while ($row = mysqli_fetch_row($result)) {
    
    ?>
<tr>
		<td style="text-align: center;"><?php echo $count;?></td>
		<td style="text-align: center;"><?php echo $row[1];?></td>
		<td style="text-align: center;"><?php echo $row[2];?></td>
		<td style="text-align: center;"><?php echo $row[3];?></td>
		<td style="text-align: center;"><?php echo $row[4];?></td>
		<td style="text-align: center;"><a href="time_delete.php?id='<?php echo $row[0];?>'"><i class="fa fa-trash"></i></a>/Edit</td>
	</tr>
  <?php
    $count= $count+1;
  }
  
}
?>


	

	
</table>

</body>
</html>