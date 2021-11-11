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
    <title>LETS BOOK IT</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

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
        
        ul {
            color: white;
            font-size: 13px;
        }
        .container{
            padding: 10px;
            font-size: 15px
        }
		.image{
            padding: 10px;
            right: 50px;
        }
        .wellfix
        {
            background: rgba(0,0,0);
            border: none;
            height: 320px;
        }

    </style>


</head>

<body>
    <div class = "image">
      <img src="logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-flM_id">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="hotels.php">Hotels</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li class="active"><a href="Manager.php">login/Registration</a></li>
                    <li><a href="userRegister.php">User Registration</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Manager.php?q=logout">
                            <button type="button">Logout</button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class = "wellfix">
             <div class = "control" style="text-align: center; padding = 40px; margin: 30px;">
           
                 <h1 style="color:white">Maneger Control Room</h4>
                 <hr>
                  <div style="text-align: center; padding = 40px; margin: 30px;">
                <ul>
                    <a href="show_room_cat.php">Show All Room</a>
                </ul>
                <ul>
                    <a href="userProfile.php">Show all User Profiles</a>
                </ul>
                <ul>
                    <a href="hotels.php">Book Hotels</a>
                 </ul>
                <ul>
                    <a href="show_all_room.php">Show All Booked Rooms</a>
                </ul>
                <ul>
                    <a href="admin/registration.php">Add Another Manager</a>
                </ul>
            </div>
            
        </div>
    </div>

    </div>

   

</body>

</html>