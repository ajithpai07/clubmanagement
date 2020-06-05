<?php 
session_start();
      if(!isset($_SESSION['sid'])){
      header("Location: student.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Events</title>
</head>
<body>
<div>
	<form method="post">
		<label>Enter the department of event</label>
		<select name="department" required>
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="EEE">EEE</option>
  <option value="EIE">EIE</option>
  <option value="MEE">MEE</option>
  <option value="OTHER">OTHER</option>
</select><br>
<input type="submit" value="Search" name="search">


	</form>
</div>
<?php 
include('db.php');

if(isset($_POST['search']))
	 {
	 	$check=$_POST['department'];
		if ($check == "CSE") {
			$_SESSION['dno'] = 1;
		}
		elseif ($check == "ECE") {
			$_SESSION['dno']  = 2;
		}
		elseif ($check == "EEE") {
			$_SESSION['dno']  = 3;
		}
		elseif ($check == "EIE") {
			$_SESSION['dno']  = 4;
		}
		elseif ($check == "MEE") {
			$_SESSION['dno']  = 5;
		}
		elseif ($check == "OTHER") {
			$_SESSION['dno']  = 6;
		}
		
	 }
 ?>
<form>

  <hr>
       <table border="1">
  <thead>
      <tr>
      <th>Event ID</th>
      <th>Event Name</th>
      <th>Event Description</th>
      <th>Organiser</th>
      <th>Register</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
     
   
     $dno=$_SESSION['dno'] ;
    
    include('db.php');
    $one=1;
    $sql = mysqli_query($con,"SELECT * FROM `event` WHERE dno='$dno' AND approval='$one'");
    while ($res = mysqli_fetch_array($sql)) 
    {
      echo'
      <tr>
      <td>'.$res['eid'].'</td>
      
      <td>'.$res['ename'].'</td>

      <td>'.$res['edesp'].'</td>

      <td>'.$res['club'].'</td>
      
      

        <td><a href="reg.php?sid=' .$_SESSION['sid'].'&eid='.$res['eid'].'">Select</a></td>
        
      </tr>
      ';
      
     }

      ?>
  </tbody>
</table>
	</form>
</body>
</html>