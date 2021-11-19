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
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( ".datepicker" ).datepicker({
              dateFormat : 'yy-mm-dd'
            });
        } );
</script>
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
                    <li class="active"><a href="hotels.php"> Hotels </a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="Manager.php">Login</a></li>
                    <li><a href="userRegister.php">Customer Registration</a></li>
                </ul>
            </div>
        </nav>
        <hr>

    <form>
        <div class = "container">
            <h4>Filter by...</h4>
            <div class = "row">
                <div class = "col-md-3">
                    <h6>City</h6>
                    <input class="form-control" type="text" placeholder="City" name = "address">
                </div>
                <div class ="col-md-2">
                    <h6>Min Price</h6>
                    <input class="form-control" type="text" pattern = "^\d{1,8}$" name="minPrice">
                </div>
                <div class ="col-md-2">
                    <h6>Max Price</h6>
                    <input class="form-control" type="text" pattern = "^\d{1,8}$" name="maxPrice">
                </div>
            
                <div class ="col-md-2">
                    <h6>Start Date</h6>
                    <input class="datepicker" type="text" name="start_dt" style="width:165px;height:35px;"> 
                </div>
                <div class ="col-md-2">
                    <h6>End Date</h6>
                    <input class="datepicker" type="text" name="end_dt" style="width:165px;height:35px;">
                </div>
            </div>
            <div class = "row justify-content-between">
                <div class = "col-md-4">
                    <h6>Amenities</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="spaCheckbox" value="spa">
                        <label class="form-check-label" for="spaCheckbox" style = "color:white;">Spa   </label>
                    
                        <input class="form-check-input" type="checkbox" id="poolCheckbox" value="pool">
                        <label class="form-check-label" for="poolCheckbox" style = "color:white;">Pool  </label>
                    
                        <input class="form-check-input" type="checkbox" id="gymCheckbox" value="gym">
                        <label class="form-check-label" for="gymCheckbox" style = "color:white;">Gym   </label>

                        <input class="form-check-input" type="checkbox" id="businessCheckbox" value="business_office">
                        <label class="form-check-label" for="businessCheckbox" style = "color:white;">Business Office</label>
                    </div>
                </div>
                <div class = "col-md-5">
                </div>
                <div class = "col-md-3">
                    <h6>&nbsp;</h6>
                    <button type="submit" class="btn btn-lg btn-primary button" name="submit" style = "width:165px;">Search</button>
                </div>
            </div>
        </div>
    </form>
        <?php
        
        
        $sql="SELECT * FROM hotel";
        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                   
                    $weekDiff = (($row['weekend_diff'] - 1) * 100);
                   echo "
                            <div class='col-md-4 wellfix'>
                          
                                <h4>".$row['name']."</h4>
                                <h6>Location: ".$row['address']."</h6>
                                <h6>Aminities: ".$row['amenities']."</h6>
                                <h6>Phone Number: ".$row['phone_num']."</h6>
                                <h6>Weekend Differential: ".$weekDiff." % nightly rate surcharge.</h6>
                                <a href='hotels/hotelPage.php?hotelName=".$row['name']."'><button>Book Now</button> </a>
                                <h1></h1>                           
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