<?php
    session_start();
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    if(!isset($_SESSION['userPerms']) || strcmp($_SESSION['userPerms'], 'manager') != 0){
        header("location:../permissionError.php");
    }      
    $bookingID=$_GET['hotelID'];
    $hotelName=$_GET['hotelName'];

    if(isset($_REQUEST['return'])){
        echo "
             <script type='text/javascript'>
                 window.location.href = 'roomAvailability.php';
             </script>"; 
    }
    if(isset($_REQUEST[ 'delete'])) 
    { 
        extract($_REQUEST); 
        $result=$user->deleteHotel($hotelID);
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
              <h4 style="color: #ffbb2b" >Are you sure you want to delete "<?php echo $hotelName ?>"</h4><br>
              <button type="submit" class="btn btn-lg btn-danger button" name="delete" style ="width:200px;">Delete it!</button>
              <button type="submit" class="btn btn-lg btn-primary button" name="return" style ="width:200px;">On second thought...</button>
            </div>  
        </form>
        
    
        
    </div>
    
</body>

</html>