<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=getyourart', 'root', '');
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

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     echo 'Please enter a valid email address!';
     $error = true;
    }

    if(strlen($password) == 0) {
        echo 'Please enter a password!';
        $error = true;
    }
    if($password != $password2) {
        echo 'The entered passwords don\'t match!';
        $error = true;
    }
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'The email you are trying to use has already been registered!';
            $error = true;
        }
    }

    if(!$error) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
        $result = $statement->execute(array('email' => $email, 'password' => $password_hash));

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

    <form action="?register=1" method="post">
        Email:<br>
        <input type="email" size="40" maxlength="250" name="email" id="email"><br><br>

        Your password:<br>
        <input type="password" size="40"  maxlength="250" name="passwort" id="password"><br>

        Repeat your password:<br>
        <input type="password" size="40" maxlength="250" name="passwort2" id="password2"><br><br>

        Your first name:<br>
        <input type="text" size="40" maxlength="250" name="fname" id="fname"><br><br>

        Your last name:<br>
        <input type="text" size="40" maxlength="250" name="lname" id="lname"><br><br>

        <input type="submit" value="Register">
    </form>

<?php
}
?>
</body>
</html>