<?php
/* Basic Web application: Bon apetit database setup */
/* Set up connection */

$host       = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "foodData"; 
$dsn        = "mysql:host=$host;dbname=$dbname"; 
$options    = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

/* Create a connection to the MYSQL database */

try{ $db_connection = new PDO($dsn, $username, $password, $options);
    
/* Check connection. If no connection, get an error message.*/
    
} catch(PDOException $error){
    
    die("Opps! there seems to be a connection error.".
        
    $error->getMessage()); }

/* Test database connection. Notify if connection was successful. If successful, show this message.*/

/* echo "Connection to database successful!";*/

/* Attempt at connecting to the database.

 $db_connection = new PDO($dsn, $username, $password, $options); 
 
 if ($db-connection->connect_error){
     die("Opps! there seems to be a problem".
    $db-connection->connect_error); }
    
    echo "Connection successful!";
*/

?>







