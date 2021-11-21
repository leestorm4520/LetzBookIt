<?php 
    session_start();
    include_once 'admin/include/class.user.php'; 
    $user=new User(); //We could probably stop creating a new user on every page with $_SESSION, but code works for now
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
    
</head>
<body>
    <div class = "image">
      <img src="./images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
       
        <?php $user->makeNavBar()?>
        <hr>
        <div class="row" style="color: green">
            <div class="col-md-12 well" >
              <h4 style="color: #ffbb2b" >Welcome to let's BOOK IT</h4><br>
              <p>Let's BOOK IT is a place where you may pay to stay for a brief period of time. Inside a hotel room, amenities can range from a low-cost mattress in a tiny room to enormous suites with larger, higher-quality mattresses, a dresser, a refrigerator and other kitchen appliances, cushioned chairs, a flat-screen television, and en-suite bathrooms. Smaller, lower-cost hotels may only provide the most minimal services and amenities to its guests.</p>
   
            </div>  
        </div>
        <div>
      <img src="./images/roomPics.jpg" alt="pic" style="width:100%;height:400px;">
    </div>
        
    </div>
    
</body>
</html>