<?php 
session_start();
      if(!isset($_SESSION['sid'])){
      header("Location: student.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
</head>
<body>

<div>
	<form method="post">
		<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>

		
	
	<?php 

	include('db.php');
	
		$sid=$_SESSION['sid'];
		
			echo'<a href="search.php?sid='.$_SESSION['sid'].'">Upcoming events</a><br>
		    
			';

		 	 
	?>
	</form>
</div>

</body>
</html>