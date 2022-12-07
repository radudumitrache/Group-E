<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
  <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
  <meta name="author" content="Yourname">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Morgenster</title>
  <link rel="stylesheet" href="css/parentScores-page.css">
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
        <a class="button1" href="home-page.php">
          <button>Sign out</button>
        </a>
      </li>

    </ul>

  </div>

</header>

	<?php
		$dbHandler = null;
		try{
			$dbHandler = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "root", "qwerty");
		}catch(Exception $ex){
			echo $ex;
		}
		
		if($dbHandler){
			try{
				$sql = $dbHandler->prepare( "SELECT * FROM parent_scores;" ); 
				$sql->execute();				
			}catch(Exception $ex){
				echo $ex;
			}
			
			if($sql->rowCount() > 0){
				while($result = $sql->fetch(PDO::FETCH_ASSOC)){
					var_dump($result);
					
				}
			
			}
			else{
				echo "count went wrong";
			}
			
		}
		

	?>

</body>
</html>
