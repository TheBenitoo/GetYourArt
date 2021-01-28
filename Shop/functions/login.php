<?php

require_once "../includes/database_pdo.php";

session_start();

if (isset($_GET['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    if($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login was successful! Let\'s keep on moving to <a href="secret.php">!');
    }  else  {
        $errorMessage = "E-mail or password wrong. Please try again<br>!";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <meta charset="utf-8">
    <title>Log in</title>
</head>
<body>
<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
<section class="form">
<form action ="?login=1" method = "post">
    <label for="email">E-Mail address: <br></label>
    <input type="email" size="40" maxlength="250" name="email" id="email"><br><br>
    <label for="password">Your Password: <br></label>
    <input type="password" size="40" maxlength="250" name="password" id="password"><br><br>
    <input type="submit" value="Let me in!">
</form>
    <h2>Not already registered?</h2>
    <a href="registry.php" class="button rot">Get me registered!</a>
</section>
</body>
</html>
