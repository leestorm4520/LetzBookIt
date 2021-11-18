<?php
    include_once '../admin/include/class.user.php'; 
    $user=new User(); 
    $name=$_GET['name'];
    if(isset($_REQUEST[ 'submit'])) 
    { 
        extract($_REQUEST); 
        $result=$user->cancelCourtYard($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book);
        if($result)
        {
            echo "<script type='text/javascript'>
                  alert('".$result."');
             </script>";
             echo "
             <script type='text/javascript'>
                 window.location.href = '../index.php';
             </script>"; 
        }
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Let's BOOK IT</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/index.css">

    
</head>
<body>
    <div class = "image">
      <img src="../logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
       
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="../hotels.php">Hotels</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                    <li><a href="../Manager.php">login/Registration</a></li>
                    <li><a href="../admin/UserLogin.php">User Login</a></li>
                    <li><a href="../userRegister.php">User Registration</a></li>
                </ul>
            </div>
        </nav>
        <hr>
      
        <form action="" method="post" name="room_category">
            <div class="col-md-12 well" >
              <h4 style="color: #ffbb2b" >Click Confirm if you want to cancel "The Courtyard Suites"</h4><br>
              <button type="submit" class="btn btn-lg btn-primary button" name="submit">Confirm</button>
            </div>  
        </form>
        
    
        
    </div>
    
</body>

</html>