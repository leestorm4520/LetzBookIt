<?php
include_once 'include/class.user.php'; 
$user=new User(); 

$room_cat=$_GET['bedType'];

$sql="SELECT * FROM room_category WHERE bedType='$room_cat'";
$query=mysqli_query($user->db, $sql);
$row = mysqli_fetch_array($query);
 

if(isset($_REQUEST[ 'submit'])) 
{ 
    extract($_REQUEST); 
    $result=$user->edit_room_cat($bedType, $roomAmount, $bed_num,$Amenities,$price,$room_cat);
    if($result)
    {
        echo "<script type='text/javascript'>
              alert('".$result."');
         </script>";
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
    <link rel="stylesheet" href="../admin/css/editRoom.css">
    
</head>

<body>
    <div class="container">
        <div class="well">
            <h2>Add Room Category</h2>
            <hr>
            <form action="" method="post" name="room_category">
                <div class="form-group">
                    <label for="bedType">Room Type Name:</label>
                    <input type="text" class="form-control" name="bedType" value="<?php echo $row['bedType'] ?>" required>
                </div>
                 <div class="form-group">
                    <label for="qty">No of Rooms:</label>&nbsp;
                    <select name="roomAmount">
                    <option value="<?php echo $row['roomAmount'] ?>"><?php echo $row['roomAmount'] ?></option>
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
                    <label for="Amenities">Amenities</label>
                    <textarea class="form-control" rows="5" name="Amenities"><?php echo $row['Amenities'] ?></textarea>
                </div>
               <div class="form-group">
                    <label for="price">Price Per Night:</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price'] ?>" required>
                </div>
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Update</button>

               <br>
                <div id="click_here">
                    <a href="../Manager.php">Back to Home</a>
                </div>


            </form>
        </div>
    </div>

</body>

</html>