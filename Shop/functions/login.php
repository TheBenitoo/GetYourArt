<?php

include "../includes/database_pdo.php";

session_start();

if (isset($_GET['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // checks if the email is registered
    $statement = $pdo->prepare("SELECT * FROM users WHERE Email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
    // checks if the password is correct
    if($user !== false && password_verify($password, $user['PASSWORD'])) {
        $_SESSION['userid'] = $user['UserID'];
        die('<h2 class="prompt"> Login was successful! Let\'s check out all the magic stuff!<a href="../pages/index.php"> Bring me to the Art!</a></h2>');
    }  else  {
        $errorMessage = "E-mail or password wrong. Please try again<br>!";
    }

}
?>

<html>
<head>
    <link rel="stylesheet" href="../assets/CSS/style.css" />
    <meta charset="utf-8">
    <title>Log in</title>
</head>
<body>
<?php
    include "../includes/header.php";

    if(isset($errorMessage)) {
        echo $errorMessage;
    }
?>

<div class="form">
    <form action ="?login=1" method = "post">
        <label for="email">E-Mail address: <br></label>
        <input class="login" type="email" size="40" maxlength="250" name="email"><br><br>
        <label for="password">Your Password: <br></label>
        <input class="login" type="password" size="40" maxlength="250" name="password"><br><br>
        <input type="submit" value="Let me in!">
    </form>


        <h2>Not already registered?</h2>
        <a href="registry.php" class="button rot">Get me registered!</a>
</div>



</body>
<?php include "../includes/footer.php"; ?>
</html>
