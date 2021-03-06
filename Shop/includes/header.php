<DOCTYPE! html>

<html>
<header>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 

</header>

<body >
	<nav>
		<div class="toggle">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</div>
		<ul>
			<li><a href="../pages/index.php" class="logo">getyourart</a></li>
			<li><a href="../pages/index.php">Home</a></li>
			<li><a href="#">About</a>
					<ul>
						<li><a href="../pages/aboutUs.php">About Us</a></li>
						<li><a href="../pages/imprint.php">Impressum</a></li>
						<li><a href="https://docs.google.com/document/d/147YmAK0ccpYokbhMDjEPjNebXd69besnX0AdIZdwNTg/edit#heading=h.3at9u9s4e0vp">Documentation</a></li>
					</ul>
			</li>
			<li><a href="../pages/shop.php">Shop</a></li>
			<li><a href="../pages/cart.php">Cart</a></li>
			<li><?php if(isset($_SESSION['userid'])) : ?>
                            <a href="../pages/logout.php">Logout</a>
                        <?php else : ?>
                            <a href="../pages/login.php">Login</a>
                        <?php endif; ?>
			</li>
			<li>
				<?php if(isset($_SESSION['userid'])) : ?>
                <a href="../pages/profile.php">Profile</a>
				<?php endif; ?>
			</li>
		</ul>
	</nav>
	
	<script type="text/javascript">
  		let toggle = document.querySelector('.toggle')
  		toggle.addEventListener('click', (e) => {
    	document.querySelector('ul').classList.toggle('active');
  })
</script>



</body>
</html>