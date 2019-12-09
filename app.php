<?php 
session_start();
      if(!isset($_SESSION['mid'])){
      header("Location: mentor.php");}  
?>
<?php 
$eid=$_GET['eid'];

include('db.php');
 $sql="UPDATE event SET approval=1 WHERE eid =$eid";
        $result= mysqli_query($con,$sql);
          echo "
          <script>
          alert('EVENT APPROVED');
          window.location='mentordash.php';
          </script>
          ";
 ?>