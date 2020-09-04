/* PROJECT 1: 
   'Bon Apetit' Tables for recipes & users */
   
/* Create the database for the recipe steps & use it  */

CREATE DATABASE foodData;

use foodData;

CREATE TABLE recipes (
	id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	recipename VARCHAR(30),
	ingredients VARCHAR(400),
	methods VARCHAR(400),
    origin VARCHAR(50),
    category VARCHAR(50)
);

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);




