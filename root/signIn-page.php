<?php
  session_start();
  include("databaseConnect.php");
  $sql="SELECT email_address,password,role FROM users";
  $stm=$dbhandler->query($sql);
  $accounts=$stm->fetchall(PDO::FETCH_ASSOC);
  
  if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
    $pass=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
   if (strlen($email)!=0)
   {
    foreach ($accounts as $account)
    {
      if ($account["email_address"]==$email)
      {
          $_SESSION["user"]=$account;
          break;
      }
    }
    if (isset($_SESSION["user"]))
    {
     
      if ($_SESSION["user"]["password"]==$pass)
        {
          if ($_SESSION["user"]["role"]==1)
            header("Location: parentMain-page.php");
          else if($_SESSION["user"]["role"]==0)
            header("Location: teacherMain_page.php");
        }
      else
        echo "<script>alert('Wrong password')</script>";
    }
    
   }
   else
    echo "<script>alert('Invalid email')</script>";
    
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
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    <label for="password">Password</label>
    <input type="text" id="password" name="password">
    <div id="footerInfo">
      <a href="resetPass-page.php">Forgot your password?</a>
      <input type="submit" id="submit" name="submit" value="Sign In">    
    </div>
  </form>
</main>
</body>
</html>
