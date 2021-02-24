<?php

include "../includes/header.php";
include "../includes/database_pdo.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register now!</title>
    <meta charset="utf-8">
</head>
<body>

<?php
$showFormular = true;

// checks if a form was send
if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $street = $_POST['street'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];

    // checks if the entered email is in a valid format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     echo 'Please enter a valid email address!';
     $error = true;
    }

    // checks if the user even entered a password
    if(strlen($password) == 0) {
        echo 'Please enter a password!';
        $error = true;
    }

    // checks if the passwords match
    if($password != $password2) {
        echo 'The entered passwords don\'t match!';
        $error = true;
    }

    //checks if the email-address has already been registered
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'The email you are trying to use has already been registered!';
            $error = true;
        }
    }

    // registers the user or prompts an error if something was wrong
    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, password, FirstName, LastName, street, postcode, city) VALUES (:email, :password, :firstname, :lastname, :street, :postcode, :city)");
        $result = $statement->execute(array('email' => $email, 'password' => $password_hash, 'firstname' => $firstname, 'lastname' => $lastname, 'street' => $street, 'postcode' => $postcode, 'city' => $city));

        if($result) {
            echo 'You have been successfully registered! <a href="login.php">Get me to the Login!</a>';
        }
        else {
            echo 'Something went wrong! Please try again!<br>';
        }
    }
}

if($showFormular) {
    ?>

<div class="form">
    <form action="?register=1" method="post">
        Email:<br>
        <input type="email" size="40" maxlength="100" name="email" id="email"><br><br>

        Your password:<br>
        <input type="password" size="40"  maxlength="250" name="password" id="password"><br>

        Repeat your password:<br>
        <input type="password" size="40" maxlength="250" name="password2" id="password2"><br><br>

        Your first name:<br>
        <input type="text" size="40" maxlength="256" name="firstname" id="firstname"><br><br>

        Your last name:<br>
        <input type="text" size="40" maxlength="256" name="lastname" id="lastname"><br><br>

        Your street:<br>
        <input type="text" size="40" maxlength="100" name="street" id="street"><br><br>

        Your postcode:<br>
        <input type="text" size="40" maxlength="5" name="postcode" id="postcode"><br><br>

        Your city:<br>
        <input type="text" size="40" maxlength="100" name="city" id="city"><br><br>

        <input type="submit" class="button rot" value="Register">
    </form>
</div>
<?php
}
?>
</body>
</html>