<?php
include_once 'include/class.user.php'; 
$user=new User(); 
 

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $result=$user->add_room($roomname, $room_qnty, $no_bed, $bedtype,$facility,$price);
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('Room Added Succesfully');
         </script>";
    }
    else
    {
         echo $result;
    }
   
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reg.css" type="text/css">    
</head>

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
    margin-top: 10px;
}

label
{
    color:black;
    font-size: 13px;
    font-weight: 100;
}

.button
{
    
    width: 100px;
    float: right;
    font-size: 13px;
    
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
      <img src="../logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
    
    <div class="container">
       
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../room.php">Room</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                    <li><a href="../Manager.php">login/Registration</a></li>
                </ul>
            </div>
        </nav>
        <hr>
        <div class="well">
            <h2>Add More Room</h2>
            <hr>
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="roomname">Room SIZE:</label>
                    <input type="text" class="form-control" name="roomname" placeholder="KING or QUEEN or FULL" required>
                </div>
                 <div class="form-group">
                    <label for="qty">Add Rooms:</label>&nbsp;
                    <select name="room_qnty">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                       <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bed">Number of Bed:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <select name="no_bed">
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Facility">Amenities</label>
                    <textarea class="form-control" rows="5" name="facility" placeholder="example: wifi, TV, food etc..."></textarea>
                </div>
               <div class="form-group">
                    <label for="price">Price Per Night:</label>
                    <input type="text" class="form-control" name="price" placeholder="200 or 300 ..."required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit" value="Add Room">Add</button>

               <br>
                <div id="click_here">
                    <a href="../index.php">Back to Home</a>
                </div>


            </form>
        
        </div>
    </div>
</body>

</html>