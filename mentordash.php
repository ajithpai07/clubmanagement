<?php 
session_start();
      if(!isset($_SESSION['mid'])){
      header("Location: mentor.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mentor Dashboard</title>
</head>
<body>
<div>
	<form method="post">
		<p style="float:right">
		<a href="logout.php">LOGOUT</a>
		</p>
		<?php 
		include('db.php');
		
		
			echo'<a href="addoffice.php?mid=' .$_SESSION['mid'].'">Select Office bearer</a>
		    
			';
		 	echo'<a href="approve.php?mid=' .$_SESSION['mid'].'">Approve events</a>
		    
			';
		 
		 ?>
		
	</form>
</div>
</body>
</html>