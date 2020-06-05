<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrations</title>
</head>
<body>
	<div>
	<form method="post">
		<table border="1">
	<thead>
	    <tr>
	      <th>SI no.</th>
		  <th>Student ID</th>
		  <th>Student Name</th>
		  <th>Department</th>		 
		  
		</tr>
	</thead>
	<tbody>
		<?php 
		
		$eid=$_GET['eid'];
		include('db.php');
		$sql1 = mysqli_query($con,"SELECT * FROM `register` WHERE eid='$eid' ");
		
		
		
		
		while ($res1 = mysqli_fetch_array($sql1)) 
		{ 
			$sid=$res1['sid'];
			$sql2 = mysqli_query($con,"SELECT * FROM `student` WHERE sid='$sid' ");
			$res2 = mysqli_fetch_array($sql2);
			$dno=$res2['dno'];
			$sql3 = mysqli_query($con,"SELECT * FROM `department` WHERE dno='$dno' ");
			$res3 = mysqli_fetch_array($sql3);
			$counter=1;

			echo'
			<tr>
			<td>' .$counter. '</td>
			<td>'.$res1['sid'].'</td>
			
			<td>'.$res2['sname'].'</td>

			<td>'.$res3['dname'].'</td>
 
			</tr>

			';
			$counter++;
		 	
		 }

		  ?>
	</tbody>
</table>
<a href="secdash.php">Go Back To Dash Board</a>
	</form>
</div>

</body>
</html>