<?php
session_start();
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
    <title>LET'S BOOK IT</title>

    <!-- Bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href="./admin/css/room.css" rel="stylesheet">
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
      <img src="images/logo.jpeg" alt="logo" style="width:100px;height:100px;">
    </div>
  
    <div class="container">
        
        <?php $user->makeNavBar() ?>
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
                    <input class="form-control" type="float" pattern = "^\d{1,8}\.?\d{1,2}$" name="minPrice" placeholder = "ex:50.00">
                </div>
                <div class ="col-md-2">
                    <h6>Max Price</h6>
                    <input class="form-control" type="float" pattern = "^\d{1,8}\.?\d{1,2}*$" name="maxPrice" placeholder = "ex:200.00">
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
                        <input class="form-check-input" type="checkbox" id="spaCheckbox" value="spa" name="amenities[]">
                        <label class="form-check-label" for="spaCheckbox" style = "color:white;">Spa   </label>
                    
                        <input class="form-check-input" type="checkbox" id="poolCheckbox" value="pool" name="amenities[]">
                        <label class="form-check-label" for="poolCheckbox" style = "color:white;">Pool  </label>
                    
                        <input class="form-check-input" type="checkbox" id="gymCheckbox" value="gym" name="amenities[]">
                        <label class="form-check-label" for="gymCheckbox" style = "color:white;">Gym   </label>

                        <input class="form-check-input" type="checkbox" id="businessCheckbox" value="business_office" name="amenities[]">
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
        <hr>
    </form>
        <?php
        
        
        $sql="SELECT * FROM Hotel h ";
        $criteriaCnt = 0;
        if(isset($_REQUEST['submit'])){
            extract($_REQUEST);
            //use criteriaCnt to track how many critera the user has for the search in order to make a proper sql statement
            if($address = $_GET['address']){
                $sql .= "WHERE h.address = '$address' "; //no if checking here cause if address exists, its always first
                $criteriaCnt++;
            }
            if($minPrice = $_GET['minPrice']){
                if($criteriaCnt == 0){
                    $sql .= "WHERE EXISTS (SELECT * FROM Hotel_Rooms hr WHERE h.hotelID = hr.hotelID AND hr.rate > '$minPrice' ) ";
                }else{
                    $sql .= "AND EXISTS (SELECT * FROM Hotel_Rooms hr WHERE h.hotelID = hr.hotelID AND hr.rate > '$minPrice' ) ";
                }
                $criteriaCnt++;
            }
            if($maxPrice = $_GET['maxPrice']){
                if($criteriaCnt == 0){
                    $sql .= "WHERE EXISTS (SELECT * FROM Hotel_Rooms hr WHERE h.hotelID = hr.hotelID AND hr.rate < '$maxPrice' ) ";
                }else{
                    $sql .= "AND EXISTS (SELECT * FROM Hotel_Rooms hr WHERE h.hotelID = hr.hotelID AND hr.rate < '$maxPrice' ) ";
                }
                $criteriaCnt++;
            }
            
            //if both dates given, check availability of room types that meet other criteria
                //Couldn't figure out how to do this in the same query as the other stuff
                //Note: I only do something with date fields if both are filled in.
                if(!empty($_GET['start_dt']) && !empty($_GET['end_dt'])){
                    $startDate = $_GET['start_dt'];
                    $endDate = $_GET['end_dt'];
                    if($minPrice && $maxPrice){
                        $noAvail = $user->check_all_available($startDate, $endDate, $minPrice, $maxPrice);
                    }else if($minPrice){
                        $noAvail = $user->check_all_available($startDate, $endDate, $minPrice);
                    }else if($maxPrice){
                        $noAvail = $user->check_all_available($startDate, $endDate, 0, $maxPrice); //0 for min price is the default
                    }else{
                        $noAvail = $user->check_all_available($startDate, $endDate);
                    }
                    if($noAvail){
                        $noAvailSet = "";
                        for($i = 0; $i < count($noAvail); $i++){
                            $noAvailSet .= $noAvail[$i].", ";
                        }
                        $noAvailSet .= "-1"; //-1 to give a dummy value for syntax, I'm lazy
                        if($criteriaCnt == 0){
                            $sql .= "WHERE h.hotelID NOT IN ('$noAvailSet') ";
                        }else{
                            $sql .= "AND h.hotelID NOT IN ('$noAvailSet') ";
                        }
                        $criteriaCnt++;
                    }
                }

            if(!empty($_GET['amenities'])){
                $amenRequiredList = $_GET['amenities'];
                $amenRequiredCnt = 0;
                $amenRequired = "";
                foreach($amenRequiredList as $amen){
                    if($criteriaCnt == 0){
                        $sql .= "WHERE FIND_IN_SET('$amen', h.amenities) > 0 ";
                    }else{
                        $sql .= "AND FIND_IN_SET('$amen', h.amenities) > 0 ";
                    }
                    $criteriaCnt++;
                }    
            }

        }

        $result = mysqli_query($user->db, $sql);
        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
//               ********************************************** Show Room Category***********************
                while($row = mysqli_fetch_array($result))
                {
                    $hID = $row['hotelID'];
                    $amenities = strtr($row['amenities'], array("," => ", ")); //for formating purposes
                    $sql2 = "SELECT * FROM Hotel_Rooms hr
                             INNER JOIN Hotel h ON h.hotelID = hr.hotelID
                             WHERE hr.hotelID = '$hID'";
                    $result2 = mysqli_query($user->db, $sql2);

                    $weekDiff = (($row['weekend_diff'] - 1) * 100);
                   echo "
                            <div class='col-md-4 wellfix'>
                          
                                <h4>".$row['name']."</h4>
                                <h6>Location: ".$row['address']."</h6>
                                <h6>Amenities: ".$amenities."</h6>
                                <h6>Phone Number: ".$row['phone_num']."</h6>
                                <h6>Weekend Differential: ".$weekDiff." % nightly rate surcharge.</h6>
                                <h6>- ";
                    while($row2 = mysqli_fetch_array($result2)){
                        echo $row2["room_type"].": $".$row2["rate"]." - ";
                    }

                                echo "</h6>
                                <a href='booking.php?hotelName=".$row['name']."'><button>Book Now</button> </a>
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