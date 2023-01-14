<?php session_start();?>

<?php
        include("connection.php");

        try{
          $stmt = $conn -> prepare("SELECT events_school.photo, events_school.event_date, events_school.event_description FROM events_school WHERE eventID = 1 ORDER BY eventID DESC LIMIT 0,1");
          $stmt->execute();
          $stmt->bindColumn(1, $photo1);
          $stmt->bindColumn(2, $date1);
          $stmt->bindColumn(3,$description1);

           while ($resule = $stmt->fetch()) {
            $_SESSION["date"] = $date1;
            $_SESSION["description"] = $description1;
          }
         }
        catch(Exception $e){
          echo $e;
        }
      ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
		<meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
		<meta name="author" content="Yourname">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Morgenster</title>
		<link rel="stylesheet" href="css/event-pages.css">
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
			<div id= "eventImg" >
				<img src="uploade/<?php echo $photo1; ?>" title="eventImg" alt="Event 1">
			</div>
			<div class="mainContent">
				<p><?php echo "Date:$date1";?></p>
				<p><?php echo $description1;?></p>
			</div>
		</main>
	</body>
</html>
<?php session_destroy();?>