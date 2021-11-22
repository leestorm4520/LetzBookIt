<?php
session_start();
include_once 'admin/include/class.user.php'; 
$user=new User(); 
if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $register=$user->addUser($fullname, $uname, $upass, $uemail, $phone, 'customer'); 
    if($register) 
    { 
        echo "
                <script type='text/javascript'>
                    alert('Your User has been Added Successfully');
                </script>"; 
        $user->checkUserLogin($uname, $upass);
        echo "
                <script type='text/javascript'>
                    window.location.href = 'index.php';
                </script>"; 
    } 
    else 
    {
        echo "
                <script type='text/javascript'>
                    alert('Registration failed! username or email already exists');
        </script>";
    }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LET'S BOOK IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <script language="javascript" type="text/javascript">
        function submitreg() {
            var form = document.reg;
            if (form.name.value == "") {
                alert("Enter Name.");
                return false;
            } else if (form.uname.value == "") {
                alert("Enter username.");
                return false;
            } else if (form.upass.value == "") {
                alert("Enter Password.");
                return false;
            } else if (form.uemail.value == "") {
                alert("Enter email.");
                return false;
            }
        }
    </script>

<style>
    
    body {
        background: rgb(25,39,52);
    }

    h2 {
    text-align: center;
    color: black;
    }

    #click_here {
    margin-top: 10px;
    text-align: center;
    
    }

    .container
    {
        padding: 10px;
    }

   
    .button
    {
    
    width: 100px;
    float: center;
    font-size: 13px;
    
    }
    .well
        {
            width: 500px;
        }
  </style>
</head>

<body>
<div class = "image">
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    <div class="container">
        <?php $user->makeNavBar()?>
        <hr>

        <div class="well">
            <h2>Fill out your Profile</h2>
            <hr>
            <form action="" method="post" name="reg">
            <div class="form-group"> 
                   <input placeholder ="Enter First and Last Name (eg. John Smith)" type="text" class="form-control" name="fullname" pattern ="^[A-Za-z]+\s[A-Za-z]+$" required>
               </div>
                <div class="form-group">        
                    <input type="text" class="form-control" name="uname" placeholder="Enter User Name (at least 8 characters)" minlength="8" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="uemail" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="upass" placeholder="Enter your password (at least 8 characters)" minlength="8" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number (XXX-XXX-XXXX)" required> 
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit"  onclick="return(submitreg());">Submit</button>

               <br>
                <div id="click_here">
                    <a href="index.php">Back to HOME</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>