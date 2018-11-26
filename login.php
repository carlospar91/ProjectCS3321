<?php
    include_once("connect.php");
    session_start(); //always start a session in the beginning
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code
        {
            echo
            "Incorrect username or password"; //
            header("location: login.php");//You will be sent to Login.php for re-login
        }
        
        $inUsername = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[]
        $inPassword = $_POST["password"];
        $stmt= $db->prepare("SELECT USERNAME, PASSWORD FROM PROFILE WHERE USERNAME = ?"); //Fetching all the records with input credentials
        $stmt->bind_param("s", $inUsername); //bind_param() - Binds variables to a prepared statement as parameters. "s" indicates the type of the parameter.
        $stmt->execute();
        $stmt->bind_result($UsernameDB, $PasswordDB); // Binding i.e. mapping database results to new variables
        
        //Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
        if ($stmt->fetch() && password_verify($inPassword, $PasswordDB))
        {
            $_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
            echo "Welcome User"
        }
        else
        {
            echo "Incorrect username or password";
            ?>

<a href="index.html">Login</a>
<?php
    }
    }
    ?>
</body>
</html>



