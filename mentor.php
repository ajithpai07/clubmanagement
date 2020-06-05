<!DOCTYPE html>
<html>
<head>
	<title>Mentor Login</title>
</head>
<body>
	<div>
<form method="post">
<label>Username</label>
<input type="number" name="mid" required><br>
<label>Password</label>
<input type="password" name="Password" required><br>
<input type="submit" value="login" name="login">
<a href="home.php">Back to Select Login Page</a>
</form></div>

<?php 
	 include('db.php');
	 if(isset($_POST['login']))
	 {

	 	session_start();
		$username=$_POST['mid'];
		$password=$_POST['Password'];
		
        $sql="SELECT * FROM `mentor` WHERE mid='$username' AND mpassword='$password'";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        if (isset($check)) 
        {
        	$_SESSION['mid']=$username;
          echo "
          <script>
          alert('Login Successful');
          window.location='mentordash.php';
          </script>
          ";
        }
        else
        {
           echo "
          <script>
          alert('Login Unsuccessful');
          window.location='mentor.php';
          </script>
          ";
        }
	
		
	 }
    ?>
</body>
</html>