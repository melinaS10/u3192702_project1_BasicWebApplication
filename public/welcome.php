<?php
session_start();
 
// Check if the user is logged in, if not then redirect him to login page.

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    
    header("location: login.php");
    
        exit;
}
?>

<!-- Start of homepage -->

<?php include "templates/header.php"; ?>

<a href="logout.php" class="signout">Sign Out</a>

<header class="page-header">
     
<h1 class="apphead">Bon apétit</h1>
     
<h2 class="msg">Hi <?php echo htmlspecialchars($_SESSION["username"]); ?>! What would you like to do? </h2>
      
 </header>

     <ul class="main-navigation">
        <li><a href="create.php">Add a recipe</a></li>
        <li><a href="read.php">View recipes</a></li>
        <li><a href="delete.php">Remove a recipe</a></li>
    </ul>
    
<?php include "templates/footer.php"; ?>