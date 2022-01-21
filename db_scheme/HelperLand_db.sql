-- Create Database

CREATE DATABASE HelperLand;

--------------------------------------------------------------------------------------

--Table structure for table `customer_details`

create table `customer_details` (`cid` int(11) not null auto_increment primary key,
								 `fname` varchar(20) not null,
                                 `lname` varchar(20) not null,
                                 `email` varchar(20) not null,
                                 `phone_no` varchar(13) not null,
                                 `postalCode` int(10) not null,
                                 `bod` date,
                                 `language` varchar(10),
                                 `password` varchar(20) not null,
                                 `aid` int(11) not null,
                                 `fid` int(11) not null,
                                 `bsid` int(11) not null);

--add foreign key

alter table `customer_details` add foreign key (`aid`) references `address`(`aid`);
alter table `customer_details` add foreign key (`fid`) references `favourite_sp`(`fid`);
alter table `customer_details` add foreign key (`bsid`) references `block_sp`(`bsid`);

-------------------------------------------------------------------------------------------

--Table structure for table `servicprovider_details`

create table `serviceprovider_details` (`spid` int(11) not null auto_increment primary key,
                                        `name` varchar(20) not null,
                                        `surname` varchar(20) not null,
                                        `email` varchar(20) not null,
                                        `mobile_no` varchar(13) not null,
                                        `postalCode` int(10) not null,
                                        `bod` date,
                                        `nationality` varchar(20) not null,
                                        `Gender` int(1),
                                        `password` varchar(20) not null,
                                        `aid` int(11) not null,
                                        `avatar` int(10),
                                        `bcid` int(11) not null); 

--add foreign key

alter table `serviceprovider_details` add foreign key (`aid`) references `address`(`aid`);
alter table `serviceprovider_details` add foreign key (`bcid`) references `block_c`(`bcid`);

------------------------------------------------------------------------------------------

--Table structure for table `address`

create table `address` (`aid` int(11) Not Null auto_increment primary key,
                        `street_name` varchar(20) Not Null,
                        `house_number` int(20) not null,
                        `city` varchar(20) not null);  

-----------------------------------------------------------------------------------------

--Table structure for table `book_service`

create table `book_service` (`sid` int(11) not null auto_increment primary key,
							 `cid` int(11) not null,
                             `service_time` timestamp not null,
                             `service_date` date not null,
                             `duration` int(3) not null,
                             `extraServiceId` int(11) ,
                             `have_pet` bool,
                             `aid` int(11) not null,
                             `status` varchar(10) not null,
                             `aacept_id` int(11) not null);

--add foreign key

alter table `book_service` add foreign key (`cid`) references `customer_details`(`cid`);
alter table `book_service` add foreign key (`extraServiceId`) references `extraservice`(`extraServiceId`);
alter table `book_service` add foreign key (`aid`) references `address`(`aid`);
alter table `book_service` add foreign key (`accept_id`) references `accept_service`(`accept_id`);

-----------------------------------------------------------------------------------------

--Table structure for table `accept_service`

create table `accept_service` (`accept_id` int(11) not null auto_increment primary key,
							   `sid` int(11) not null,
                               `accept_or_not` int(11) not null,
                               `spid` int(11) not null);

--add foreign key

alter table `accept_service` add foreign key (`sid`) references `book_service`(`sid`);
alter table `accept_service` add foreign key (`spid`) references `serviceprovider_details`(`spid`);

----------------------------------------------------------------------------------------

--Table structure for table `extraservice`

create table `extraservice` (`extraServiceId` int(11) not null auto_increment primary key,
                             `extraServiceName` varchar(50));

----------------------------------------------------------------------------------------

--Table structure for table `favourite_sp`

create table `favourite_sp` (`fid` int(11) not null auto_increment primary key,
							 `cid` int(11) not null,
                             `spid` int(11) not null);

--add foreign key

alter table `favourite_sp` add foreign key (`cid`) references `customer_details`(`cid`);
alter table `favourite_sp` add foreign key (`spid`) references `serviceprovider_details`(`spid`);

----------------------------------------------------------------------------------------

--Table structure for table `block_sp`

create table `block_sp` (`bsid` int(11) not null auto_increment primary key,
						 `cid` int(11) not null,
                         `spid` int(11) not null);

--add foreign key

alter table `block_sp` add foreign key (`cid`) references `customer_details`(`cid`);
alter table `block_sp` add foreign key (`spid`) references `serviceprovider_details`(`spid`);

---------------------------------------------------------------------------------------

--Table structure for table `block_c`

create table `block_c` (`bcid` int(11) not null auto_increment primary key,
						`spid` int(11) not null,
                        `cid` int(11) not null);

--add foreign key

alter table `block_c` add foreign key (`spid`) references `serviceprovider_details`(`spid`);
alter table `block_c` add foreign key (`cid`) references `customer_details`(`cid`);

----------------------------------------------------------------------------------------

--Table structure for table `serviceprovider_rating`

create table `serviceprovider_rating` (`ratingid` int(11) not null auto_increment primary key,
							 `cid` int(11) not null,
                             `spid` int(11) not null,
                             `ontime_rate` int(11) not null,
                             `friendly_rate` int(11) not null,
                             `quality_rate` int(11) not null,
                             `date` date not null,
                             `time` timestamp not null);

--add foreign key

alter table `serviceprovider_rating` add foreign key (`cid`) references `customer_details`(`cid`);
alter table `serviceprovider_rating` add foreign key (`spid`) references `serviceprovider_details`(`spid`);

--------------------------------------------------------------------------------------------------------