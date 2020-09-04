<?php 
require "../config.php"; 
    
try{

//Create variable that contains PDO instance. 
//Then create another variable that selects all data from recipes table.
$db_connection = new PDO($dsn, $username, $password, $options);		 
$sql_stmt = "SELECT * FROM recipes";
        
// Connect to database & prepare SQL statement. Then execute
$statement = $db_connection->prepare($sql_stmt);
$statement->execute();
        
//Create variable that will fetch all the data from recipes table. 
$results = $statement->fetchAll();
    
//If this fails, show error message 
} catch(PDOException $error) {
    
    echo $sql_stmt . "<br>" . $error->getMessage();
    
                         }	
?>

<!-- ALL RECIPES page -->

<?php include "templates/header.php"; ?>

<!-- Link/button to go back to HOMEPAGE (welcome.php) -->
<a href="welcome.php" class="goback">Back</a>

<div class="bckgrd">

<h2 class="log">All recipes</h2>

<!-- Run results through form using: -->

<div class= "reciperead">

<?php foreach($results as $row) { 
?>
<p class="allresults">
    
 Id:<?php echo $row["id"]; ?>
    
 Recipe Name:<?php echo $row['recipename']; ?>
    
 Ingredients:<?php echo $row['ingredients']; ?> 
    
 Methods:<?php echo $row['methods']; ?> 
    
 Country of origin:<?php echo $row['origin']; ?> 
    
 Food type:<?php echo $row['category']; ?>
    
</p>
<?php 
}; 
    
?>
    
</div>
</div>
<!-- Close ALL RECIPES page -->
<?php include "templates/footer.php"; ?>