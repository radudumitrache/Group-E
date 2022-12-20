<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
	<meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
	<meta name="author" content="Yourname">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Morgenster</title>
	<link rel="stylesheet" href="css/home-page.css">
	<link rel="icon" href="img/logo.svg">

</head>

<body>

<header>

	<a class="logo" href="">
		<img src="img/logo.svg" alt="logo">
	</a>

	<div class="listcontainer">

		<ul class="headerList">

			<li>
				<a class="button1" href="signIn-page.php">
					<button>Sign in</button>
				</a>
			</li>

			<li>
				<a class="button2" href="aboutUs-page.php">
					<button>About us</button>
				</a>
			</li>

		</ul>

	</div>

</header>

<body>

	<main>

		<?php

			$src = array("11", "12", "13");
			$alt = array("Boy reading", "Boy writing", "Set of pencils");
			$txt = array("Studying affects imagination", "Practical learning", "Creativity");

			function generate_div($no) {
				global $src;
				global $alt;
				global $txt;
					echo
						"<div id='pages'>
							<img
								src='../root/img/rectangle-{$src[$no]}.png'
								alt='$alt[$no]'
							>
							<p>$txt[$no]</p>
						</div>";
			}

			for ($x = 0; $x <= 2; $x++) {
				echo generate_div($x);
			}

		?>

	</main>

</body>
</html>
