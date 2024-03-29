<?php session_start();?>

<?php
        include("connection.php");

        try{
          $stmt = $conn -> prepare("SELECT events_school.photo, events_school.event_date, events_school.event_description FROM events_school WHERE eventID = 3 ORDER BY eventID DESC LIMIT 0,1");
          $stmt->execute();
          $stmt->bindColumn(1, $photo);
          $stmt->bindColumn(2, $date);
          $stmt->bindColumn(3,$description);

           while ($resule = $stmt->fetch()) {
            $_SESSION["date"] = $date;
            $_SESSION["description"] = $description;
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
			<a class="logo" href="index.php">
				<img src="img/logo.svg" alt="logo">
			</a>
			<div class="listcontainer">
				<ul class="headerList">
					<li>
						<a class="button2" href="index.php">
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
				<img src="uploade/<?php echo $photo; ?>" title="eventImg" alt="Event 1">
			</div>
			<div class="mainContent">
				<p><?php echo "Date:$date";?></p>
				<p><?php echo $description;?></p>
			</div>
		</main>
	</body>
</html>
<?php session_destroy();?>