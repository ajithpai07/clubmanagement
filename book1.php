<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
</head>
<body>
<div>
	<?php 
	
	$hid = $_SESSION['hid'];
	include('db.php');

	$sql = mysqli_query($con,"SELECT * FROM `hallname` WHERE hid='$hid'");
	$res = mysqli_fetch_array($sql);
	 ?>
	<form method="post">
		<label>Select Date</label>
		<input type="date" name="date" readonly value="<?php echo $_SESSION['date'] ?>"><br>
		<label>Select the Hall Name</label>
		<input type="text" name="hname" readonly value="<?php echo $res['hname'] ?>"><br>
		
<label>Enter the slot</label>
<select name="slot" required>
  <option value="1">8:10am to 10:10am</option>
  <option value="2">10:10am to 12:30pm</option>
  <option value="3">1:30pm to 3:30pm</option>
  <option value="4">Half day</option>
  <option value="5">Full day</option>   
</select><br>
<input type="submit" value="Book" name="book"><br>

	</form>	
</div>
<?php 

$obid=$_SESSION['obid'];
$check=$_SESSION['type'];

include('db.php');

	$sql1 = mysqli_query($con,"SELECT * FROM `officebearer` WHERE obid='$obid'");
	$res1 = mysqli_fetch_array($sql1);
$cid=$res1['cid'];
$sql2 = mysqli_query($con,"SELECT * FROM `club` WHERE cid='$cid'");
	$res2 = mysqli_fetch_array($sql2);
	$clubname=$res2['cname'];
include('db.php');
 if(isset($_POST['book']))
 {
 	$date=$_POST['date'];
 	$hname=$_POST['hname'];
 	$slot=$_POST['slot'];
 	$unbook='Unbooked';
 	$sql4 = mysqli_query($con,"SELECT * FROM `hallname` WHERE hname='$hname'");
	$res4 = mysqli_fetch_array($sql4);
 	$hid1 = $res4['hid'];
	


if($check==2)
{ 
 $sql3 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='$hid1' AND bdate='$date'");
  $res3 = mysqli_fetch_array($sql3);
  $booking=$res3['booking'];

   if ($booking==1 and ($slot==2 or $slot==3) ) 
        { 

          if($slot==2){
            
          $insert = "UPDATE `hallbooking` SET `slot2`='$clubname', `booking`= '4' WHERE hid='$hid' AND bdate='$date'";
            $result= mysqli_query($con,$insert);
            echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";
              }
              else
              {
                $insert = "UPDATE `hallbooking` SET `slot3`='$clubname', `booking`= '6' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

              }


         
        }
        elseif($booking==1 and ($slot==1 or $slot==4 or $slot==5)){
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";
        }
        elseif ($booking==2 and ($slot==1 or $slot==3)) {
          if($slot==1){
            
          $insert = "UPDATE `hallbooking` SET `slot`='$clubname', `booking`= '4' WHERE hid='$hid' AND bdate='$date'";
            $result= mysqli_query($con,$insert);
            echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";
              }
              elseif($slot==3)
              {
                $insert = "UPDATE `hallbooking` SET `slot3`='$clubname', `booking`= '7' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

              }
             
          
        }
        elseif($booking==2 and ($slot==2 or $slot==4 or $slot==5)) {
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";

        }
        elseif($booking==3 and ($slot==1 or $slot==2 or $slot==4)){
          if($slot==1){
            
          $insert = "UPDATE `hallbooking` SET `slot`='$clubname', `booking`= '6' WHERE hid='$hid' AND bdate='$date'";
            $result= mysqli_query($con,$insert);
            echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";
              }
              elseif($slot==2)
              {
                $insert = "UPDATE `hallbooking` SET `slot2`='$clubname', `booking`= '7' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

              }
              elseif($slot==4)
              {
                $insert = "UPDATE `hallbooking` SET `slot`='$clubname',`slot2`='$clubname', `booking`= '5' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

              }
          }
              elseif($booking==3 and ($slot==3 or $slot==5)) {
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";

        }
         elseif($booking==4 and ($slot==3)){
             $insert = "UPDATE `hallbooking` SET `slot3`='$clubname', `booking`= '5' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

        }
        elseif($booking==4 and ($slot==1 or $slot==2 or $slot==4 or $slot==5)){
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";

        }
         elseif($booking==5){
          echo "
          <script>
          alert('you have Selected already booked hall please select a different hall');
          window.location='hallbooking.php';
        
          </script>
          ";

        }
        elseif($booking==6 and ($slot==2)){
            $insert = "UPDATE `hallbooking` SET `slot2`='$clubname', `booking`= '5' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

        }
         elseif($booking==6 and ($slot==1 or $slot==3 or $slot==4 or $slot==5)){
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";

        }
         elseif($booking==7 and ($slot==1)){
            $insert = "UPDATE `hallbooking` SET `slot`='$clubname', `booking`= '5' WHERE hid='$hid' AND bdate='$date'";
                    $result= mysqli_query($con,$insert);
                    echo "
          <script>
          alert('Booking Successful');
          window.location='secdash.php';
          </script>
          ";

        }
         else{
          echo "
          <script>
          alert('you have Selected already booked slot please select a different one');
          window.location='book1.php';
        
          </script>
          ";

        }

}
}
  
  
 ?>


</body>
</html>