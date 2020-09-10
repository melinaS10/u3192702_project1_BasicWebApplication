<?php
/* Basic Web application: Bon apetit database setup */
/* Set up connection */

$host       = "localhost";
$username   = "upcqym6at6wws";
$password   = "jv7y87nsxx7n";
$dbname     = "dbazhmmwxg4349"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

/* Create a connection to the MYSQL database */

try{ $db_connection = new PDO($dsn, $username, $password, $options);
    
/* Check connection. If no connection, get an error message.*/
    
} catch(PDOException $error){
    
    die("Opps! there seems to be a connection error.".
        
    $error->getMessage()); }
?>