<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=getyourart', 'root', '');

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
        $errorMessage = "e-mail or password wrong. Please try again<br>!";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Log in</title>
</head>
<body>
<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action ="?login=1" method = "post">
    E-mail address:<br>
    <input type="email" size="40" maxlength="250" name="email" id="email"><br><br>
    Your Password:
    <input type="password" size="40" maxlength="250" name="password" id="password"><br><br>
    <input type="submit" value="Let me in!">
</form>
</body>
</html>
