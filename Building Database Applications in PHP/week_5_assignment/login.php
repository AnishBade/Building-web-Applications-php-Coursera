<?php

session_start();



/*if (isset($_POST['cancel'])) {

    // Redirect the browser to game.php

    header("Location: index.php");

    return;

}
*/



$salt = 'XyZzy12*_';

$stored_hash = hash('md5', 'XyZzy12*_php123');;  // Pw is meow123



//$failure = false;  // If we have no POST data



if (isset($_POST['email']) && isset($_POST['pass'])) {
    unset($_SESSION['name']); //Logout Current user

    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) {

        $_SESSION['error'] = "User name and password are required";
         header("Location:login.php");

        return;

    }  else {

        $check = hash('md5', $salt . $_POST['pass']);

        if ($check == $stored_hash) {

            //error_log("Login success ".$_POST['email']);

            $_SESSION['name'] = $_POST['email'];

            header("Location: index.php");

            return;

        } else {

            $_SESSION['error'] = "Incorrect password";

            //error_log("Login fail ".$_POST['email']." $check");

            header("Location: login.php");
            return;

        }

    }

}




// Fall through into the View

?>

<!DOCTYPE html>

<html>

<head>

    

    <title>Anish Bade</title>

</head>

<body>

<div class="container">

    <h1>Please Log In</h1>

    <?php

    if(isset($_SESSION['error'])){
echo "<p style='color:red'>".$_SESSION['error']."</p>"; 
unset($_SESSION['error']);
}

    ?>

    <form method="POST" >

        <label for="name" style='font-weight:bold'>User Name</label>

        <input type="text" name="email" id="name" ><br/>

        <label for="id_1723"  style='font-weight:bold'>Password</label>

        <input type="text" name="pass" id="id_1723"><br/>

        <input type="submit" value="Log In">

        <a href="index.php" style='text-decoration:none'>Cancel</a>

    </form>

    </body>
    </html>