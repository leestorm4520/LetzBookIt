<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$M_id=$_SESSION[ 'M_id']; 
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
                    <li class = "active"><a href="Manager.php">Manager login</a></li>
                    <li><a href="admin/UserLogin.php">User Login</a></li>
                    <li><a href="userRegister.php">User Registration</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Manager.php?q=logout">
                            <button type="button">Sign Out</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <h1 style ="font-size: 20px; color: red">------------------------------------------------Customer Booking Information----------------------------------------------</h1>
        
        <?php
        
        $sql="SELECT * FROM room_Magnolia WHERE book='true'";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    
                    echo " 
                            <div class='col-md-5 wellfix'>
                                <h4>The Magnolia All Suites </h4>
                                <h4>".$row['room_size']."</h4>
                                <h6>Checkin: ".$row['checkin']." and checkout: ".$row['checkout']."</h6>
                                <h6>Name: ".$row['name']."</h6>
                                <h6>Phone: ".$row['phone']."</h6>
                                <h6>Booking Condition: ".$row['book']."</h6>
                                <a href='hotelsCancelation/RoomMagnoliaCancelation.php?name=".$row['name']."'><button>Cancel </button> </a>
                                <br>
                            </div>
                         ";
                
                }
                         
            }
          
        }
        else

        {
            echo "Cannot connect to server".$result;
        }

        $sq2="SELECT * FROM room_townCentreRoom WHERE book='true'";
        $result = mysqli_query($user->db, $sq2);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row2 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>The Lofts at Town Centre </h4>
                                <h4>".$row2['room_size']."</h4>
                                <h6>Checkin: ".$row2['checkin']." and checkout: ".$row2['checkout']."</h6>
                                <h6>Name: ".$row2['name']."</h6>
                                <h6>Phone: ".$row2['phone']."</h6>
                                <h6>Booking Condition: ".$row2['book']."</h6>
                                <a href='hotelsCancelation/RoomTownCentreCancelation.php?name=".$row2['name']."'><button>Cancel </button> </a>
                                
                                </div>
                         ";
                
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        $sq3="SELECT * FROM room_parkNorthRoom WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>Park North Hotel </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomParkNorthCancelation.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }
        
        $sq3="SELECT * FROM room_homeAwayInn WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>HomeAway Inn </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomHomeAway.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        $sq3="SELECT * FROM room_RioInn WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>Rio Inn </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomRioInn.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        $sq3="SELECT * FROM room_sunPalace WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>Sun Palace Inn </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomSunPalace.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        $sq3="SELECT * FROM room_ComfyMotel WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>The Comfy Motel Place </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomComfyMotel.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }


        $sq3="SELECT * FROM room_Courtyard WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>The Courtyard Suites </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomCourtyard.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }


        $sq3="SELECT * FROM room_Regency WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                    <div class='col-md-5 wellfix'>
                                <h4>The Regency Rooms </h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomRegency.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                <br>
                                </div>
                         ";
                    
                    
                }
                                     
            }
          
        }
        else
        {
            echo "Cannot connect to server".$result;
        }

        

        $sq3="SELECT * FROM room_TownInnBudget WHERE book='true'";
        $result = mysqli_query($user->db, $sq3);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row3 = mysqli_fetch_array($result))
                {
                    
                    echo " 
                                <div class='col-md-5 wellfix'>
                                <h4>Town Inn Budget Rooms</h4>
                                <h4>".$row3['room_size']."</h4>
                                <h6>Checkin: ".$row3['checkin']." and checkout: ".$row3['checkout']."</h6>
                                <h6>Name: ".$row3['name']."</h6>
                                <h6>Phone: ".$row3['phone']."</h6>
                                <h6>Booking Condition: ".$row3['book']."</h6>
                                <a href='hotelsCancelation/RoomBudgetRooms.php?name=".$row3['name']."'><button>Cancel </button> </a>
                                </div>
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