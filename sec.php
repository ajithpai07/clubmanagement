<!DOCTYPE html>
<html>
<head>
	<title>Office Bearer Login</title>
</head>
<body>
	<div>
<form method="post">
<label>Username</label>
<input type="number" name="obid" required><br>
<label>Password</label>
<input type="password" name="Password" required><br>
<input type="submit" value="login" name="login">
<a href="home.php">Back to Select Login Page</a>
</form></div>

<?php 
	 include('db.php');

   session_start();
	 if(isset($_POST['login']))
	 {
		$username=$_POST['obid'];
		$password=$_POST['Password'];

        $sql="SELECT * FROM `officebearer` WHERE obid='$username' AND obpassword='$password'";
        $result= mysqli_query($con,$sql);
        $check= mysqli_fetch_array($result);
        if (isset($check)) 
        {
           $_SESSION['obid']= $username;
           
          echo "
          <script>
          alert('Login Successful');
          window.location= 'secdash.php';
          </script>
          ";
        }
        else
        {
           echo "
          <script>
          alert('Login Unsuccessful');
          window.location='sec.php';
          </script>
          ";
        }
	
		
	 }
    ?>
</body>
</html>