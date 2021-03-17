CREATE TABLE `payment` (
    `ID` int NOT NULL AUTO_INCREMENT,
    `ORDER_ID` varchar(50) NOT NULL,
    `SHOP_ID` varchar(50) NOT NULL,
    `EMAIL` varchar(50) DEFAULT NULL,
    `COUNT` varchar(50) DEFAULT NULL,
    `AMOUNT` varchar(50) NOT NULL,
    `CURRENCY` varchar(50) NOT NULL,
    `SIGN1` varchar(50) NOT NULL,
    `PAYMENT_DONE` boolean DEFAULT false,
    PRIMARY KEY(`ID`)
);