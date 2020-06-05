<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Select Event</title>
</head>
<body>
	<div>
	<form method="post">
		<table border="1">
	<thead>
	    <tr>
	      <th>Event ID</th>
		  <th>Event Name</th>
		   <th>SELECT</th>
		 
		  
		</tr>
	</thead>
	<tbody>
		<?php 
		$obid=$_GET['obid'];
		include('db.php');
		$sql = mysqli_query($con,"SELECT * FROM `officebearer` WHERE obid='$obid'");
		$res = mysqli_fetch_array($sql);
		$cid= $res['cid'];
		$sql1 = mysqli_query($con,"SELECT * FROM `event` WHERE cid='$cid' ");
		
		while ($res1 = mysqli_fetch_array($sql1)) 
		{
			echo'
			<tr>
			<td>'.$res1['eid'].'</td>
			
			<td>'.$res1['ename'].'</td>

			<td><a href="view.php?eid=' .$res1['eid'].'">Select</a></td>
		    
			</tr>
			';
		 	
		 }

		  ?>
	</tbody>
</table>
	</form>
</div>

</body>
</html>