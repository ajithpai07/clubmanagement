<?php 
session_start();
      if(!isset($_SESSION['mid'])){
      header("Location: mentor.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirm</title>
</head>
<body>
	<?php 
	$sid = $_GET['sid'];
	include('db.php');

	$sql = mysqli_query($con,"SELECT * FROM `student` WHERE sid='$sid'");
	$res = mysqli_fetch_array($sql);
	 ?>
	 <form method="post">
		 <label>Student ID</label> 
		 <input type="number" name="sid" readonly value="<?php echo $res['sid'] ?>"><br>
   	     <label>Student Name</label>  
   	     <input type="text" name="sname" readonly value="<?php echo $res['sname'] ?>"><br>
	    
	     <input type="submit" name="add" value="Insert">

</body>
</html>
<?php 
include('db.php');
 if(isset($_POST['add']))
 {
 
$result = mysqli_query($con,"SELECT cid from `mentor` where mid ='".$_SESSION['mid']."'");
$row = mysqli_fetch_array($result);
$cid = $row['cid']; 
$sid =$_POST['sid'];

$obname =$_POST['sname'];
$obpassword=b1b1b1;
$sql = "INSERT INTO `officebearer`(`obname`,`obpassword`,`cid`,`sid`) VALUES ('$obname','$obpassword','$cid','$sid')";

$result= mysqli_query($con,$sql);

      echo "
      <script>
      alert('Selected');	
      window.location='mentordash.php';
      </script>
      ";
       
}
 ?>