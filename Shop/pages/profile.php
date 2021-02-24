<?php
include "../includes/database_pdo.php";

session_start();

$userID_session = $_SESSION['userid'];
$profileImage = null;
$FirstName = null;
$LastName = null;
$Email = null;
$stmnt = $pdo->prepare("SELECT profileImage, FirstName, LastName, Email FROM users WHERE UserID = $userID_session");
$result = $stmnt->execute(array('profileImage' => $profileImage, 'FirstName' => $FirstName, 'LastName' => $LastName, 'Email' => $Email));
$resultArray = $stmnt->fetchAll(\PDO::FETCH_ASSOC);
extract($resultArray[0], EXTR_OVERWRITE);

?>
<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/CSS/style.css">
<title> Profile</title>
</head>


<body>
<?php
    include "../includes/header.php"
?>

<div class="profile-vertical">
    <div class="profile-wrapper">
        <div class="profile-left">
            <img src='<?php echo $profileImage; ?>' alt="Your Profile Picture" width="100">
            <h4> <?php echo $FirstName.' '.$LastName ?> </h4>
        </div>
        <div class="profile-right">
            <div class="profile-info">
                <h3>Your Profile</h3>
                <div class="profile-info-data">
                    <div class="profile-info-data-box">
                        <h4>Email</h4>
                        <p><?php echo $Email ?></p>
                    </div>
                </div>
            </div>
            <div class="profile-info">
                <h3>Favorites</h3>
                <div class="profile-info-data">
                    <div class="profile-info-data-box">
                        <h4>Recently added</h4>
                        <p> <img src="../assets/images/mona_lisa.jpg" alt="Mona Lisa" class="profile"> </p>
                    </div>
                    <div class="profile-info-data-box">
                        <h4>Best of all</h4>
                        <p> <img src="../assets/images/300px-The_Scream.jpg" alt="Der Schrei" class="profile"> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>