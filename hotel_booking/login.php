<?php session_start();
include_once 'admin/include/class.user.php'; $user=new User(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>LETS BOOK IT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css" type="text/css">

    <script language="javascript" type="text/javascript">
        function submitlogin() {
            var form = document.login;
            if (form.emailusername.value == "") {
                alert("Enter email or username.");
                return false;
            } else if (form.password.value =="" ) {
                alert("Enter Password.");
                return false;
            }
        }
    </script>
</head>
<style>
    .jumbotron
{
            max-width: 375px;
            padding: 15px;
            margin: 0 auto;
            color: #1a1a1a;
            margin-top: 40px;
    
}
body
		{
			background: rgb(25,39,52);
		
		}
h2
{
    text-align: center;
}

#new_user
{
    margin-top: 10px;
    text-align: center;
}


p
{
    text-decoration-color: red;
}
.container{
            padding: 10px;
        }
		.image{
            padding: 10px;
            right: 50px;
        }
</style>
<body>
<div class = "image">
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>

    <div class="container">
       
        <?php $user->makeNavBar()?>
        <hr>
        <div class="jumbotron">
            <h2>Login</h2>
            <hr>
            <form action="" method="post" name="login">
                <div class="form-group">
                    <input type="text" placeholder="Enter Username or Email" name="emailusername"  required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Enter Password" name="password" required>
                </div>
               
                <p id="wrong_id" style=" color:red; font-size:12px; "></p>


                <button type="submit" name="submit" value="Login" onclick="retrun(submitlogin());" class="btn btn-lg btn-primary btn-block">Submit</button>
                
                <br>
                <p style="font-size: 14px;"><a href="index.php">Back To Home</a></p>
                
                <?php if(isset($_REQUEST[ 'submit'])) { extract($_REQUEST); $login=$user->checkUserLogin($emailusername, $password); 
                    if($login) { 
                        if(strcmp($_SESSION['userPerms'], 'manager') == 0){
                            echo "<script type='text/javascript'>
                                alert('You have logged in as a Manager Successfully!!');
                            </script>
                                <script>location='managerMenu.php'</script>"; 
                        }
                        else{
                            echo" <script type='text/javascript'>
                                alert('You have logged in as a Customer Successfully!!');
                            </script>
                            <script>location='customerMenu.php'</script>";
                        } 
                    }
                    else{?>

                <script type="text/javascript">
                    document.getElementById("wrong_id").innerHTML = "Wrong username or password";
                </script>

                <?php } }?>

            </form>
        </div>
    </div>

</body>

</html>