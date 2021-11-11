<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$U_id=$_SESSION[ 'U_id']; 
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
    <title>LETS BOOK IT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 150px;
        }
        
        body {
            background: rgb(25,39,52);
        }
        
        h4 {
            color: #ffbb2b;
        }
        
        ul {
            color: white;
            font-size: 13px;
        }
        .container{
            padding: 10px;
            font-size: 50px
        }
		.image{
            padding: 10px;
            right: 50px;
        }
        .wellfix
        {
            background: rgba(0,0,0);
            border: none;
            height: 220px;
        }

    </style>


</head>

<body>
    <div class = "image">
      <img src="logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-flU_id">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li class="active"><a href="User.php">login/Registration</a></li>
                    <li><a href="userRegister.php">User Registration</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="User.php?q=logout">
                            <button type="button">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
        
        
        $sql="SELECT * FROM UserName";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_array($result))
                {
                    if ($row['U_id'] == $U_id)
                    echo "
                            <div style = 'text-align:center' class='col-md-4 wellfix'>

                                <h4 style = 'font-size: 30px'>WellCome Back</h4>
                                <h4>".$row['U_fullname']."</h4>
                                <h4>Password: ".$row['U_password']."</h4>
                                <h4>email: ".$row['U_email']."</h4>
                                                          
                            </div>

                         "; //echo end  
                         $sq2="SELECT * FROM room_Magnolia";
                         $result1 = mysqli_query($user->db, $sq2);
                         
                         if($result1)
                         {
                             if(mysqli_num_rows($result1) > 0)
                             {
                 
                                 while($row1 = mysqli_fetch_array($result1))
                                 {
                                     if ($row1['name'] == $row['U_fullname']){

                                     echo "
                                     
                                             <div style = 'text-align:center' class='col-md-4 wellfix'>
                                          <h4>test:".$row['U_fullname']."</h4>
                                             <h4 style = 'font-size: 30px'>Your Booking at 'The Magnolia All Suites' </h4>
                                                 <h4>Room Number:".$row1['hotel_id']."</h4>
                                                 <h4>Check in date:".$row1['checkin']."</h4>
                                                 <h4>Check out date:".$row1['checkout']."</h4>
                                                 <h4>Room Size:".$row1['room_size']."</h4>
                                                
                                             </div>
                                            
                                          "; //echo end  
                                          
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
                         $sq3="SELECT * FROM room_townCentreRoom";
                         $result2 = mysqli_query($user->db, $sq3);
                         
                         if($result2)
                         {
                             if(mysqli_num_rows($result2) > 0)
                             {
                 
                                 while($row2 = mysqli_fetch_array($result2))
                                 {
                                     if ($row2['name'] == $row['U_fullname']){
                                     echo " 
                                             <div style = 'text-align:center' class='col-md-4 wellfix'>
                                             <h4>test:".$row['U_fullname']."</h4>
                                             <h4>test:".$row2['name']."</h4>
                                             <h4 style = 'font-size: 30px'>Your Booking at 'The Magnolia All Suites' </h4>
                                                 <h4>Room Number:".$row2['hotel_id']."</h4>
                                                 <h4>Check in date:".$row2['checkin']."</h4>
                                                 <h4>Check out date:".$row2['checkout']."</h4>
                                                 <h4>Room Size:".$row2['room_size']."</h4>
                                                
                                             </div>
                 
                                          "; //echo end  
                                          
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

    </div>

   

</body>

</html>