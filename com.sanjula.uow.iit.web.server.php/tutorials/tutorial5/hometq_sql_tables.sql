CREATE SCHEMA HOMTEQ;
USE HOMTEQ;
CREATE TABLE Product
(
	prodId INT(4) auto_increment NOT NULL ,
    prodName VARCHAR(2000) NOT NULL,
    prodPicNameSmall VARCHAR(100) NOT NULL,
    prodPicNameLarge VARCHAR(100) NOT NULL,
    prodDescripShort VARCHAR(1000),
    prodDescripLong VARCHAR(3000),
    prodPrice DECIMAL(6,2) NOT NULL,
    prodQuantity INT(4) NOT NULL,
    CONSTRAINT PK_PRODUCT PRIMARY KEY(prodId)
)
ENGINE=InnoDB;

USE HOMTEQ;
INSERT INTO Product 
VALUES (NULL, 'Reiss Rashford Vintage Medallion Print Silk Tie, Blue/Multi', 
'Reiss_Rashford_Tie.jfif', 'Reiss_Rashford_Tie.jfif', 
'Reiss 100% silk tie',
'Crafted in Italy from pure silk in a vintage medallion design, 
this Rashford tie from Reiss will round off a distinguished tailored ensemble.',
45.00, 3),
(NULL, 'Ted Baker Krena Stripe Ribbed Jumper, Pink Mid',
'Ted_Baker_Krena_Jumper.jfif', 'Ted_Baker_Krena_Jumper.jfif', 
'Ted Baker Krena Jumper',
'Modernising the stripe, this Ted Baker Krena jumper is an effortless 
way to add some colour into your wardrobe. Featuring a bright but not 
too bold print, this comes complete with ribbing for a secure fit. Pair 
with anything from tailored trousers to off-duty denim for a completed look.',
99.00,
5),
(NULL, 'Diesel B-CANDA Leather Belt with Contrast Loop, Black',
'Diesel_Leather_Belt.jfif', 'Diesel_Leather_Belt.jfif', 'Diesel B-CANDA Leather Belt',
'Add a subtle pop of colour to your ensembles with this B-CANDA belt from Diesel.
Made from smooth leather, it is detailed with a metal buckle and contrast 
logo loop at one end.', 40.00, 500),
(NULL, 'Reiss Hidashi Water Repellent Mac, Sage',
'Reiss_Hidashi_Water_Repellent_Mac.jfif', 'Reiss_Hidashi_Water_Repellent_Mac.jfif', 
'Reiss Hidashi Water Repellent Mac made from water-repellent cotton blend', 
'Crafted from a water-repellent cotton blend, this Hidashi 
mac from Reiss is a refined option for rainy days. Cut to a mid length in a 
regular fit that sits comfortably over both suits or knitwear, a four-button 
front, flap front pockets, and buttoned sleeve cuffs complete a classic aesthetic.', 
'295.00', 25);

DROP TABLE Product;
TRUNCATE TABLE PRODUCT;

USE HOMTEQ;
CREATE TABLE USERS
(
	userId int(4) auto_increment NOT NULL,
    userType varchar(1) NOT NULL,
    userFName varchar(50) NOT NULL,
    userSName varchar(50) NOT NULL,
    userAddress varchar(50) NOT NULL,
    userPostCode varchar(50) NOT NULL,
    userTelNo varchar(50) NOT NULL,
    userEmail varchar(50) NOT NULL,
    userPassword varchar(50) NOT NULL,
    CONSTRAINT PK_USERS PRIMARY KEY(userId)
)
ENGINE=InnoDB;