CREATE DATABASE iap;

USE iap;

CREATE TABLE userdetails (
    email VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    fname VARCHAR(100) NOT NULL,
    lname VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (email, username)
);