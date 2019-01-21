--amount of dependents for x employee
SELECT SUM(f_name) WHERE em_id = x:em_id;

--amount of dependents for x employee that starts w/ 'a'
SELECT SUM(f_name) WHERE em_id = x:em_id
AND f_name LIKE 'a%';

--employees that start with 'a'
SELECT em_id WHERE f_name LIKE 'a%';

--Check if user exists
SELECT email FROM users WHERE email = X;
--X is a given email
--returns empty set if does not exist

--Add user to database.
INSERT INTO users (email, password, name) VALUES(X, Y, Z);
--X is a email
--Y is a given password
--Z is a given name

--Retrieve password for a user.
SELECT password FROM users WHERE name = X;
--X is a given name

--List all users with emails in same domain. 
SELECT * FROM users WHERE email LIKE '%X%';
--X is a given email string i.e. 'disney.com'

-- Remove users with id X
DELETE FROM users WHERE id = X;

-- List all products
SELECT product_name FROM products; 

--Add product to database
INSERT INTO products (product_name, product_desc, product_img, display_quantity, display_size) VALUES(X, 
	Y, Z, A, B, C);
--delete product from product database
DELETE FROM products WHERE id = X;

-- add item to shopping cart
INSERT INTO shoppingCart (user_id, product_id, quantity, size) VALUES (X,Y,Z,A);

-- remove item from shopping cart
DELETE FROM products WHERE id = X;