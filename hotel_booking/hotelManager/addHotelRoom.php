<?php
    session_start();
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    if(!isset($_SESSION['userPerms']) || strcmp($_SESSION['userPerms'], 'manager') != 0){
        header("location:../permissionError.php");
    }   
    $hotelName=$_GET['hotelName'];
   // $roomID=$_GET['roomID'];

    $types = array();
    $sql = "SELECT * FROM Hotel h 
            INNER JOIN Hotel_Rooms hr ON hr.hotelID = h.hotelID
            WHERE h.name = '$hotelName'";
    $sqlresult = mysqli_query($user->db, $sql);
    while($row = mysqli_fetch_array($sqlresult)){
        $types[] = $row['room_type'];
    }
     

    if(isset($_REQUEST[ 'submit'])) 
    {    
        extract($_REQUEST); 
        $result=$user->addHotelRoom($room_type, $rate, $total_num, $hotelName);
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
            <h2>Add Hotels Rooms</h2>
            
            <form action="" method="post" name="room_category">
              
             
               <div class="form-group">
                <select name="room_type" id="room-select">
                <option value="">--Please choose bed type--</option>
                <?php 
                    if(!in_array("standard", $types))
                        echo "<option value='standard'>Standard</option>";
                    if(!in_array("queen", $types))
                        echo "<option value='queen'>Queen</option>";
                    if(!in_array("king", $types))
                        echo "<option value='king'>King</option>";
                ?>           
                </select>
               </div>

               <div class="form-group">    
                <input  placeholder ="rate Charge"type="integer" class="form-control" name="rate"required>
               </div>
               <div class="form-group">    
                <input  placeholder ="Add Rooms"type="integer" class="form-control" name="total_num"required>
               </div>

                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Add Now</button>

               <br>
                <div id="click_here">
                    <a href="roomAvailability.php">Back to Home</a>
                </div>


            </form>
        </div>
        
    </div>
    
</body>

</html>


