<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Staff</title>
</head>
<body>
	<div>
		<form method="post">
			<label>Enter the name of Staff</label>
			<input type="text" name="name"><br>
			<label>Enter the department name</label>
			<select name="department" required>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="EIE">EIE</option>
  <option value="MEE">MEE</option>
  <option value="OTHER">OTHER</option>
</select><br>
<input type="submit" value="Add" name="add"><br>
<a href="admindash.php">Go Back to Main Menu</a>
		</form>
	</div>
<?php 
	 include('db.php');
	 if(isset($_POST['add']))
	 {
		$sfname=$_POST['name'];
		$sfpassword = s1s1s1;
		$club = 0;
		$check=$_POST['department'];
		if ($check == "CSE") {
			$dno = 1;
		}
		elseif ($check == "ECE") {
			$dno = 2;
		}
		elseif ($check == "EEE") {
			$dno = 3;
		}
		elseif ($check == "EIE") {
			$dno = 4;
		}
		elseif ($check == "MEE") {
			$dno = 5;
		}
		elseif ($check == "OTHER") {
			$dno = 6;
		}
		
       $sql="INSERT INTO staff(sfname,sfpassword,dno) VALUES ('$sfname','$sfpassword','$dno')";
        $result= mysqli_query($con,$sql);
       
          echo "
          <script>
          alert('Addition Successful');
          window.location='addstaff.php';
          </script>
          ";
       
	
		
	 }
    ?>
</body>
</html>