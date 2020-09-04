<?php
/* Basic Web application: Bon apetit database setup */
/* Set up connection */

$host       = "localhost";
$username   = "urdng8jm52ta9";
$password   = "tg3qwgd58ebg";
$dbname     = "dbdn2kfe7w28kp"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

/* Create a connection to the MYSQL database */

try{ $db_connection = new PDO($dsn, $username, $password, $options);
    
/* Check connection. If no connection, get an error message.*/
    
} catch(PDOException $error){
    
    die("Opps! there seems to be a connection error.".
        
    $error->getMessage()); }
?>