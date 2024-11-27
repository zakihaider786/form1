CREATE DATABASE user_management;

USE user_management;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    father_name VARCHAR(100),
    mother_name VARCHAR(100),
    email VARCHAR(100),
    permanent_address TEXT,
    residential_address TEXT,
    reason VARCHAR(255),
    amount DECIMAL(10, 2)
);
