<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: OB.php");}  
?>
<?php 
$eid=$_GET['eid'];
$_SESSION['eid']=$eid;
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
else if($res2['approval']==3){
     $sql = mysqli_query($con,"SELECT * FROM event WHERE eid='$eid' ");
     
$res = mysqli_fetch_array($sql);
$_SESSION['date']=$res['date'];
 echo "
          <script>
          alert('Already booking has been done for this event do you still want to continue?');
          window.location='hallbooking.php';
          </script>
          ";
}
else {
	
          echo "
          <script>
          alert('Wait for approval from Mentor');
          window.location='secdash.php';
          </script>
          ";
}
 
 ?>