<?php session_start();
include_once 'admin/include/class.user.php';
$user=new User();
$U_id=$_SESSION[ 'userID']; 

if(!$user->get_session()) 
{ 
    header("location:login.php"); 
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
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
       
       
        <?php $user->makeNavBar();
        
        
        $sql="SELECT * FROM User WHERE User.userID = '$U_id'";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {

                while($row = mysqli_fetch_array($result))
                {   
                   
                    echo "
                            <div style = 'text-align:center' class='col-md-4 wellfix'>
                                
                                <h4 style = 'font-size: 30px'>Welcome Back</h4>
                                <h4>".$row['full_name']."</h4>
                                <h4>Password: ******** </h4>
                                <h4>email: ".$row['email']."</h4>
                                                          
                            </div>

                         "; //echo end  
                    
                         $sq2="SELECT h.name, hr.room_type, b.start_dt, b.end_dt FROM Booking b 
                                INNER JOIN Hotel_Rooms hr on hr.hrID = b.hrID
                                INNER JOIN Hotel h on h.hotelID = hr.hotelID
                                WHERE b.userID = '$U_id' "; /*or b.phone_num='$phone";*/
                         $result1 = mysqli_query($user->db, $sq2);
                         
                         if($result1)
                         {
                             if(mysqli_num_rows($result1) > 0)
                             {
                 
                                 while($row1 = mysqli_fetch_array($result1))
                                 {
                                     
                                            
                                     echo "
                                    
                                             <div style = 'text-align:center' class='col-md-4 wellfix'>
                                          
                                             <h4 style = 'font-size: 30px'>Your Booking at '".$row1['name']." </h4>
                                                 
                                                 <h4>Check in date:".$row1['start_dt']."</h4>
                                                 <h4>Check out date:".$row1['end_dt']."</h4>
                                                 <h4>Room Size:".$row1['room_type']."</h4>
                                                
                                             </div>
                                            
                                          ";
                                      //  <h4>Room Number:".$row1['hotel_id']."</h4>
                                     
                                    
                                                                           
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