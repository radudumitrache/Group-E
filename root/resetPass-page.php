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

      <h1>Reset Password</h1>

      <div class="forms">

        <form action="<?php  htmlentities($_SERVER['PHP_SELF'])?>" method="post" class="form1">

          <div class="input1">
            <label for="email">Enter your E-mail</label>
              <input type="email" id="email" name="email">
          </div>

          <div class="input1">
            <label for="code">Enter the code</label>
            <div class="input2">
                <input type="text" id="code" name="code">
                <input type="submit" id="submit1" name="sendCode" value="Send code">
            </div>
          </div>

        </form>

        <form action="<?php  htmlentities($_SERVER['PHP_SELF'])?>" method="post" class="form1">
        <div>
          <label for="newPass">New Password</label>
          <div class="input2">
            <input type="text" id="code" name="newPassword">
            <input type="submit" id="submit1" name="submit" value="Submit">
          </div>
        </div>

        </form>

      </div>

    </div>
  </main>
</body>
</html>
