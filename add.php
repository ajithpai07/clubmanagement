<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
</head>
<body>
	<?php 
	$sfid = $_GET['sfid'];
	include('db.php');
		session_start();
$result = mysqli_query($con,"SELECT cname from `club` where cid ='".$_SESSION['cid']."'");
$row = mysqli_fetch_array($result);
$cd = $row['cname'];
	$sql = mysqli_query($con,"SELECT * FROM `staff` WHERE sfid='$sfid'");
	$res = mysqli_fetch_array($sql);
	 ?>
	 <form method="post">
		 <label>Staff ID</label> 
		 <input type="number" name="sfid" readonly value="<?php echo $res['sfid'] ?>"><br>
   	     <label>Staff Name</label>  
   	     <input type="text" name="sfname" readonly value="<?php echo $res['sfname'] ?>"><br>
	     <label>Department ID</label>  
	     <input type="number" name="dno" readonly value="<?php echo $res['dno'] ?>"><br>
	     <label>Club name</label> 
	     <input type="text" name="cname" readonly value="<?php   echo "$cd" ?>"><br>
	      <label>Club ID</label> 
	     <input type="number" name="cid" readonly value="<?php echo $_SESSION['cid'] ?>"><br>
	     <input type="submit" name="add" value="Insert">

</body>
</html>
<?php 
include('db.php');
 if(isset($_POST['add']))
 {
 	
$sfid =$_POST['sfid'];
$cid = $_SESSION['cid'];
$mname =$_POST['sfname'];
$dno = $_POST['dno'];

$mpassword=m1m1m1;
$sql = "INSERT INTO `mentor`(`mname`,`mpassword`,`dno`,`cid`,`sfid`) VALUES ('$mname','$mpassword','$dno','$cid','$sfid')";
$result= mysqli_query($con,$sql);
session_destroy();

      echo "
      <script>
      alert('Selected');
      window.location='admindash.php';
      </script>
      ";
       
}
 ?>