<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<?php 
$eid=$_GET['eid'];

include('db.php');
 $sql="UPDATE event SET open=1 WHERE eid =$eid";
        $result= mysqli_query($con,$sql);
          echo "
          <script>
          alert('EVENT OPEN FOR REGISTRATION');
          window.location='secdash.php';
          </script>
          ";
 ?>