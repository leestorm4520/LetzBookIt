<?php
    session_start();
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    if(!$user->get_session()) 
    { 
        header("location:login.php"); 
    }    
    $bookingID=$_GET['bookingID'];
    $hotelName=$_GET['hotelName'];
    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->cancelBooking($bookingID);
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
             if(strcmp($_SESSION['userPerms'], 'manager') == 0){
             echo "
             <script type='text/javascript'>
                 window.location.href = 'reservationInformation.php';
             </script>"; 
             }else{
                echo "
                <script type='text/javascript'>
                    window.location.href = '../customerMenu.php';
                </script>";
             }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's BOOK IT</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/index.css">

    
</head>
<body>
    <div class = "image">
      <img src="../images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
       
        <?php $user->makeNavBar(true)?>
        <hr>
      
        <form action="" method="post" name="room_category">
            <div class="col-md-12 well" >
              <h4 style="color: #ffbb2b" >Click Confirm if you want to cancel the reservation at "<?php echo $hotelName ?>"</h4><br>
              <button type="submit" class="btn btn-lg btn-primary button" name="submit">Confirm</button>
            </div>  
        </form>
        
    
        
    </div>
    
</body>

</html>