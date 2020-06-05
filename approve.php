<?php 
session_start();
      if(!isset($_SESSION['mid'])){
      header("Location: mentor.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
	<form method="post">
		<table border="1">
	<thead>
	    <tr>
	      <th>Event ID</th>
		  <th>Event Name</th>
		  <th>Event Description</th>
		  <th>Event Date</th>
		   <th>Approve</th>
		 
		  
		</tr>
	</thead>
	<tbody>
		<?php 
		$mid=$_GET['mid'];
		include('db.php');
		$sql = mysqli_query($con,"SELECT * FROM `mentor` WHERE mid='$mid'");
		$res = mysqli_fetch_array($sql);
		$cid= $res['cid'];
		$zero=0;
		$sql1 = mysqli_query($con,"SELECT * FROM `event` WHERE cid='$cid' AND approval='$zero' ");
		
		while ($res1 = mysqli_fetch_array($sql1)) 
		{
			$_SESSION['eid']=$res1['eid'];
			echo'
			<tr>
			<td>'.$_SESSION['eid'].'</td>
			
			<td>'.$res1['ename'].'</td>

			<td>'.$res1['edesp'].'</td>

			<td>'.$res1['date'].'</td>

			 <td><a href="app.php?mid=' .$_SESSION['mid'].'&eid='.$_SESSION['eid'].'">Approve</a></td>
		    
			</tr>
			';
		 	
		 }

		  ?>
	</tbody>
</table>
	</form>
</div>

<a href="mentordash.php">Go Back To Dash Board</a>
</body>
</html>