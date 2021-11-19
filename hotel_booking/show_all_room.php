<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$M_id=$_SESSION[ 'userID']; 
if(!$user->get_session()) 
{ 
    header("location:admin/login.php"); 
} 
if(isset($_GET['q'])) 
{ 
    $user->user_logout();
 header("location:index.php"); 
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
    
    
    <style>
          
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 250px;
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
        .container{
            padding: 10px;
            font-size: 15px
        }
		.image{
            padding: 10px;
            right: 50px;
        }

    </style>
    
    
</head>

<body>

<div class = "image">
      <img src="logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
       
       <nav class="navbar navbar-inverse">
           <div class="container-fluid">
               <ul class="nav navbar-nav">
                   <li><a href="index.php">Home</a></li>
                   <li><a href="hotels.php">Hotels</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li class="active"><a href="show_all_room.php">Login</a></li>
                   <li><a href="userRegister.php">Customer Registration</a></li>
                 </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Manager.php?q=logout">
                            <button class = "btn btn-primary" type="button">Sign Out</button>
                        </a>
                    </li>
                </ul>
               </ul>
           </div>
       </nav>
       <hr>
        
        <h1 style ="font-size: 20px; color: red">--------------------------------------Customer Booking Information---------------------------------</h1>
        
        
        
        <?php
        
        $sql="SELECT * FROM Booking b 
              INNER JOIN Hotel_Rooms hr on hr.hrID = b.hrID";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    $hotelID = $row['hotelID'];
                    $sql2 = "SELECT h.name FROM Hotel h 
                             WHERE h.hotelID = '$hotelID'";
                    $result2 = mysqli_query($user->db, $sql2);
                    $row2 = mysqli_fetch_array($result2);

                    echo " 
                          
                                <h4>".$row2['name']."</h4>
                                <h4>".$row['room_type']."</h4>
                                <h6>Checkin: ".$row['start_dt']." and checkout: ".$row['end_dt']."</h6>
                                <h6>Name: ".$row['name']."</h6>
                                <h6>Phone: ".$row['phone_num']."</h6>
                                <a href='hotels/RoomCancelation.php?bookingID=".$row['bookingID']."'><button>Cancel </button> </a>
                                <hr>

                         ";
                
                }
                         
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