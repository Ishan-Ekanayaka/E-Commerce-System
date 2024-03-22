--CREATE DATABASE system_db;

--USE system_db;



CREATE TABLE category(
id int PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL
);


CREATE TABLE sub_category(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
main_category INT NOT NULL
);


CREATE TABLE product(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255) NOT NULL,
main_category INT NOT NULL,
sub_category INT NOT NULL,
quantity INT NOT NULL,
price INT NOT NULL,
photo VARCHAR(255)
);

INSERT INTO category(name) VALUES
('Men'),
('Women'),
('Kids'),
('Animals');

INSERT INTO sub_category(name,main_category) VALUES
('Blazers','1'),
('Sunglasses ','1'),
('Shirt','1'),
('Coats','2'),
('Wedding dress','2'),
('Toys','3'),
('Shorts','3'),
('bird house','4'),
('Harness','4');


INSERT INTO product(name,main_category,sub_category,quantity,price,photo) VALUES
('Jacket Coat','2','4','10','1200','coat2.jpeg'),
('black_sunglass','1','2','20','800','sunglass01.jpeg'),
('Dog_belt','4','9','10','500','harness002.jpg'),
('Toy_car','3','6','20','1000','toy1.jpeg');


