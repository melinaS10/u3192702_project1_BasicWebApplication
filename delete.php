<?php include "templates/header.php"; ?>

<?php 

require "../config.php";

//Add escape.php, which holds special syntax/characters for html.
require "escape.php";

// If delete is clicked, run the following code:
if (isset($_GET["id"])) {

    try {
        
        $db_connection = new PDO($dsn, $username, $password, $options);
        
        //Create a variable that gets that collects data from the id.
        $identifier = $_GET["id"];
            
        // Create variable for the sql to delete recipes. 
        $sel = "DELETE FROM recipes WHERE id = :id";

        // Create variable that prepares the SQL statement
        $statement = $db_connection->prepare($sel);
            
        // bind the id to the PDO
        $statement->bindValue(':id', $identifier);
            
        // execute the statement
        $statement->execute();

        // Catch error in SQL statement and show what it is.
        } catch(PDOException $error) {
        echo $sel . $error->getMessage();
        }
    };

//Start DELETE page

    try {
        
        // Access database using PDO & use $sel variable to hold data that selects all the contents of the 'recipes' table.
        $db_connection = new PDO($dsn, $username, $password, $options);
        $sel = "SELECT * FROM recipes";
    
        //Use $statement variable to prepare the SQL & execute it.
        $statement = $db_connection->prepare($sel);
        $statement->execute();
        
        //Use answer variable to access all data on the page.
        $answer = $statement->fetchAll();
        
     //Catch error if something goes wrong..
         } catch(PDOException $error) {
        
            echo $sel . $error->getMessage();
                                      }

?>

<a href="welcome.php" class="goback">Back</a>

<div class="dele">

<h2 class="log">Delete a recipe</h2>

<!-- Show data for each row -->
<?php foreach($answer as $row) { 
?>

    <p class="allresults" id="alres"> 
      
    <!-- Echo each result and append it to the 'id' in the table -->
    
    Id:
    <?php echo $row["id"]; ?> 
    
    Recipe Name:
    <?php echo $row['recipename']; ?> 
    
    Ingredients:
    <?php echo $row['ingredients']; ?>
    
    Methods:
    <?php echo $row['methods']; ?>
    
    Country of origin:
    <?php echo $row['origin']; ?> 
    
    Food type:
    <?php echo $row['category']; ?>
    
        <a class="del" href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
    
    </p>

<?php                       
};   
?>
</div>

<?php include "templates/footer.php"; ?>