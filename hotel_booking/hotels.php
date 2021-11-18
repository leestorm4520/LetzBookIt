<?php
include_once 'admin/include/class.user.php'; 
$user=new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LET's BOOK IT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href="admin/css/room.css" rel="stylesheet">
     
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
                    <li class="active"><a href="hotels.php"> Hotels </a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="Manager.php">Login</a></li>
                    <li><a href="userRegister.php">Customer Registration</a></li>
                </ul>
            </div>
        </nav>
        <hr>
        
        <?php
        
        
        $sql="SELECT * FROM hotelList";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    $sq2="SELECT * FROM room_Magnolia";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 1 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 1){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <h4></h4>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }
                   
                    $sq2="SELECT * FROM room_townCentreRoom";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 2 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 2){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }


                    $sq2="SELECT * FROM room_parkNorthRoom";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 3 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 3){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }


                    $sq2="SELECT * FROM room_Courtyard";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 4 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 4){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }

                    $sq2="SELECT * FROM room_Regency";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 5 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 5){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }


                    $sq2="SELECT * FROM room_TownInnBudget";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 6 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 6){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }

                    $sq2="SELECT * FROM room_ComfyMotel";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 7 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 7){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: N/A </h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }

                    $sq2="SELECT * FROM room_sunPalace";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 8 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 8){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }


                    $sq2="SELECT * FROM room_homeAwayInn";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 9 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 9){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: N/A</h6>
                                    <h6>King Size: N/A</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }


                    $sq2="SELECT * FROM room_RioInn";
                    $result1 = mysqli_query($user->db, $sq2);
                    $magnolia = 0;
                    $reMag =0;
                    $room=0;
                    if($result1)
                    {
                        if(mysqli_num_rows($result1) > 0)
                        {
            
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                if ($row1['book'] == 'true' && $row['hotel_id'] == 10 )
                                {
                               
                                $room = $room + 1;                                      
                                }
                                
                              
                         
                            }
                            if ($row['hotel_id'] == 10){
                                echo "
                                <div class='col-md-4 wellfix'>
                                    
                                    <h4>".$row['hotels']."</h4>
                                    <h6>Room Available: ".$row['room_num'] - $room."</h6>
                                    <h6>Amenities: ".$row['hotelAmenities']."</h6>
                                    <h6>Standard Size: ".$row['standard_price']." $/night</h6>
                                    <h6>Queen Size: ".$row['queen_price']." $/night</h6>
                                    <h6>King Size: ".$row['king_price']." $/night</h6>
                                    <h6>Weekend Differential: ".$row['Surcharge']." % nightly rate surcharge.</h6>
                                    <a href='hotelsRoom/".$row['pickRoomWeb'].".php'><button>Book Now</button> </a>
                                    <h1></h1>                           
                                </div>
                             ";
                            }
                             

                        
                        }
                       
                    }

                    
                                                       
                }                                      
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