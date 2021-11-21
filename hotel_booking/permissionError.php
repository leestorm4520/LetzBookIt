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
              <h4 style="color: #ffbb2b" >Permission Error</h4><br>
              <p>We're sorry. You are either not logged in or do not have the permissions required for the requested page. Please login to a manager account to access the requested page.</p>
   
            </div>  
        </div>
        
    </div>
    
</body>
</html>