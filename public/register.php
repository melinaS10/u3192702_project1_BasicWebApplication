<?php
require_once "../config.php";

//Create empty variables for the username and password.
$username = "";
$password = "";
$username_error = "";
$password_error = ""; 
 
//When the form is posted, the following code will run.
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
// If the username is empty when posted, run error message.
    if(empty(trim($_POST["username"]))){
        
        $username_error = "Please enter a username.";
        
    } else{
        
        // Select the id from the users table, where it is/equal to username. 
        $sel = "SELECT id FROM users WHERE username = :username";
        
        // Prepare the SQL and append to $statement variable. 
        if($statement = $db_connection->prepare($sel)){
            
            // Then append variables as parameters to statement variable.
            $statement->bindParam(":username", $parameter_user, PDO::PARAM_STR);
        
            
            // Attempt to execute the prepared statement
            if($statement->execute()){
                if($statement->rowCount() == 1){
                    $username_error = "Username is taken. Try something else.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($statement);
    }
    
 // If the password is empty, run error message.
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter a password.";     
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Check input errors before inserting in database
    if(empty($username_error) && empty($password_error)){
        
        // Prepare an insert statement
        $sel = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($statement = $db_connection->prepare($sel)){
            // Bind variables to the prepared statement as parameters
            $statement->bindParam(":username", $parameter_user, PDO::PARAM_STR);
            $statement->bindParam(":password", $parameter_password, PDO::PARAM_STR);
            
            // Set parameters
            $parameter_user = $username;
            $parameter_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($statement->execute()){
                // Redirect to login page
                header("location: login.php");
            } 
        }
         
        // Close variable statement and the connection.
        unset($statement);
    }
    
    unset($db_connection);
}
?>
 
<!-- SIGNUP page -->

<?php include "templates/header.php"; ?>

<div class="regisform">
        
    <h2 class="log">Sign Up</h2>
    <p class="sign">Please create an account to join.</p>
    
        
        <form class="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <div class="form-grp <?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
                <label class="regtitle">Enter Username</label>
                <input type="text" name="username" class="control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_error; ?></span>
            </div>
            
            <div class="form-grp <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label class="regtitle">Enter Password</label>
                <input type="password" name="password" class="control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_error; ?></span>
            </div>
            
            <div class="form-grp">
                <input type="submit" class="btn-sub" value="Submit">
            </div>
            
            <p class="sign-up">Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    
    </div>

<?php include "templates/footer.php"; ?>