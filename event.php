<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create event</title>
</head>
<body>
<div>
	<form method="post">
		<label>Event Name</label> 
		 <input type="text" name="ename" required><br>
   	     <label>Event Descprition</label>  
   	     <input type="text" name="edesp" required ><br>
	    <label>Event Date</label>  
   	     <input type="Date" name="date" required ><br>
	     <input type="submit" name="add" value="Create">
	     <a href="secdash.php">Go Back To Dash Board</a>
	</form>

</div>
<?php
include('db.php');

 if(isset($_POST['add']))
 {
$obid=$_SESSION['obid'];
$sql1 = mysqli_query($con,"SELECT * FROM `officebearer` WHERE obid='$obid'");
$res1 = mysqli_fetch_array($sql1); 
$cid=$res1['cid'];
$sql2 = mysqli_query($con,"SELECT * FROM `club` WHERE cid='$cid'");
$res2 = mysqli_fetch_array($sql2);
$cname=$res2['cname'];
$dno=$res2['dno'];
$ename=$_POST['ename'];
$edesp=$_POST['edesp'];
$date=$_POST['date'];
$sql = "INSERT INTO `event`(`ename`,`edesp`,`date`,`club`,`dno`,`cid`) VALUES ('$ename','$edesp','$date','$cname','$dno','$cid')";
$result= mysqli_query($con,$sql);
echo "
      <script>
      alert('Event Created');
      window.location='secdash.php';
      </script>
      ";
}
  ?>
</body>
</html>