<?php
    session_start();
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 
    $room_size=$_GET['room_size'];
    $roomID = $_GET['roomID'];
    $hotelName = $_GET['hotelName'];
    
    if(isset($_SESSION['userID'])){
        $userID = $_SESSION['userID'];
        $sql = "SELECT * FROM User WHERE User.userID = '$userID'";
        $result = mysqli_query($user->db, $sql);
        $row = mysqli_fetch_array($result);
        $name = $row['full_name'];
        $email = $row['email'];
        $phone = $row['phone_num'];
    }
    else{
        $userID = NULL;
        $name = "";
        $phone = "";
    }

    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST);
        if($userID){ 
            $result=$user->makeBooking($checkin, $checkout, $name, $phone,$roomID, $userID, $email);
        }else{
            $result=$user->makeBooking($checkin, $checkout, $name, $phone,$roomID);
        }
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
             echo "
             <script type='text/javascript'>
                 window.location.href = 'index.php';
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
    <title>LET's BOOK IT</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
$( ".datepicker" ).datepicker({
              dateFormat : 'yy-mm-dd'
            });
} );
</script>

<style>
    
    body {
        background: rgb(25,39,52);
    }

    h2 {
    text-align: center;
    color: black;
    }

    #click_here {
    margin-top: 10px;
    text-align: center;
    
    }

    .container
    {
        padding: 10px;
    }

   
    .button
    {
    
    width: 100px;
    float: center;
    font-size: 13px;
    
    }
    .well
        {
            width: 500px;
            
    
        }
  </style>
</head>
<body>
    <div class = "image">
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    
    <div class="container">
       
        <?php $user->makeNavBar()?>
        <hr>
      <div class="well">
            <h2>Make Reservation for "<?php echo $room_size; ?>"</h2>
            <h2>at: <?php echo $hotelName?></h2>
            
            <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Date In :</label>
                    <input type="text" class="datepicker" name="checkin" >

                </div>
               
               <div class="form-group">
                    <label for="checkout">Date Out:</label>
                    <input type="text" class="datepicker" name="checkout">
                </div>
                <div class="form-group">
                   
                   <input placeholder ="Enter First Last Name(eg. John Smith)" type="text" class="form-control" name="name" pattern ="^[A-Za-z]+\s[A-Za-z]+$" required value="<?php echo $name?>">
               </div>
               <div class="form-group">
                 
                   <input  placeholder ="Enter Your Phone Number (eg. 555-555-5555)" type="text" class="form-control" name="phone" pattern = "^\d{3}-\d{3}-\d{4}$" required value="<?php echo $phone?>"> 
               </div>
                 
               
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>

               <br>
                <div id="click_here">
                    <a href="index.php">Back to Home</a>
                </div>


            </form>
        </div>
        
    </div>
    
</body>

</html>