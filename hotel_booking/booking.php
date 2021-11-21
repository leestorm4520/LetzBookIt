<?php
    session_start();
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 
    $hotelName = $_GET['hotelName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's BOOK IT</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/css/index.css">
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
        
        <?php
        
        
        $sql="SELECT * FROM Hotel_Rooms
              INNER JOIN Hotel ON Hotel.hotelID = Hotel_Rooms.hotelID 
              WHERE Hotel.name = '$hotelName' ";
              //This query will get all hotel room types associated with the given hotel
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                echo "
                        <div>
                               <h2 style='color:white'> Welcome to ".$hotelName."</h2>   
                            </div>
                                <div class='form-group'>
                                    <label style= 'font-size:20px; color:yellow' for='room_size'>Pick Your Bed Size:</label>&nbsp;";
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {     
                            echo" <a href='checkout.php?room_size=".$row['room_type']."&roomID=".$row['hrID']."&hotelName=".$hotelName."'><button>".$row['room_type'].": $".$row['rate']."</button> </a>";
                
                }     
                echo "</div>
                    </div>";                                 
            }
            else
            {
                echo "NO Data Exist";
            }
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
  
        ?>
        
    </div>
    
</body>

</html>