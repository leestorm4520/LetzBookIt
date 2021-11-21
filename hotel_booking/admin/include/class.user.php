<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotel_new');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }
            
            //adds a user to the database with the given attributes.
            public function addUser($name, $username, $password, $email, $phone, $perms)
            {
               
                $sql="SELECT * FROM User WHERE username='$username' OR email='$email'";
                $check= mysqli_query($this->db, $sql);
                if(mysqli_num_rows($check) == 0)
                {
                    $sql2="INSERT INTO User SET username='$username', password='$password', full_name='$name', email='$email', phone_num='$phone', permissions='$perms'";
                    $result= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }

            //legacy code?
            public function add_room($bedType, $room_qnty, $no_bed, $bedtype,$facility,$price)
            {
                
                    $available=$room_qnty;
                    $booked=0;
                    
                    $sql="INSERT INTO room_category SET bedType='$bedType', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price'";
                    $result= mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
                
                
                    for($i=0;$i<$room_qnty;$i++)
                    {
                        $sql2="INSERT INTO rooms SET room_cat='$bedType', book='false'";
                        mysqli_query($this->db,$sql2);
                        
                    }
                
                    return $result;
                

            }
            
            //checks the availability of a room type.
            //A room type is available to be booked if the number of books for that specific room type associated to the given hotel has not reached the maximum 
            //amount of rooms of that type for the entirety of the given timeframe. (Meaning no room transfers)
            public function check_available($checkin, $checkout, $roomTypeID)
            {
                
                
                   $sql="SELECT count(b.bookingID) from Booking b
                         WHERE b.hrID = '$roomTypeID' AND b.start_dt <= '$checkout' AND b.end_dt >= '$checkin' ";
                    $check= mysqli_query($this->db,$sql); 
                    $row = mysqli_fetch_array($check);

                    $sql2="SELECT * FROM Hotel_Rooms hr WHERE hr.hrID = '$roomTypeID'";
                    $result2= mysqli_query($this->db, $sql2);
                    $row2= mysqli_fetch_array($result2);

                    if($row['count(b.bookingID)'] < $row2['total_num']){
                        return true;
                    }
                    return false;
            }

            //this function will check all hotels for any available rooms
            //the option arguments for rate are to ensure no false positives on searches when search by price range
            //returns an array containing the hotelID's that do not have avaiable rooms with the given conditions 
            public function check_all_available($checkin, $checkout, $minRate = 0, $maxRate = 1000000000){
                    
                    $retRay = array();
                    $hasNoAvail = true;
                    $sqlHotel = "SELECT * FROM Hotel";
                    $hotelResult = mysqli_query($this->db, $sqlHotel);
                    while($hotelRow = mysqli_fetch_array($hotelResult)){

                        $hotelID = $hotelRow['hotelID'];
                        $sqlhr = "SELECT * FROM Hotel_Rooms hr 
                                  WHERE hr.hotelID = '$hotelID'
                                  AND hr.rate > '$minRate' AND hr.rate < '$maxRate'";
                        $hrResult = mysqli_query($this->db, $sqlhr);
                        while($hrRow = mysqli_fetch_array($hrResult)){

                            $hrID = $hrRow['hrID'];
                            $sql="SELECT count(b.bookingID) from Booking b
                                  WHERE b.hrID = '$hrID' AND b.start_dt <= '$checkout' AND b.end_dt >= '$checkin' ";
                            $check= mysqli_query($this->db,$sql);  
                            $row = mysqli_fetch_array($check);

                            if($row['count(b.bookingID)'] < $hrRow['total_num']){
                                $hasNoAvail = false;
                            }
                        }
                        if($hasNoAvail){
                            $retRay[] = $hotelRow['hotelID']; 
                        }
                        $hasNoAvail = true;
                    }
                    return $retRay;
            }
            
            
            public function makeBooking($checkin, $checkout, $name, $phone, $roomTypeID)
            {
                if($checkin > $checkout){
                    return "Error: Starting date is after end date.";
                }
                    if($this->check_available($checkin, $checkout, $roomTypeID))
                    {   
                        $sql="INSERT INTO Booking SET start_dt='$checkin', end_dt='$checkout', name='$name', phone_num='$phone', hrID = '$roomTypeID', email = 'foobar', party_size = -1";
                        $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                    
                    return $result;
            }

            //legacy code?
             public function edit_all_room($checkin, $checkout, $name, $phone,$id)
            {
                                
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
                    
                
                    return $result;

            }

            public function addHotel($name, $address, $phone, $weekend_dif, $favorite)
            {
                   
                $sql="INSERT INTO Hotel SET name='$name', address='$address', phone_num='$phone', weekend_diff='$weekend_dif', amenities = '$favorite'";
                $send=mysqli_query($this->db,$sql);
                if($send)
                {
                    $result="Your Hotel has been added!!";
                }
                else
                {
                    $result="Sorry, Internel Error";
                }

                return $result;

            }

            public function addHotelRoom($room_type, $rate, $total_num, $hotelName){
                $sq2="SELECT * FROM Hotel WHERE Hotel.name = '$hotelName'";
                $result=mysqli_query($this->db,$sq2);
                if ($result){
                    if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_array($result)){
                            $ID  = $data['hotelID'];
                            if ($ID )
                            echo "<script type='text/javascript'>
                                     alert('".$ID."');
                                     </script>";

                        }

                    }


                }
                
                $sql="INSERT INTO Hotel_Rooms SET hotelID = '$ID',room_type='$room_type', rate='$rate', total_num='$total_num'";
                $send=mysqli_query($this->db,$sql);
                if($send)
                {
                    $result="Your Hotel Rooms has been added!!";
                }
                else
                {   echo "<script type='text/javascript'>
                    alert('".$room_type."');
               </script>";
                    
                    $result="Sorry, Internel Error";
                }

                return $result;

            }


            //legacy code
             public function edit_room_cat($bedType, $room_qnty, $no_bed, $bedtype,$facility,$price,$room_cat)
            {
                    
                 
                        $sql2="DELETE FROM rooms WHERE room_cat='$room_cat'";
                        mysqli_query($this->db,$sql2);
                 
                 
                        for($i=0;$i<$room_qnty;$i++)
                        {
                            $sql3="INSERT INTO rooms SET room_cat='$bedType', book='false'";
                            mysqli_query($this->db,$sql3);

                        }

                 
                        $available=$room_qnty;
                        $booked=0;
                 
                        $sql="UPDATE room_category  SET bedType='$bedType', available='$available', booked='$booked', room_qnty='$room_qnty', no_bed='$no_bed', bedtype='$bedtype', facility='$facility', price='$price' WHERE bedType='$room_cat'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="Updated Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error";
                        }
  
                    
                
                    return $result;
                

            }
          
            //Deletes the specific booking from the database. Would need some check somewhere to not deleted bookings that have already been finished (ie past bookings)
            public function cancelBooking($bookingID){
                $sql ="DELETE FROM Booking WHERE Booking.bookingID = '$bookingID'";
                $result = mysqli_query($this->db, $sql);
                if($result)
                {
                     $retVal="Updated Successfully!!";
                }
               else
                {
                    $retVal="Sorry, Internel Error";
                }
                return $retVal;
            }

            public function checkUserlogin($emailusername,$password)
            {
                $sql2="SELECT * from User WHERE email='$emailusername' OR username='$emailusername' AND password='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['userID']=$user_data['userID'];
                    $_SESSION['userPerms']=$user_data['permissions'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function get_session()
            {
                return $_SESSION['login'];
            }
            public function user_logout()
            {
                $_SESSION['login']=false;
                $_SESSION['userID']=NULL;
                session_destroy();
            }

            //makes the navbar seen on every page using user information (or lack thereof) from the session
            //the isOneFolderDeep parameter is used for files in subdirectories.
            public function makeNavBar($isOneFolderDeep = false){
                
                echo "<nav class='navbar navbar-inverse'>
                        <div class='container-fluid'>
                            <ul class='nav navbar-nav'>";

                //function called from a file in a sub-Directory            
                if($isOneFolderDeep){ 
                    echo "
                            <li><a href='../index.php'>Home</a></li>
                            <li><a href='../searching.php'>Search</a></li>
                            <li><a href='../contact.php'>Contact</a></li>";
                    if(isset($_SESSION['userID'])){
                        echo "<li><a href='../customerMenu.php'>Profile</a></li>";
                        if(strcmp($_SESSION['userPerms'],'manager') == 0){
                            echo "<li><a href='../managerMenu.php'>Manage</a></li>";
                        }
                        echo "</ul>
                            <ul class='nav navbar-nav navbar-right'>
                                <li>
                                    <a href='../customerMenu.php?q=logout'>
                                        <button class = 'btn btn-primary' type='button'>Sign Out</button>
                                    </a>
                                </li>";
                    }else{
                            echo "<li><a href='../login.php'>Login</a></li>
                                <li><a href='../customerRegistration.php'>Customer Registration</a></li>";
                    }
                }

                //Function called from a file not withing a sub-Directory
                else{ 
                    echo "
                                <li><a href='index.php'>Home</a></li>
                                <li><a href='searching.php'>Search</a></li>
                                <li><a href='contact.php'>Contact</a></li>";
                    if(isset($_SESSION['userID'])){
                        echo "<li><a href='customerMenu.php'>Profile</a></li>";
                        if(strcmp($_SESSION['userPerms'],'manager') == 0){
                            echo "<li><a href='managerMenu.php'>Manage</a></li>";
                        }
                        echo "</ul>
                              <ul class='nav navbar-nav navbar-right'>
                                <li>
                                    <a href='customerMenu.php?q=logout'>
                                        <button class = 'btn btn-primary' type='button'>Sign Out</button>
                                    </a>
                                </li>";
                    }else{
                               echo "<li><a href='login.php'>Login</a></li>
                                <li><a href='customerRegistration.php'>Customer Registration</a></li>";
                    }
                      
                }
                echo  "</ul>
                        </div>
                    </nav>";
            }

            
        }

?>