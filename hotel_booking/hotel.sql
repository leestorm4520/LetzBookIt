
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
(3, 'admin', '1234', 'admin', 'admin@admin.com');

CREATE TABLE `UserName` (
  `U_id` int(20) NOT NULL,
  `U_name` varchar(30) NOT NULL,
  `U_password` varchar(30) NOT NULL,
  `U_fullname` varchar(100) NOT NULL,
  `U_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `UserName` (`U_id`, `U_name`, `U_password`, `U_fullname`, `U_email`) VALUES
(1, 'tuan', '4321', 'tuan Nguyen', 'Nguyen@gmail.com'),
(2, 'John', 'john123', 'tom Johnson', 'Johnson@gmail.com'),
(3, 'kevin', '5432', 'kevin Henson', 'kevin@gmail.com');


CREATE TABLE `room_Magnolia` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` text NOT NULL,
  `phone` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_Magnolia` (`hotel_id`, `room_size`, `checkin`, `checkout`, `name`,`phone`,`price`, `book`) VALUES
(111, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150,'false'),
(112, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150,'false'),
(113, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150, 'false'),
(114, 'KING SIZE', '2021-05-19', '2021-05-22', 'tuan Nguyen', 1524587558,250, 'true'),
(115, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,250, 'false'),
(116, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,250, 'false'),
(117, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false'),
(118, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false'),
(119, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false');




CREATE TABLE `room_townCentreRoom` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` text NOT NULL,
  `phone` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `room_townCentreRoom` (`hotel_id`, `room_size`, `checkin`, `checkout`, `name`, `phone`,`price`, `book`) VALUES
(222, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,120,'false'),
(223, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,120,'false'),
(224, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,120, 'false'),
(225, 'KING SIZE', '2021-05-19', '2021-05-22', 'tom Johnson', 1524587558,190,'true'),
(226, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,190,'false'),
(227, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,190,'false'),
(228, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,105,'false'),
(229, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,105,'false'),
(300, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,105,'false');


CREATE TABLE `room_parkNorthRoom` (
  `hotel_id` int(200) NOT NULL,
  `room_size` text NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` text NOT NULL,
  `phone` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `room_parkNorthRoom` (`hotel_id`, `room_size`, `checkin`, `checkout`, `name`, `phone`,`price`, `book`) VALUES
(333, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150,'false'),
(334, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150,'false'),
(335, 'QUEEN SIZE', '0000-00-00', '0000-00-00', '', 0,150, 'false'),
(336, 'KING SIZE', '2021-05-19', '2021-05-22', 'kevin Henson', 1524587558,250, 'true'),
(337, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,250, 'false'),
(338, 'KING SIZE', '0000-00-00', '0000-00-00', '', 0,250, 'false'),
(339, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false'),
(440, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false'),
(441, 'STANDARD SIZE', '0000-00-00', '0000-00-00', '', 0,100, 'false');



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
  `room_num` int(11) NOT NULL,
  `room_price` text NOT NULL,
  `Surcharge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotelList` (`hotel_id`,`hotels`,`pickRoomWeb`,`room1`,`room2`,`room3`,`websiteDirect`, `hotelAmenities`,`room_price`, `room_num`, `surcharge`) VALUES

(1,'The Magnolia All Suites','MagnoliaRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheMagnoliaAllSuites','Pool, Gym, Spa, Business Office','Room Price per night: $100 - Standard, $150 - Queen, $250 – King',20,25),
(2,'The Lofts at Town Centre','townCentreRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheLoftsatTownCentre','Pool, Gym, Business Office','Room Price per night: $105 - Standard, $120 - Queen, $190 – King',60, 35),
(3,'Park North Hotel','parkNorthRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','ParkNorthHotel','Pool, Gym','Room Price per night: $50 - Standard, $75 - Queen, $90 – King',100,15),
(4,'The Courtyard Suites','courtyardRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheCourtyardSuites','Pool, Gym, Spa, Business Office','Room Price per night: $100 - Standard, $150 - Queen, $250 – King',20, 25),
(5,'The Regency Rooms','regencyRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheRegencyRooms','Pool, Gym, Spa, Business Office','Room Price per night: $100 - Standard, $150 - Queen, $250 – King',20,25),
(6,'Town Inn Budget Rooms','townInnRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TownInnBudgetRooms','Pool','Room Price per night: $25 - Standard, $50 - Queen, $60 – King',150, 15),
(7,'The Comfy Motel Place','comfyMotelRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','TheComfyMotelPlace','n/a','Room Price per night: $30 - Standard, $50 - Queen, n/a – King',50, 10),
(8,'Sun Palace Inn','sunPalaceRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','SunPalaceInn','Pool, Gym','Room Price per night: $40 - Standard, $60 - Queen, $80 – King',50, 25),
(9,'HomeAway Inn','homeAwayRoom','QUEEN SIZE','STANDARD SIZE','KING SIZE','HomeAwayInn','Pool, Business Office','Room Price per night: $50 - Standard, n/a - Queen, n/a – King',30, 25),
(10,'Rio Inn','RioInn','QUEEN SIZE','STANDARD SIZE','KING SIZE','rioInnRoom','Pool','Room Price per night: $25 - Standard, $55 - Queen, $89 – King',50, 20);





ALTER TABLE `room_Magnolia`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_townCentreRoom`
  ADD PRIMARY KEY (`hotel_id`);

ALTER TABLE `room_parkNorthRoom`
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
