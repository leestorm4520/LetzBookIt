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
    
    <style>
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
    
        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 180px;
        }
		body
		{
			background: rgb(25,39,52);
		
		}
		p
		{
			font-size: 13px;
		}
        .pro_pic
        {
            border-radius: 50%;
            height: 60px;
            width: 50px;
            margin-bottom: 15px;
            margin-right: 15px;
        }
        .container{
            padding: 10px;
        }
		.image{
            padding: 10px;
            right: 50px;
        }
    </style>
    
</head>
<body>
    <div class = "image">
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
       
        <?php $user->makeNavBar() ?>
        <hr>
        <div class="row" style="color: green">
            <div class="col-md-4 wellfix">
              <h4><strong>Contact Us</strong></h4><hr>
              Address :
              1 UTSA Circle, San Antonio, TX 78249
              <br>
              University of Texas At San Antonio<br>
              Mail : LetzBookIt@gmail.com <br>
              Phone Number: (210) 123-4567
            </div>
        </div>
        
    </div>
    
</body>
</html>