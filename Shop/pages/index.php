<html>
<?php session_start(); ?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<link rel="stylesheet" href="../assets/Css/style.css" />
<title> GetYourArt </title>
</head>

<body>
      
    <?php
      include "../includes/header.php";
    ?>

		<!-- Titelbild -->
			<section id="banner">
				<div class="inner">
					<h1>Get Your Art: <span>A platform to get your<br />
					prefered Art today!</span></h1>
					<ul class="actions">
						<li><a href="../pages/shop.php" class="button">To our Shop</a></li>
					</ul>
				</div>
			</section>

		<!-- Erster Abschnitt -->
			<section id="one">
				<div class="inner">
					<header>
						<h2>Über uns</h2>
					</header>
					<p>Wir sind eine kleine Gruppe von Künstlern und Informatikern. Uns fließt Farbe durch die Adern und wir wollen mehr Menschen an die Kunst bringen.</p>
					<ul class="actions">
						<li><a href="../pages/aboutUs.php" class="button rot">Learn More</a></li>
					</ul>
				</div>
			</section>

		<!-- Zweiter Abschnitt -->
			<section id="two">
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Arten von Kunst</h3>
							</header>
							<div class="image fit">
								<img src="../assets/images/pinsel.jpeg" alt="" />
							</div>
							<p>Wir bieten allesmögliche an. Von PopArt, bishin zu ausgefallenen Werken, sowie auch Einzelstücke!</p>
						</div>
					</article>
					<article class="alt">
						<div class="content">
							<header>
								<h3>Künstler</h3>
							</header>
							<div class="image fit">
								<img src="../assets/images/kuenstler.jpeg" alt="" />
							</div>
							<p>Die Werke die sie in unserem Shop sehen stammen von allen möglichen Künstlern. Ob sehr unbekannt oder weltberühmt. Sie finden unter den Bildern jeweils dessen Künstler, sowie SocialMedia links.</p>
						</div>
					</article>
				</div>
			</section>

		<!-- Dritter Abschnitt -->
			<section id="three">
				<div class="inner">
					<!-- Artikel 1 -->
					<article>
						<div class="content">
							<span class="icon fa-paint-brush"></span>
							<header>
								<h3>Kleine Künstler</h3>
							</header>
							<p>Wir bieten kleinen und neuen Künstlern an, uns eine Anfrage für den Verkauf in unserem Shop zu senden.</p>
							<ul class="actions">
								<li><a href="#" class="button rot">Mehr erfahren</a></li>
							</ul>
						</div>
					</article>
					<!-- Artikel 2 -->
					<article>
						<div class="content">
							<span class="icon fa-calendar-o"></span>
							<header>
								<h3>Einzelstücke</h3>
							</header>
							<p>Wenn Sie schnell genug sind, können sie von den Künstlern auch begehrte Einelstücke erhalten.</p>
							<ul class="actions">
								<li><a href="#" class="button rot">Mehr erfahren</a></li>
							</ul>
						</div>
					</article>
					<!-- Artikel 3 -->
					<article>
					<div class="content">
							<span class="icon fa-id-card-o"></span>
							<header>
								<h3>Anfragen</h3>
							</header>
							<p>Bei Verkaufsanfragen oder allgemeinen Fragen, schreiben Sie uns einfach im Formuar unten.</p>
							<ul class="actions">
								<li><a href="#" class="button rot">Mehr Erfahren</a></li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Footer -->
			<section>
				<div class="inner">
					<header>
						<h2>Get in Touch</h2>
					</header>
				</div>
			</section>


	</body>
    <?php include "../includes/footer.php"; ?>
</html>