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

            public function roomAvailable($room)
            {
               
                $sql="SELECT * FROM room_sunPalace;
                $check=$this->db->query($sql);
                if($result)
                    {
                       if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_array($result)){

                                    if ($row['book'] == true)
                                    x = 0;
                                     x = x + 1;
                                    $room = $room - x;
                                }

                            }

                    }
                    return $room;
            }
        }

?>