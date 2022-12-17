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
      <h1> Reset Password</h1>
      <form id="codeForm" action="<?php  html_entities($_SERVER['PHP_SELF'])?>" method="post">  
        <label for="email">Enter your E-mail</label>
        <div id="codeInfo">
          <input type="text" id="emai" name="email">
          <input type="submit" name="sendCode">  
        </div>
      </form>
      <form action="<?php  html_entities($_SERVER['PHP_SELF'])?>" method="post">
        <label for="code">Enter code </label>
        <input type="text" id="code" name="fillCode">
        <label for="newPass">New Password</label>
        <input type="text" id ="newPass" name="newPass"> 
        <input type="submit" id="submit" name="submit">
      </form>
    </div>





  </main>
</body>
</html>
