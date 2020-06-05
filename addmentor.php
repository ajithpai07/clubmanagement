<?php 
session_start();
      if(!isset($_SESSION['aid'])){
      header("Location: admin.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Mentor</title>
</head>
<body>
<div>
	<form method="post">
		<table border="1">
	<thead>
	    <tr>
		  <th>Club ID</th>
		  <th>Club Name</th>
		 
		  <th>Select</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include('db.php');
		
		$sql = mysqli_query($con,"SELECT * FROM `club`");

		while ($res = mysqli_fetch_array($sql)) 
		{
			echo'
			<tr>
			<td>'.$res['cid'].'</td>
			
			<td>'.$res['cname'].'</td>

			
			

		    <td><a href="select.php?cid=' .$res['cid'].'">Select</a></td>
		    
			</tr>
			';
		 	
		 }

		  ?>
	</tbody>
</table>
<a href="admindash.php">Go Back to Main Menu</a>
	</form>
</div>
</body>
</html>