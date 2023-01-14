<?php
  session_start();
  include("connection.php");
  $sql="SELECT `userID`,`email_address`,`password`,`role` FROM `users`";
  $stm=$conn->query($sql);
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
     //since the accounts will be provided by the school and not created by us , We tested the sign in without
     // a hash but in the real scenario everything will be hashed and secure, the first part of the if not existing
      if ($_SESSION["user"]["password"]==$pass|| password_verify($pass,$_SESSION["user"]["password"]))
        {
          if ($_SESSION["user"]["role"]=="parent")
            { 
              $sql="SELECT parentID FROM parents where userID=:id";
              $stmt=null;
              try
              {
                $stmt=$conn->prepare($sql);
                $stmt->bindParam(":id",$_SESSION["user"]["userID"],PDO::PARAM_INT);
                $stmt->execute();
              }
              catch (Exception $e)
              {
                $message=$e->getMessage();
                echo "<script>alert('Something went wrong ->$message')</script>";
              }
              if (isset($stmt))
              {
                if ($stmt->rowCount()==1)
                {
                    $rez=$stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["parentID"]=$rez["parentID"];
                   
                }
                else
                {
                  echo "<script>alert('Error Database not correct')</script>";
                }
              }
              header("Location:parentMain-page.php");
            }
          else if($_SESSION["user"]["role"]=="teacher")
            {
              $sql="SELECT teacherID FROM teachers where userID=:id";
              $stmt=null;
              try
              {
                $stmt=$conn->prepare($sql);
                $stmt->bindParam(":id",$_SESSION["user"]["userID"],PDO::PARAM_INT);
                $stmt->execute();
              }
              catch (Exception $e)
              {
                $message=$e->getMessage();
                echo "<script>alert('Something went wrong ->$message')</script>";
              }
              if (isset($stmt))
              {
                if ($stmt->rowCount()==1)
                {
                    $rez=$stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["teacherID"]=$rez["teacherID"];
                }
                else
                {
                  echo "<script>alert('Error Database not correct')</script>";
                }
              }
              header("Location:teacherMain-page.php");
            }
          else if ($_SESSION["user"]["role"]=="admin")
            header("Location: adminMain-page.php");
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
    <input type="text" id="email" name="email" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <div id="footerInfo">
      <a href="resetPass-page.php">Forgot your password?</a>
      <input type="submit" id="submit" name="submit" value="Sign In">    
    </div>
  </form>
</main>
</body>
</html>
