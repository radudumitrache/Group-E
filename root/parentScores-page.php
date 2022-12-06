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
	
	
		function table_function($sql, $line="\n") {
			$htmltable =  "<table>" . $line; 
			$counter   = 0;
			while( $row = $sql->fetch_assoc()  ){
				if ( $counter===0 ) {
					$htmltable .=   "<tr>"  . $line;
					foreach ($row as $key => $value ) {
						$htmltable .=   "<th>" . $key . "</th>"  . $line;
					}
					$htmltable .=   "</tr>"  . $line; 
					$counter = 8;
				}
				$htmltable .=   "<tr>"  . $line;
				foreach ($row as $key => $value ) {
					$htmltable .=   "<td>" . $value . "</td>"  . $line;
				}
				$htmltable .=   "</tr>"   . $line;
			}
			$htmltable .=   "</table>"   . $line; 
			return( $htmltable ); 
			}

		
		try{
			$dbHandler = new PDO("mysql:host=mysql;dbname=test;charset=utf8", "root", "qwerty");
			$sql = $dbHandler->query( "SELECT * FROM parent_scores LIMIT 1 ;" ); 
			echo table_function( $sql, $line="\n" ); 
		}catch(Exception $ex){
			echo $ex;
		}

	?>

</body>
</html>
