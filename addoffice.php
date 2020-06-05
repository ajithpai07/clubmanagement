<?php 
session_start();
      if(!isset($_SESSION['mid'])){
      header("Location: mentor.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
</head>
<body>
<div>
	<form method="post">
		<table border="1">
	<thead>
	    <tr>
		  <th>student ID</th>
		  <th>student Name</th>
		 
		  <th>Select</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		
		
		include('db.php');
		
		$sql = mysqli_query($con,"SELECT * FROM `student`");
		while ($res = mysqli_fetch_array($sql)) 
		{
			echo'
			<tr>
			<td>'.$res['sid'].'</td>
			
			<td>'.$res['sname'].'</td>

			
			

		    <td><a href="selectOB.php?sid=' .$res['sid'].'">Select</a></td>
		    
			</tr>
			';
		 	
		 }

		  ?>
	</tbody>
</table>
<a href="mentordash.php">Go Back To Dash Board</a>
	</form>
</div>
	
</body>
</html>