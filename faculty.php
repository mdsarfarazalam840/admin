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
  top:30%;
  left:50%;
  transform:translate(-50%,-50%) scale(0);
  background:#fff;
  width:700px;
  height:350px;
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

</style>
</head>
<body>
<form name='addfaculty' action='add_faculty.php' method='post'>
	<div class="popup" id="popup-1">
  <div class="overlay"></div>
  <div class="content">
    <div class="close-btn" onclick="togglePopup()">&times;</div>
    <h1>Add New Program</h1>
    <div class="data">
    <table align="center" cellpadding = "50">
 
 <!----- Employee Name ---------------------------------------------------------->
 <tr>
 <td>Employee Name</td>
 <td><input type="text" name="name" maxlength="30" required/>
 (max 30 characters a-z and A-Z)
 </td>
 </tr>
  
 <!----- Employement ID ---------------------------------------------------------->
 <tr>
 <td>Employement ID</td>
 <td><input type="text" name="empid" maxlength="30" required/>
 </td>
 </tr>
  
 <!----- Date Of Birth -------------------------------------------------------->
 <tr>
 <td>Date of Birth</td>
 <td><input type="date" name="dob" required></td>
  
 <!----- Email Id ---------------------------------------------------------->
 <tr>
 <td>Email Id</td>
 <td><input type="text" name="email" maxlength="100" required/></td>
 </tr>
  
 <!----- Mobile Number ---------------------------------------------------------->
 <tr>
 <td>Mobile Number</td>
 <td>
 <input type="text" name="phone" maxlength="10" required/>
 (10 digit number)
 </td>
 </tr>
  
 <!----- Gender ----------------------------------------------------------->
 <tr>
 <td>Gender</td>
 <td>
 Male <input type="radio" name="gender" value="Male" />
 Female <input type="radio" name="gender" value="Female" />
 Other <input type="radio" name="gender" value="Other" />
 </td>
 </tr>
  
 
  
 <!----- Designation ---------------------------------------------------------->
 <tr>
      <td>Designation</td>
      <td><select name="designation" id="">
      <?php 
        $query="select * from designation";

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
  
 <!----- Subject Teaching ---------------------------------------------------------->
 <tr>
      <td>Subject Teaching</td>
      <td><select name="subject" id="">
      <?php 
        $query="select * from subject";

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
  
 <!----- Password ---------------------------------------------------------->
 <tr>
 <td>Password</td>
 <td><input type="password" name="pass" maxlength="30" required/>
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
    
  </div>
</div>
</form>

<button class="button button1" onclick="togglePopup()" style="width: 180px">+ Add New</button>

<script>
	function togglePopup(){
  document.getElementById("popup-1").classList.toggle("active");
}
</script>

<h1 style="margin-left:200px; margin-top:20px;" >FACULTY REGISTRATION</h1>

<table border="7" cellpadding="15" style="width:70%" class="center">
	<tr>
		<th>Sr.No</th>
		<th>Employee Name</th>
		<th>Employement ID</th>
    <th>Password</th>
		<th>EmailId</th>
    <th>Phone No.</th>
    <th>Designation</th>
    <th>Subject Teaching</th>
    <th>Gender</th>
    <th>DOB</th>
    <th>Action</th>
	</tr>

<?php 
$query="select * from faculty_registration";

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
    <td style="text-align: center;"><?php echo $row[5];?></td>
    <td style="text-align: center;"><?php echo $row[6];?></td>
    <td style="text-align: center;"><?php echo $row[7];?></td>
    <td style="text-align: center;"><?php echo $row[8];?></td>
    <td style="text-align: center;"><?php echo $row[9];?></td>
    <td style="text-align: center;"><a href="facultydelete.php?id='<?php echo $row[0];?>'"><i class="fa fa-trash"></i></a>/Edit</td>
		
	</tr>

    <?php
    $count= $count+1;
  }
  
}
?>

	

	
</table>

</body>
</html>