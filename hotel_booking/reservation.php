<?php
    include_once 'admin/include/class.user.php'; 
    $user=new User(); 



    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->check_available($checkin, $checkout);
        if(!($result))
        {
            echo $result;
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="/css/booking.css">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>
   
</head>

<style>
   
.well {
    background: rgba(0, 0, 0, 0.7);
    border: none;
    height: 200px;
}

body {
    background: rgb(25,39,52);
}

h4 {
    color: #ffbb2b;
}
h6
{
    color: navajowhite;
    font-family:  monospace;
}
label
{
    color:#ffbb2b;
    font-size: 13px;
    font-weight: 100;
}
.container{
    padding: 10px;
}
.image{
    padding: 10px;
    right: 50px;
}
</style>
<body>
    <div class = "image">
      <img src="logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room</a></li>
                    <li class="active"><a href="contact.php">Contact</a></li>
                   <li><a href="Manager.php">Login/Registration</a></li>
                </ul>
            </div>
        </nav>
        
       <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-5 well'>
         <form action="" method="post" name="room_category">                    
               <div class="form-group">
                    <input type="text" placeholder = "checkin date" class="datepicker" name="checkin" require>
                </div> 
               <div class="form-group">
                    <input type="text" placeholder = "checkout date"class="datepicker" name="checkout" require>
                </div>        
                <button type="submit" class="btn btn-primary button" name="submit">Booking</button>
            </form>
           </div>
           <div class="col-md-3"></div>
        </div> 
<?php         
         if(isset($_REQUEST[ 'submit']))
         {
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    
                    $room_cat=$row['room_cat'];
                    $sql="SELECT * FROM room_category WHERE roomname='$room_cat'";
                    $query = mysqli_query($user->db, $sql);
                    $row2 = mysqli_fetch_array($query);
                    
                   echo "
                            <div class='row'>
                            <div class='col-md-4'></div>
                            <div class='col-md-5 well'>
                                <h4>".$row2['roomname']."</h4><hr>
                                <h6>No of Beds: ".$row2['no_bed']." ".$row2['bedtype']." bed.</h6>
                                <h6>Available Rooms: ".$row2['available']."</h6>
                                <h6>Facilities: ".$row2['facility']."</h6>
                                <h6>Price: ".$row2['price']." $/night.</h6>
                            </div>
                            <div class='col-md-3'>
                                <a href='./booknow.php?roomname=".$row2['roomname']."'><button class='btn btn-primary button'>Book Now</button></a>
                            </div>   
                            </div>
                    
                         ";
                    
                    
                }
                              
            }
         }
       
?>


    </div>
    
</body>

</html>