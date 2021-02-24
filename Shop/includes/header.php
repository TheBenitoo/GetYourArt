<DOCTYPE! html>

<html>
<header>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</header>

<body>
<header id="header">
				<div class="inner">
					<a href="../pages/index.php" class="logo">getyourart</a>
					<nav id="nav">
						<a href="../pages/index.php">Home</a>
						<a href="../pages/aboutUs.php">About Us</a>
						<a href="../pages/shop.php">Shop</a>
						<a href="../pages/cart.php">Cart</a>
						<?php if(isset($_SESSION['userid'])) : ?>
                            <a href="../pages/logout.php">Logout</a>
                        <?php else : ?>
                            <a href="../pages/login.php">Login</a>
                        <?php endif; ?>
					</nav>
				</div>
			</header>


</body>
</html>