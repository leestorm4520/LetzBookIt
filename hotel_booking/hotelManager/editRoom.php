<?php
    session_start();
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    if(!isset($_SESSION['userPerms']) || strcmp($_SESSION['userPerms'], 'manager') != 0){
        header("location:../permissionError.php");
    }   
    $name = $_GET['name'];
    $room_type=$_GET['room_type'];
    $rate = $_GET['rate'];
    $total_num = $_GET['total_num'];

    if(isset($_REQUEST[ 'submit'])) 
    {    
        extract($_REQUEST); 
        $result=$user->editHotelRoom($name,$room_type,$total_num, $rate, $new_rate,$new_total_num);
        if($result)
        {   
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
             echo "
             <script type='text/javascript'>
                 window.location.href = 'roomAvailability.php';
             </script>"; 
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
    
    <script>
$( function() {
$( ".datepicker" ).datepicker({
              dateFormat : 'yy-mm-dd'
            });
} );
</script>
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 350px;
        }
        
        body {
            background: rgb(25,39,52);
        }
        
        h4 {
            color: white;
        }
        h6
        {
            color: navajowhite;
            font-family:  monospace;
        }
        
.container{
    padding: 10px;
}
.image{
    padding: 10px;
    right: 50px;
}



    </style>
    
    
</head>

<body>
      
    <div class = "image">
      <img src="../images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
            
  
    <div class="container">
       
       <?php $user->makeNavBar(true)?>
       <hr>
       <?php 
       
       echo " <h4> You are modifying: ".$name." Hotels </h4>.
       <h4>Your current rate charge is ".$rate."</h4>
       <h4>Your current tootal room is ".$total_num."</h4>"
       ?>
   <form action="" method="post" name="room_category">
       <h4>------------<h4>
      <h4>Please enter new rate charge</h4>
       <div class="form-group">    
       <input  placeholder ="rate Charge" type="integer" class="form-control" name="new_rate" required>
      </div>
      <h4>Please enter new Add rooms</h4>
      <div class="form-group">    
       <input  placeholder ="Add Rooms" type="integer" class="form-control" name="new_total_num" required>
      </div>
      <button type="submit" class="btn btn-lg btn-primary button" name="submit">Edit Now</button>
       
       
      </form>
    </div>
    
    
    
</body>

</html>