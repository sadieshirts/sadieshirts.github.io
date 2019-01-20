-- -- Drop table if it already exists so you can start fresh each time.
-- DROP TABLE IF EXISTS shoppingCart;
-- DROP TABLE IF EXISTS products;
-- DROP TABLE IF EXISTS users;

-- -- Create a users table.
-- CREATE TABLE users (
--     user_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
--     email VARCHAR(100) NOT NULL UNIQUE,
--     password VARCHAR (256) NOT NULL,
--     username VARCHAR (50) NOT NULL
-- );

-- CREATE TABLE products (
-- 	product_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
-- 	product_name VARCHAR(50) NOT NULL UNIQUE,
-- 	product_desc TEXT(400) NOT NULL,
-- 	product_img VARCHAR(200) NOT NULL,
-- 	display_quantity BOOLEAN NOT NULL, -- 1 for true, 0 for false
-- 	display_size BOOLEAN NOT NULL, -- 1 for true, 0 for false
-- 	price INT NOT NULL
-- );

-- CREATE TABLE shoppingCart (
-- 	cart_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
-- 	user_id INT NOT NULL,
-- 	product_id INT NOT NULL,
-- 	FOREIGN KEY (user_id) REFERENCES users(user_id), 
-- 	FOREIGN KEY (product_id) REFERENCES products(product_id),
-- 	quantity INT CHECK (quantity > 0 AND quantity <= 10),
-- 	size VARCHAR(3)
-- );

-- -- Insert test data into your table so you have something to start with.
-- INSERT INTO users (email, password, username) VALUES('snoopy@peanuts.com', 'w00fWOOF', 'Snoopy');
-- INSERT INTO users (email, password, username) VALUES('scooby@whereareyou.com', 'w00fWOOF', 'Scooby');
-- INSERT INTO users (email, password, username) VALUES('snowwhite@disney.com', 'iLov3AppleZ', 'Snow White');
-- INSERT INTO users (email, password, username) VALUES('moana@disney.com', 'born2s@il', 'Moana');
-- INSERT INTO users (email, password, username) VALUES('sadieshirts@u.boisestate.edu', 'sadie123', 'Sadie');
-- INSERT INTO users (email, password, username) VALUES('rachaelhogan@u.boisestate.edu', 'rachael123', 'Rachael');

-- INSERT INTO products (product_name, product_desc, product_img, display_quantity, display_size, price) VALUES('Coffee Boise Mug', 
-- 	'INSERT DESCRIPTION PATH HERE', 'images/merch/mug1.jpg', 1, 0, 15);
-- INSERT INTO products (product_name, product_desc, product_img, display_quantity, display_size, price) VALUES('C-O-F-F-E-E Shirt', 
-- 	'INSERT DESCRIPTION PATH HERE', 'images/merch/shirt1.jpg', 1, 1, 20);
-- INSERT INTO products (product_name, product_desc, product_img, display_quantity, display_size, price) VALUES('Idaho Coffee Shirt', 
-- 	'INSERT DESCRIPTION PATH HERE', 'images/merch/shirt3.jpg', 1, 1, 20);
-- INSERT INTO products (product_name, product_desc, product_img, display_quantity, display_size, price) VALUES('I <3 Coffee Mug', 
-- 	'INSERT DESCRIPTION PATH HERE', 'images/merch/mug2.jpg', 1, 0, 15);




