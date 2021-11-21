<?php
    session_start();
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    if(!isset($_SESSION['userPerms']) || strcmp($_SESSION['userPerms'], 'manager') != 0){
        header("location:../permissionError.php");
    }   
 //   $room_size=$_GET['room_size'];
   // $roomID=$_GET['roomID'];
   $object = "";
   if(isset($_POST['submit'])){

        if(!empty($_POST['amenities'])) {    
            foreach($_POST['amenities'] as $value){
                if ($object == ""){
                $object = $object . $value;
            }
                else{
                $object = $object . "," . $value;
                }
                
            }
        }

    } 
    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->addHotel($name, $address, $phone, $weekend_dif, $object);
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
             echo "
             <script type='text/javascript'>
                 window.location.href = 'addHotelRoom.php?hotelName=".$name."';
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

    <link href="../css/bootstrap.min.css" rel="stylesheet">

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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
      <img src="../images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    
    <div class="container">
       
        <?php $user->makeNavBar(true)?>
        <hr>
      <div class="well">
            <h2>Add A New Hotel</h2>
            
            <form action="" method="post" name="room_category">
              
               <div class="form-group">
                 
                   <input  placeholder ="Hotel Name"type="text" class="form-control" name="name"required>
               </div>
               <div class="form-group">
                 
                   <input  placeholder ="Address"type="text" class="form-control" name="address"required>
               </div>
               <div class="form-group">
                 
               <input  placeholder ="Enter Phone Number (eg. 555-555-5555)"type="text" class="form-control" name="phone" pattern = "^\d{3}-\d{3}-\d{4}$" required>
             </div>
             <div class="form-group">
                 
                 <input  placeholder ="Weekend_diff " type="integer" class="form-control" name="weekend_dif"required>
             </div>
            <label>Amenities </label>
            <input type="checkbox" name="amenities[]" value="spa"> Spa
            <input type="checkbox" name="amenities[]" value="pool"> Pool 
            <input type="checkbox" name="amenities[]" value="gym"> Gym 
            <input type="checkbox" name="amenities[]" value="business_office"> Business Office

                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Create</button>

               <br>
                <div id="click_here">
                    <a href="../managerMenu.php">Back to Home</a>
                </div>


            </form>
        </div>
        
    </div>
    
</body>

</html>