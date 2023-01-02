<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
  <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
  <meta name="author" content="Yourname">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Morgenster</title>
  <link rel="stylesheet" href="css/signIn-page.css">
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
          <button>Home</button>
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
  <form method="post">
    <h1>Sign in</h1>
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="text" id="password" name="password">
    <div id="footerInfo">
      <a href="resetPass-page.php">Forgot your password?</a>
      <input type="submit" id="submit" name="submit" value="Sign In">    
    </div>
  </form>
  <?php
  include("databaseConnect.php");
  $sql="SELECT email_address,password,role FROM users";
  $stm=$dbhandler->query($sql);
  $accounts=$stm->fetchall(PDO::FETCH_ASSOC);
  if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $_POST=filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);
    
  }

  ?>

</main>
</body>
</html>
