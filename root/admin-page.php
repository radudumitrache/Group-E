<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
		<meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
		<meta name="author" content="Yourname">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Morgenster</title>
		<link rel="stylesheet" href="css/admin-page.css">
		<link rel="icon" href="img/logo.svg">
	</head>
	<body>
		<header>
			<a class="logo" href="home-page.php">
				<img src="img/logo.svg" alt="logo">
			</a>
			<div class="listcontainer">
				<ul class="headerList">
					<li>
						<a class="button2" href="home-page.php">
							<button>Home</button>
						</a>
					</li>
					<li>
						<a class="button1" href="signIn-page.php">
							<button>Sign in</button>
						</a>
					</li>
				</ul>
			</div>
		</header>
		<main>
			<?php

				$src = array("eventsMain", "eventsParents", "tables");
				$txt = array("Events main", "Events parents", "Tables");

				function generate_div($no) {
					global $src;
					global $txt;
						echo
							"<div id='$src[$no]'>
								<a href='../root/$src[$no]-page.php'>
								<div class='pages'>
									<h1>$txt[$no]</h1>
								</div>
								</a>
							</div>";
				}

				for ($x = 0; $x <= 2; $x++) {
					echo generate_div($x);
				}

			?>
		</main>
	</body>
</html>
