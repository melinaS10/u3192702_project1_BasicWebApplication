<?php

//If the submit button is pressed, execute the following code:
if (isset($_POST['submit'])) {
    
require "../config.php";

try {
    
$db_connection = new PDO($dsn, $username, $password, $options);
    
//Create an array to post data to the recipes table.
$new_food = array(
    "recipename" => $_POST['recipename'], "ingredients" => $_POST['ingredients'], "methods" => $_POST['methods'],
    "origin" => $_POST['origin'], "category" => $_POST['category'], 
);
    
// Create SQL statement that inserts the following into the recipes table. 
$sql_stmt = "INSERT INTO recipes (recipename, ingredients, methods, origin, category) VALUES (:recipename, :ingredients, :methods, :origin, :category)";
    
// Print SQL to database
$statement = $db_connection->prepare($sql_stmt);
$statement->execute($new_food);

// Catch error, if above code does not work.
} catch(PDOException $error) {  
    echo "Opps. Something went wrong. Try again later.";
                             }
                            }
?>

<!-- CREATE page --> 

<?php include "templates/header.php"; ?>

<a href="welcome.php" class="goback">Back</a>

<div class="rec-data">

<h2 class="log">Add a recipe</h2>

<?php
    
// Test code for form submission 1.
    
// Create variable that contains the ability to post the form type to it.
/* $list = $_POST['input'];

// If the submit button is pressed and is set, then:
//if(isset($_POST['submit'])){
    
    //If none of the input forms are added, error message will be posted.
    if(!isset($list) && $_POST['submit']){
    
        echo "Please fill in the form!";
    
        } else {

            echo "Your recipe has been added!";   
} 
 } */
    
// Test code for form submission 2.
//if($_POST['submit'] == "submit") {
    
//  $errorMessage = "";

//if(empty($_POST['recipename'])){
      
//  $errorMessage .= "<li>You didn't enter a name!</li>";
//}

//$recipename = $_POST['recipename'];
    
//if(!empty($errorMessage)){
//  echo("<p>There was an error with your form:</p>\n");
//   echo("<ul>" . $errorMessage . "</ul>\n");
//                         } 

//                                  } 
    if(isset($_POST['submit'])){
        
    echo "<br> . Your recipe was added!";
        
    } if (!isset($_POST['submit'])){
        
        echo  "<br> . Please fill out form!";
    }
 
?>

<!-- Form to collect data for each recipe -->

<form class="crt-frm" method="post">
    
    <label for="recipename" class="rn">Recipe title:</label>
    <input type="text" name="recipename" id="recipename" class="rep" >
    
    <label for="ingredients" class="in">Ingredients:</label>
    <input type="text" name="ingredients" id="ingredients"  class="ing" >
    
    <label for="methods" class="me">Methods:</label>
    <input type="text" name="methods" id="methods" class="met" >
    
    <label for="origin" class="or">Country of Origin:</label>
    <input type="text" name="origin" id="origin" class="ori" >
    
    <label for="category" class="ft">Food type:</label>
    <input type="text" name="category" id="category" class="typ" >
    
    <input class="btn-sub" type="submit" name="submit" value="submit">
    
</form>
</div>

<?php include "templates/footer.php"; ?>