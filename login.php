<?php
session_start();
require_once "../config.php";
 
// Check if the user is logged in. If logged in, redirect user to "welcome" page.
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
exit;}

// Start LOGIN
// Empty variables that will hold the data created by the user.
$username = "";
$password = "";
$username_error = "";
$password_error = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
// Check if username & password are empty. If so, run error message.
    if(empty($_POST["username"]) && empty(trim($_POST["password"]))){
        $username_error = "Please enter username & password.";      } 
    
      else {
        $username = ($_POST["username"]) && $password = ($_POST["password"]);
           }

//If the error variables are empty, execute the following code:
if(empty($username_error) && empty($password_error)){
        
        // Create a select statement that is stored in the $statement variable.
        $sel = "SELECT id, username, password FROM users WHERE username = :username";
        
        //If $statement is connected to the database, then prepare select statement.
        if($statement = $db_connection->prepare($sel)){
            
            // Bind variables to the prepared statement & set parameter for username.
            $statement->bindParam(":username", $parameter_user = ($_POST["username"]));
            
                //If the variable $statement is executed, run the following code:    
                if($statement->execute()){
                    
                    //If the row count is equal to 1 or true, then execute the following code: 
                    if($statement->rowCount() == 1){
                        
                        //If the row fetches the statement, run following:
                        if($eachrow = $statement->fetch()){
                            
                                $username = $eachrow["username"];
                                $hashed_password = $eachrow["password"];
                            
                                //if when the password is verified, start a new session.
                                if(password_verify($password, $hashed_password)){ 
                                    session_start();
                            
                                    // Storing data in $_SESSION variables. If the data exists, user will be transported to welcome.php.
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["username"] = $username;
                                    // If login successful, redirect the user to welcome page.
                                    header("location: welcome.php");
                                
                        } 
                    }
                        
                } else {
                    // Display an error message if something goes wrong
                    echo "Opps! There seems to be problem. Try again later";
                }
                    
            } 
        }
        
        // Closing the statement and connection
        unset($stmt);
    }
    
    unset($db_connection);
}
?>

 <!-- LOGIN page -->

<?php include "templates/header.php"; ?>

<div class="login">
    
    <h2 class="log">Login</h2>
    
    <form class="addto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="frm <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
            <label class="titu">Username</label>
            <input type="text" name="username" class="control" value="<?php echo $username; ?>">
            <span class="help"><?php echo $username_error; ?></span> 
        </div> 
            
        <div class="frm <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
            <label class="titp">Password</label>
            <input type="password" name="password" class="control">
            <span class="help">
            <?php echo $password_error; ?>
            </span>   
        </div>
            
        <div class="frm">
            <input type="submit" class="btn-log" value="Login">
        </div>
            
        <p class="sign-up">Don't have an account? <a href="register.php">Sign up now</a></p> 
     </form>
    
</div>

<?php include "templates/footer.php"; ?>