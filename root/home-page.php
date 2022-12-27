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

	<main>

		<img src="../root/img/morgenster-naambord-1.png">
		<p>Welcome to Christian primary school De Morgenster. The school is located in the Westenholte district of Zwolle. The Morning Star makes you shine; by looking at each individual child, we can best meet the needs of that student and there is room for his or her talents.</p>

		<div id="pages-container">

			<?php

				$a_src = array("1", "2", "3");
				$img_src = array("11", "12", "13");
				$alt = array("Boy reading", "Boy writing", "Set of pencils");
				$txt = array("Studying affects imagination", "Practical learning", "Creativity");

				function generate_div($no) {
					global $a_src;
					global $img_src;
					global $alt;
					global $txt;
						echo
							"<a href='../root/event{$a_src[$no]}-page.php'>
								<div class='pages'>
									<img
										src='../root/img/rectangle-{$img_src[$no]}.png'
										alt='$alt[$no]'
									>
									<p>$txt[$no]</p>
									<span class='hovertext'>Read more</span>
								</div>
							</a>";
				}

				for ($x = 0; $x <= 2; $x++) {
					echo generate_div($x);
				}

			?>

		</div>

	</main>

</body>
</html>
