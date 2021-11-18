
CREATE TABLE `manager` (
  `M_id` int(20) NOT NULL,
  `M_name` varchar(30) NOT NULL,
  `M_password` varchar(30) NOT NULL,
  `M_fullname` varchar(100) NOT NULL,
  `M_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `manager` (`M_id`, `M_name`, `M_password`, `M_fullname`, `M_email`) VALUES
(1, 'tuan', '1234', 'tuan Nguyen', 'tuanNguyen@gmail.com'),
(2, 'tom', 'tom123', 'tom Johnson', 'tomJohnson@gmail.com'),
(3, 'jessy', '1234', 'jessy henson', 'admin@admin.com');

CREATE TABLE `UserName` (
  `U_id` int(20) NOT NULL,
  `U_name` varchar(30) NOT NULL,
  `U_password` varchar(30) NOT NULL,
  `U_fullname` varchar(100) NOT NULL,
  `U_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `UserName` (`U_id`, `U_name`, `U_password`, `U_fullname`, `U_email`) VALUES
(1, 'tuan', '4321', 'tuan Nguyen', 'Nguyen@gmail.com'),
(2, 'John', '123', 'john kolh', 'Johnson@gmail.com'),
(3, 'kevin', '5432', 'kevin lamar', 'kevin@gmail.com');


CREATE TABLE `room_Magnolia` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_Magnolia` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '2021-05-19', '2021-05-22',0, 'lee Nguyen', '124-243-6421',150, 'true'),
(113, 'QUEEN SIZE', '2021-05-19', '2021-05-22',0, 'John Nguyen', '124-342-6421',150, 'true'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'tuan Nguyen', '124-432-6421',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '2021-05-19', '2021-05-22',0, 'amie Nguyen', '124-432-4231',100, 'true'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');




CREATE TABLE `room_townCentreRoom` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

INSERT INTO `room_townCentreRoom` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'kevin lamar', '152-458-7558',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');


CREATE TABLE `room_parkNorthRoom` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_parkNorthRoom` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'john kolh', '152-458-7558',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');

CREATE TABLE `room_homeAwayInn` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_homeAwayInn` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(114, 'STANDARD SIZE', '2021-05-19', '2021-05-22',0, 'lucy keith', '542-125-4555',250, 'true'),
(115, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(116, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');

CREATE TABLE `room_RioInn` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_RioInn` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'henry thomas', '125-321-2312',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');

CREATE TABLE `room_sunPalace` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_sunPalace` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'bob baby', '123-422-1232',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');


CREATE TABLE `room_ComfyMotel` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_ComfyMotel` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'kenny john', '887-123-1232',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');

CREATE TABLE `room_Courtyard` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_Courtyard` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'susan anna', '213-451-4433',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');


CREATE TABLE `room_Regency` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_Regency` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'quyen pham', '643-523-2555',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');


CREATE TABLE `room_TownInnBudget` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `U_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_TownInnBudget` (`hotel_id`, `room_size`, `checkin`, `checkout`,`U_id`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00',0, '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22',0, 'david nguyen', '452-566-2452',250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00',0, '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00',0, '', 0,100, 'false');

CREATE TABLE `room_category` (
  `bedType` text NOT NULL,
  `roomAmount` int(11) NOT NULL,
  `Room_available` int(11) NOT NULL,
  `Room_booked` int(11) NOT NULL,
  `bed_num` int(11) NOT NULL,
  `Amenities` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `room_category` (`bedType`, `roomAmount`, `Room_available`, `Room_booked`, `bed_num`, `Amenities`, `price`) VALUES

('TWIN SIZE', 5, 5, 0, 2,'TV, Cable, Internet, pool, free Parking', 100),
('TWINXL SIZE', 5, 5, 0, 2,'TV, Cable, Internet, pool, free Parking', 125),
('FULL SIZE', 5, 5, 0, 2,'TV, Cable, Internet, pool, free Parking', 150),
('QUEEN SIZE', 5, 5, 0, 1,'laundry, TV, Internet, pool, free Parking, free breakfast and lunch, gym', 175),
('KING SIZE', 5, 5, 0, 1,'laundry, TV, Internet, pool, free Parking, free breakfast and lunch, gym', 300),
('CAL KING SIZE', 5, 5, 0, 1,'laundry, TV, Internet, pool, free Parking, free breakfast and lunch, gym', 350);



CREATE TABLE `hotelList` (
  `hotel_id` int(11) NOT NULL,
  `hotels` text NOT NULL,
  `pickRoomWeb` text NOT NULL,
  `room1` text NOT NULL,
  `room2` text NOT NULL,
  `room3` text NOT NULL,
  `websiteDirect` text NOT NULL,
  `hotelAmenities` text NOT NULL,
  `standard_price` int(11) NOT NULL,
  `queen_price` int(11) NOT NULL,
  `king_price` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `Surcharge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotelList` (`hotel_id`,`hotels`,`pickRoomWeb`,`room1`,`room2`,`room3`,`websiteDirect`, `hotelAmenities`,`standard_price`,`queen_price`,`king_price`, `room_num`, `surcharge`) VALUES

(1,'The Magnolia All Suites','MagnoliaRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheMagnoliaAllSuites','Pool, Gym, Spa, Business Office',100,150,250,20,25),
(2,'The Lofts at Town Centre','townCentreRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheLoftsatTownCentre','Pool, Gym, Business Office',105 , 120 , 190 ,60, 35),
(3,'Park North Hotel','parkNorthRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','ParkNorthHotel','Pool, Gym',50 , 75 , 90 ,100,15),
(4,'The Courtyard Suites','courtyardRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheCourtyardSuites','Pool, Gym, Spa, Business Office',100 , 150 , 250 ,20, 25),
(5,'The Regency Rooms','regencyRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheRegencyRooms','Pool, Gym, Spa, Business Office',100 , 150 , 250 ,20,25),
(6,'Town Inn Budget Rooms','townInnRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TownInnBudgetRooms','Pool',25 , 50 , 60 ,150, 15),
(7,'The Comfy Motel Place','comfyMotelRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheComfyMotelPlace','n/a',30 , 50 , 0,50, 10),
(8,'Sun Palace Inn','sunPalaceRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','SunPalaceInn','Pool, Gym',40 , 60 , 80 ,50, 25),
(9,'HomeAway Inn','homeAwayRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','HomeAwayInn','Pool, Business Office',50 , 0 , 0 ,30, 25),
(10,'Rio Inn','RioInnRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','rioInnRoom','Pool',25 , 55 , 89 ,50, 20);





ALTER TABLE `room_Magnolia`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_townCentreRoom`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_parkNorthRoom`
  ADD PRIMARY KEY (`hotel_id`);


ALTER TABLE `room_homeAwayInn`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_RioInn`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_sunPalace`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_ComfyMotel`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_Courtyard`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_Regency`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_TownInnBudget`
  ADD PRIMARY KEY (`hotel_id`);



ALTER TABLE `manager`
  ADD PRIMARY KEY (`M_id`);

ALTER TABLE `UserName`
  ADD PRIMARY KEY (`U_id`);


ALTER TABLE `room_category`
  ADD PRIMARY KEY (`bedType`(100));

ALTER TABLE `hotelList`
  ADD PRIMARY KEY (`hotels`(100));

ALTER TABLE `manager`
  MODIFY `M_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `UserName`
  MODIFY `U_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `room_Magnolia`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_townCentreRoom`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_parkNorthRoom`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_homeAwayInn`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_RioInn`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_sunPalace`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_ComfyMotel`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_Courtyard`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_Regency`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

ALTER TABLE `room_TownInnBudget`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
