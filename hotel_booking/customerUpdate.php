<?php
session_start();
include_once 'admin/include/class.user.php'; 
$user=new User();

if(!$user->get_session()) 
{ 
    header("location:login.php"); 
} 

if(isset($_POST['submit'])){

    $new_name = $_POST['fullname'];
    $new_email = $_POST['uemail'];
    $new_phone = $_POST['phone'];
} 

$userID = $_SESSION['userID'];
$sql = "SELECT * FROM User WHERE User.userID = '$userID'";
$result = mysqli_query($user->db, $sql);
if($result){
    while($row = mysqli_fetch_array($result)){ //Why did I make this a loop???
        $name = $row['full_name'];
        $email = $row['email'];
        $phone = $row['phone_num'];
        $username = $row['username'];
        $old_pass = $row['password'];
    }
}else{
    echo "Cannot connect to database";
}

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    if($new_pass){
        $register=$user->updateUser($new_name, $userID, $new_email, $new_phone, $new_pass);
    }else{
        $register=$user->updateUser($new_name, $userID, $new_email, $new_phone);
    } 
    if($register) 
    { 
        echo "
                <script type='text/javascript'>
                    alert('Your profile has been successfully updated');
                </script>"; 
        echo "
                <script type='text/javascript'>
                    window.location.href = 'customerMenu.php';
                </script>"; 
    } 
    else 
    {
        echo "
                <script type='text/javascript'>
                    alert('Update Failed! Please try again later');
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
                alert("Enter Password to confirm changes.");
                return false;
            } else if (form.uemail.value == "") {
                alert("Enter email.");
                return false;
            }else if (form.new_pass.value != ""){
                if(form.new_pass.value == <?php echo $old_pass?>){
                    alert("New password cannot be old password.");
                    return false;
                }
            }else if(form.upass.value != <?php echo $old_pass?>){
                alert("incorrect password.");
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
            <h2>Change the information you wish to update</h2>
            <hr>
            <form action="" method="post" name="reg">
            <div class="form-group"> 
                   <input placeholder ="Enter First and Last Name (eg. John Smith)" type="text" class="form-control" name="fullname" pattern ="^[A-Za-z]+\s[A-Za-z]+$" required value = "<?php echo $name?>">
               </div>
                <div class="form-group">        
                    <input type="text" class="form-control" name="uname" placeholder="Enter User Name (at least 8 characters)" minlength="8" required value = "<?php echo $username?>" disabled>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="uemail" placeholder="Enter your Email" required value = "<?php echo $email?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="upass" placeholder="Enter your OLD password (at least 8 characters)" minlength="8" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="new_pass" placeholder="Enter your NEW password (at least 8 characters)" minlength="8">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone" placeholder="Enter your phone number (XXX-XXX-XXXX)" required value = "<?php echo $phone?>">
                </div> 
                <button type="submit" class="btn btn-lg btn-primary button" name="submit"  onclick="return(submitreg());">Submit</button>

               <br>
                <div id="click_here">
                    <a href="customerMenu.php">Back to Profile</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>