<?php
    session_start();
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 
    $bookID=$_GET['bookID'];
    $hotelID = $_GET['hotelID'];
    $hotelName = $_GET['hotelName'];
    
    if(!$user->get_session()) { 
        header("location:login.php"); 
    } 

    if(isset($_POST['submit'])){

        $new_start = $_POST['checkin'];
        $new_end = $_POST['checkout'];
        $new_email = $_POST['email'];
        $new_phone = $_POST['phone'];
        $new_name = $_POST['name'];
        $new_room_type = $_POST['roomTypeChosen'];
    } 
    
    $sqlBook = "SELECT * FROM Booking b
            WHERE b.bookingID = '$bookID'";
    
    $resultBook = mysqli_query($user->db, $sqlBook);

    $rowBook = mysqli_fetch_array($resultBook);
    $old_start = $rowBook['start_dt'];
    $old_end = $rowBook['end_dt'];
    $old_name = $rowBook['name'];
    $old_phone = $rowBook['phone_num'];
    $old_email = $rowBook['email'];
    $old_room_type = $rowBook['hrID'];
    
    if(isset($_REQUEST['cancel'])){
        echo "
                    <script type='text/javascript'>
                        window.location.href = 'hotelManager/reservationCancellation.php?bookingID=".$bookID."&hotelName=".$hotelName."';
                    </script>"; 
    }

    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST);

        if( $new_start != $old_start || $new_end != $old_end || $new_room_type != $old_room_type){ 
                
            if($user->check_available($new_start, $new_end, $new_room_type, $bookID) && $checkin < $checkout){
                $result=$user->updateBooking($bookID, $name, $phone, $email, $new_start, $new_end, $new_room_type);
                    
                if($result)
                {
                    echo "<script type='text/javascript'>
                        alert('".$result."');
                    </script>";
                    if(strcmp($_SESSION['userPerms'], 'manager') == 0){
                        echo "
                        <script type='text/javascript'>
                            window.location.href = 'hotelManager/reservationInformation.php';
                        </script>"; 
                    }else{
                        echo "
                        <script type='text/javascript'>
                            window.location.href = 'customerMenu.php';
                        </script>";
                    }
                }
            }else{
                echo "<script type='text/javascript'>
                    alert('The room you requested is not available during the specified timeframe, or the timeframe is invalid');
                </script>";
            }
            
        }else{
            
            $result=$user->updateBooking($bookID, $name, $phone, $email);
            
            if($result)
            {
                echo "<script type='text/javascript'>
                    alert('".$result."');
                </script>";
                if(strcmp($_SESSION['userPerms'], 'manager') == 0){
                    echo "
                    <script type='text/javascript'>
                        window.location.href = 'hotelManager/reservationInformation.php';
                    </script>"; 
                }else{
                    echo "
                    <script type='text/javascript'>
                        window.location.href = 'customerMenu.php';
                    </script>";
                }
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
      <div class="well well-lg">
            <h2>Modify Reservation at "<?php echo $hotelName ?>"</h2>
            
            <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Date In :</label>
                    <input type="text" class="datepicker" name="checkin" value = "<?php echo $old_start?>">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Date Out:</label>
                    <input type="text" class="datepicker" name="checkout" value = "<?php echo $old_end?>">
                </div>
                <div class="form-group">
                   
                   <input placeholder ="Enter First Last Name(eg. John Smith)" type="text" class="form-control" name="name" pattern ="^[A-Za-z]+\s[A-Za-z]+$" required value="<?php echo $old_name?>">
               </div>
               <div class="form-group">
                 
                   <input  placeholder ="Enter Your Phone Number (eg. 555-555-5555)" type="text" class="form-control" name="phone" pattern = "^\d{3}-\d{3}-\d{4}$" required value="<?php echo $old_phone?>"> 
               </div>
               
               <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter your Email" required value = "<?php echo $old_email?>">
                </div>

                <div class="form-check form-check-inline">

                <?php
                    $sqlRooms = "SELECT * FROM Hotel_Rooms hr
                                    WHERE hr.hotelID = '$hotelID'";

                    $resultRooms = mysqli_query($user->db, $sqlRooms);
                    while($rowRoom = mysqli_fetch_array($resultRooms)){
                        $room_type = $rowRoom['room_type'];
                        $rate = $rowRoom['rate'];
                        $hrID = $rowRoom['hrID'];

                        echo "<input class='form-check-input' type='radio' id='".$room_type."Radio' value='".$hrID."' name='roomTypeChosen' ";
                        if($old_room_type == $rowRoom['hrID']){
                            echo "checked";
                        }
                        
                        echo ">
                        <label class='form-check-label' for='".$room_type."Radio';'>".$room_type." : $".$rate."  </label>";
                    }
                ?>
               </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" style="width:165px;">Update Reservation</button>
                <button  class="btn btn-lg btn-danger button" name="cancel" style="width:165px;">Cancel Reservation</button>
               
                
               <br>
                <div id="click_here">
                    <a href="customerMenu.php">Back to Profile</a>
                </div>
            </form> 

            
        </div>
        
    </div>
    
</body>

</html>