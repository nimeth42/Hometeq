CREATE TABLE product (
  prodid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  prodName VARCHAR(30) NOT NULL,
  prodPicNameSmall VARCHAR(100) DEFAULT NULL,
  prodPicNameLarge VARCHAR(100) DEFAULT NULL,
  prodDescripShort VARCHAR(1000) DEFAULT NULL,
  prodDescripLong VARCHAR(3000) DEFAULT NULL,
  prodPrice DECIMAL(6,2) DEFAULT NULL,
  prodQuantity INT NOT NULL
);

-- Inserting record 1
INSERT INTO product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Smart LED TV', 'smart_tv_small.jpg', 'smart_tv_large.jpg', 'Enjoy stunning picture quality with this Smart LED TV.', 'Upgrade your home entertainment with this 55-inch Smart LED TV. Experience vivid colors and sharp details.', 699.99, 50);

-- Inserting record 2
INSERT INTO product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('Wireless Bluetooth Headphones', 'headphones_small.jpg', 'headphones_large.jpg', 'Listen to music wirelessly with these Bluetooth headphones.', 'Enjoy crystal-clear sound and comfortable fit with these wireless Bluetooth headphones. Perfect for workouts and travel.', 49.99, 100);

-- Inserting record 3
INSERT INTO product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('SmaDockrtphone Charging ', 'charging_dock_small.jpg', 'charging_dock_large.jpg', 'Charge your smartphone in style with this charging dock.', 'Keep your smartphone charged and organized with this sleek charging dock. Compatible with most smartphones.', 29.99, 200);

-- Inserting record for vacuum cleaner
INSERT INTO product (prodName, prodPicNameSmall, prodPicNameLarge, prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
VALUES ('PowerVac 2000', 'vacuum_cleaner_small.jpg', 'vacuum_cleaner_small.jpg', 'Keep your floors clean with the PowerVac 2000.', 'The PowerVac 2000 is a powerful vacuum cleaner designed to efficiently clean all types of floors. With its advanced suction technology, it ensures a thorough cleaning experience every time.', 149.99, 100);

