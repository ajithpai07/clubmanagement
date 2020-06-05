<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
</head>
<body>
	<?php 
	$cid = $_GET['cid'];
	include('db.php');
	$sql = mysqli_query($con,"SELECT * FROM `club` WHERE cid='$cid'");

	$res = mysqli_fetch_array($sql);
	 ?>
	 <form method="post">
		 <label>Club Name</label> 
		 <input type="text" name="name" readonly value="<?php echo $res['cname'] ?>" ><br>
   	     
	     <input type="submit" name="back" value="Change Club" >

       <hr>
       <table border="1">
  <thead>
      <tr>
      <th>Staff ID</th>
      <th>Staff Name</th>
      <th>Select</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
     $cid = $_GET['cid'];
   
     $dno=$res['dno'];
    
    include('db.php');
    session_start();
      $_SESSION['cid']=$cid;
    $sql = mysqli_query($con,"SELECT * FROM `staff` WHERE dno='$dno'");
    while ($res = mysqli_fetch_array($sql)) 
    {
      echo'
      <tr>
      <td>'.$res['sfid'].'</td>
      
      <td>'.$res['sfname'].'</td>
      
      

        <td><a href="add.php?sfid=' .$res['sfid'].'">Select</a></td>
        
      </tr>
      ';
      
     }

      ?>
  </tbody>
</table>
	</form>
<?php 
include('db.php');
if(isset($_POST['back']))
{
  echo "
       <script>
      alert('Directing to the Club list');
      window.location='addmentor.php';
      </script>
      ";
}
?>

</body>
</html>