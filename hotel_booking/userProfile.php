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
                   <li><a href="hotels.php">Hotels</a></li>
                   <li><a href="contact.php">Contact</a></li>
                   <li class="active"><a href="userProfile.php">Login</a></li>
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
        
        <?php
        
        
        $sql="SELECT * FROM User";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    
                    echo "
                            <div class='col-md-4 wellfix'>
                          
                                <h4>".$row['userID']."</h4>
                                <h6>Full Name: ".$row['full_name']." </h6>
                                <h6>Email: ".$row['email']."</h6>
                                <h6>Password: ".$row['password']." </h6>
                                <hr>
                            
                            </div>

                         "; //echo end                                      
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