<?php
    include "db_config.php";
        class user
        {
            public $db;
            public function __construct()
            {
                $this->db=new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,'hotel');
                if(mysqli_connect_errno())
                {
                    echo "Error: Could not connect to database.";
                    exit;
                }
            }
            public function reg_user($name, $username, $password, $email)
            {
               
                $sql="SELECT * FROM manager WHERE M_name='$username' OR M_email='$email'";
                $check=$this->db->query($sql);
                $count_row=$check->num_rows;
                if($count_row==0)
                {
                    $sql1="INSERT INTO manager SET M_name='$username', M_password='$password', M_fullname='$name', M_email='$email'";
                    $result= mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }
            
            public function addUser($name, $username, $password, $email)
            {
               
                $sql="SELECT * FROM UserName WHERE U_name='$username' OR U_email='$email'";
                $check=$this->db->query($sql);
                $count_row=$check->num_rows1;
                if($count_row==0)
                {
                    $sql2="INSERT INTO UserName SET U_name='$username', U_password='$password', U_fullname='$name', U_email='$email'";
                    $result= mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot inserted");
                    return $result;
                }
                else
                {
                    return false;
                }
            }

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
            
            public function check_available($checkin, $checkout)
            {
                
                
                   $sql="SELECT DISTINCT room_cat FROM rooms WHERE room_id NOT IN (SELECT DISTINCT room_id
                      FROM rooms WHERE (checkin <= '$checkin' AND checkout >='$checkout') OR (checkin >= '$checkin' AND checkin <='$checkout') OR (checkin <= '$checkin' AND checkout >='$checkin') )";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Query Doesnt run");;

                
                    return $check;
                

            }
            
            
            public function booknow($checkin, $checkout, $name, $phone,$bedType)
            {
                    
                    $sql="SELECT * FROM rooms WHERE room_cat='$bedType' AND (room_id NOT IN (SELECT DISTINCT room_id
                          FROM rooms WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data herecannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['room_id'];
                        
                        $sql2="UPDATE rooms  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE room_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
                    
                    
                
                    return $result;
                

            }


            public function book_Magnolia($checkin, $checkout, $name, $phone,$room_size,$U_id)
            {
                    
                    $sql="SELECT * FROM room_Magnolia WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_Magnolia WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data herecannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_Magnolia  SET checkin='$checkin', checkout='$checkout',U_id='$U_id', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }

            public function book_townCentre($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_townCentreRoom WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_townCentreRoom WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_townCentreRoom  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }

            public function book_parkNorth($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_parkNorthRoom WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_parkNorthRoom WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_parkNorthRoom  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }


            public function book_Rio($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_RioInn WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_RioInn WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_RioInn  SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }


            public function book_sunPalace($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_sunPalace WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_sunPalace WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_sunPalace SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }


            public function book_HomeAway($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_homeAwayInn WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_homeAwayInn WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_homeAwayInn SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }

            public function book_comfy($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_ComfyMotel WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_ComfyMotel WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_ComfyMotel SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }


            public function book_courtYard($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_Courtyard WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_Courtyard WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_Courtyard SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }


            public function book_regency($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_Regency WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_Regency WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_Regency SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }



            public function book_townInn($checkin, $checkout, $name, $phone,$room_size)
            {
                    
                    $sql="SELECT * FROM room_TownInnBudget WHERE room_size='$room_size' AND (hotel_id NOT IN (SELECT DISTINCT hotel_id
                          FROM room_TownInnBudget WHERE checkin <= '$checkin' AND checkout >='$checkout'))";
                    $check= mysqli_query($this->db,$sql)  or die(mysqli_connect_errno()."Data here cannot inserted");;
                 
                    if(mysqli_num_rows($check) > 0)
                    {
                        $row = mysqli_fetch_array($check);
                        $id=$row['hotel_id'];
                        
                        $sql2="UPDATE room_TownInnBudget SET checkin='$checkin', checkout='$checkout', name='$name', phone='$phone', book='true' WHERE hotel_id=$id";
                         $send=mysqli_query($this->db,$sql2);
                        if($send)
                        {
                            $result="Your Room has been booked!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error";
                        }
                    }
                    else                       
                    {
                        $result = "No Room Is Available";
                    }
              
                    return $result;
            }



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
                            $result="Sorry, Internal Error";
                        }
                    
                
                    return $result;

            }

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
                            $result="Sorry, Internal Error";
                        }
  
                    
                
                    return $result;
                

            }
          


            public function cancelRoomMagnolia($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {

                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_Magnolia  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }
            public function cancelRoomParkNorth($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_parkNorthRoom  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }
            public function cancelTownCentre($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_townCentreRoom  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }

            public function cancelHomeAway($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_homeAwayInn  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }

            public function cancelRio($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_RioInn  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }
            
            public function cancelSunPalace($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_sunPalace  SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }

            public function cancelComfy($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_ComfyMotel SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internal Error my error";
                        }

                    return $result;
                
            }
            public function cancelCourtYard($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_Courtyard SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error my error";
                        }

                    return $result;
                
            }
            public function cancelRegency($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_Regency SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error my error";
                        }

                    return $result;
                
            }
            public function cancelTownInn($hotel_id, $room_size, $checkin, $checkout, $U_id ,$name, $phone, $price,$book)
            {                           
                        $book = 'false';
                        $checkin = '0000-00-00';
                        $checkout = '0000-00-00';
                 
                        $sql="UPDATE room_TownInnBudget SET checkin='$checkin', checkout='$checkout', name='', phone='$phone', book='$book' WHERE name='$name'";
                         $send=mysqli_query($this->db,$sql);
                        if($send)
                        {
                            $result="The Booking has been cancelled Successfully!!";
                        }
                        else
                        {
                            $result="Sorry, Internel Error my error";
                        }

                    return $result;
                
            }

            public function check_login($emailusername,$password)
            {
                $sql2="SELECT M_id from manager WHERE M_email='$emailusername' OR M_name='$emailusername' and M_password='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['M_id']=$user_data['M_id'];
                    return true;    
                }
                else
                {
                    return false;
                }
            }

            public function checkUserlogin($emailusername,$password)
            {
                $sql2="SELECT U_id from UserName WHERE U_email='$emailusername' OR U_name='$emailusername' and U_password='$password'";
                $result=mysqli_query($this->db,$sql2);
                $user_data=mysqli_fetch_array($result);
                $count_row=$result->num_rows;
                
                if($count_row==1)
                {
                    $_SESSION['login']=true;
                    $_SESSION['U_id']=$user_data['U_id'];
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
                session_destroy();
            }

            
        }

?>