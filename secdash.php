<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Office Bearer Dashboard</title>
</head>
<body>
<div>
	<form method="post">

	<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>
	
	<?php 
	include('db.php');
	
		$bid=$_SESSION['obid'];
		
			echo'<a href="hallbooking.php?obid='.$_SESSION['obid'].'">Book hall for your event</a><br>
		    
			';

		 	 echo'<a href="event.php?obid='.$_SESSION['obid'].'">Add new event</a><br>
		    
			';
			echo'<a href="close.php?obid='.$_SESSION['obid'].'">close Registerations </a><br>
		    
			';
			echo'<a href="viewevent.php?obid='.$_SESSION['obid'].'">View Registerations</a>
		    
			';
	?>
	</form>
</div>

</body>
</html>