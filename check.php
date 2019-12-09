<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<?php 
$eid=$_GET['eid'];

include('db.php');

$sql2 = mysqli_query($con,"SELECT approval FROM event WHERE eid='$eid' ");
$res2 = mysqli_fetch_array($sql2);
if($res2['approval']==1){
     $sql = mysqli_query($con,"SELECT * FROM event WHERE eid='$eid' ");
     
$res = mysqli_fetch_array($sql);
$_SESSION['date']=$res['date'];
 echo "
          <script>
          window.location='hallbooking.php';
          </script>
          ";
}
else{
	
          echo "
          <script>
          alert('Wait for approval from Mentor');
          window.location='secdash.php';
          </script>
          ";
}
 
 ?>