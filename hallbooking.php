<?php 
session_start();
      if(!isset($_SESSION['obid'])){
      header("Location: sec.php");}  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hall Booking</title>
</head>
<body>
<div>
	<form method="post">
		<label>Select Date</label>
		<input type="date" name="date" min="2019-09-30" max="2019-12-31">
		<input type="submit" value="Check" name="check"><br>
		<table border="1">
  <thead>
      <tr>
      <th>Hall ID</th>
      <th>Hall Name</th>
      <th>8:10 to 10:10</th>
      <th>10:30 to 12:30</th>
      <th>1:30 to 3:30</th>
      <th>Book</th>
    </tr>
  </thead>
  <tbody>
  	<a href="secdash.php">Go Back To Dash Board</a>
    <?php 
     
    include('db.php');
    

    if(isset($_POST['check']))
 {
 	$date=$_POST['date'];
 	$_SESSION['date']=$date;
    $sql1 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='1' AND bdate='$date'");
    $sql2 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='2' AND bdate='$date'");
    $sql3 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='3' AND bdate='$date'");
    $sql4 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='4' AND bdate='$date'");
    $sql5 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='5' AND bdate='$date'");
    $sql6 = mysqli_query($con,"SELECT * FROM `hallbooking` WHERE hid='6' AND bdate='$date'");

    $res1 = mysqli_fetch_array($sql1); 
    	
    	if($res1=='')
      {
    
      echo'
      <tr>
      <td>1</td>      
      <td>Amriteshwari</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=1&type=1">Click to Book</a></td>
      	</tr>
      ';
      }
      else
      {
    
      echo'
      <tr>
      <td>'.$res1['hid'].'</td>      
      <td>Amriteshwari</td>     
       	<td>'.$res1['slot'].'</td>
      	<td>'.$res1['slot2'].'</td>
      	<td>'.$res1['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=1&type=2">Click to Book</a></td>
      	</tr>
      ';
      }

       	$res2 = mysqli_fetch_array($sql2);
       	if($res2=='')
      {
    
      echo'
      <tr>
      <td>2</td>      
      <td>Sudhamani</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=2&type=1">Click to Book</a></td>
      	</tr>
      ';
      }
      else
      {
    
      echo'
      <tr>
      <td>'.$res2['hid'].'</td>      
      <td>Sudhamani</td>     
       	<td>'.$res2['slot'].'</td>
      	<td>'.$res2['slot2'].'</td>
      	<td>'.$res2['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=2&type=2">Click to Book</a></td>
      	</tr>
      ';
      }

    
     
    	$res3 = mysqli_fetch_array($sql3);
    	if($res3=='')
      {
    
      echo'
      <tr>
      <td>3</td>      
      <td>Krishna</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=3&type=1">Click to Book</a></td>
      	</tr>
      ';
      }
      else
      {
    
      echo'
      <tr>
      <td>'.$res3['hid'].'</td>      
      <td>Krishna</td>     
       	<td>'.$res3['slot'].'</td>
      	<td>'.$res3['slot2'].'</td>
      	<td>'.$res3['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=3&type=2">Click to Book</a></td>
      	</tr>
      ';
      }

      $res4 = mysqli_fetch_array($sql4);
    	if($res4=='')
      {
    
      echo'
      <tr>
      <td>4</td>      
      <td>Vyasa</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=4&type=1">Click to Book</a></td>
      	</tr>
      ';
      }

      else
      {
    
      echo'
      <tr>
      <td>'.$res4['hid'].'</td>      
      <td>Vyasa</td>     
       	<td>'.$res4['slot'].'</td>
      	<td>'.$res4['slot2'].'</td>
      	<td>'.$res4['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=4&type=2">Click to Book</a></td>
      	</tr>
      ';
      }

$res5 = mysqli_fetch_array($sql5);
    	if($res5=='')
      {
    
      echo'
      <tr>
      <td>5</td>      
      <td>Rama</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=5&type=1">Click to Book</a></td>
      	</tr>
      ';
      }

      else
      {
    
      echo'
      <tr>
      <td>'.$res5['hid'].'</td>      
      <td>Rama</td>     
       	<td>'.$res5['slot'].'</td>
      	<td>'.$res5['slot2'].'</td>
      	<td>'.$res5['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=5&type=2">Click to Book</a></td>
      	</tr>
      ';
      }

      $res6 = mysqli_fetch_array($sql6);
    	if($res6=='')
      {
    
      echo'
      <tr>
      <td>6</td>      
      <td>Elearning</td>     
       	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td>Unbooked</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=6&type=1">Click to Book</a></td>
      	</tr>
      ';
      }

      else
      {
    
      echo'
      <tr>
      <td>'.$res6['hid'].'</td>      
      <td>Elearning</td>     
       	<td>'.$res6['slot'].'</td>
      	<td>'.$res6['slot2'].'</td>
      	<td>'.$res6['slot3'].'</td>
      	<td><a href="book.php?obid='.$_SESSION['obid'].'&hid=6&type=2">Click to Book</a></td>
      	</tr>
      ';
      }


    
 }

      ?>
  </tbody>
</table>
	</form>
	</form>
</div>
<?php 
include('db.php');

 ?>
</body>
</html>