<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
  <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
  <meta name="author" content="Yourname">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Morgenster</title>
  <link rel="stylesheet" href="css/resetPass-page.css">
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
        <a class="button3" href="home-page.php">
          <button>Home</button>
        </a>
      </li>

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
    <div id="formContainer">
    <form action="<?php  html_entities($_SERVER['PHP_SELF'])?>" method="post">
      <h1>Reset Password</h1>
      <label for="email">Enter your E-mail </label>
      <input type="text" id="email" name="email">
      <label for="code">Enter the code</label>
      <input type="text" id="code" name="code">
      <input type="submit" id="submit" name="sendCode" value="Send code">
    </form>
    <form action="<?php  html_entities($_SERVER['PHP_SELF'])?>" method="post">
      
      <label for="newPass">New Password</label>
      <input type="text" id="newPass" name="newPassword">
      <div id="buttonContainer">
        <input type="submit" id="submit" name="submit" value="Submit">
      </div>
      </form>
    </div>
  </main>
</body>
</html>
