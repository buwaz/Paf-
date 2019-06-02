create database order_management;

use order_management;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `order_name` varchar(100) NOT NULL,
  `order_quantity` varchar(10) NOT NULL,
  `order_date` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
);