CREATE DATABASE IF NOT EXISTS everydaychef;
USE everydaychef;

CREATE TABLE IF NOT EXISTS users (
	    id INT AUTO_INCREMENT PRIMARY KEY,
	    firstname VARCHAR(50) NOT NULL,
	    lastname VARCHAR(50) NOT NULL,
	    middlename VARCHAR(50),
	    username VARCHAR(50) NOT NULL UNIQUE,
	    email VARCHAR(100) NOT NULL UNIQUE,
	    password VARCHAR(255) NOT NULL
	);

