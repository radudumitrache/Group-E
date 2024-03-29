<?php
  include("connection.php");  
  $err=[];
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
  $codeEnter = filter_input(INPUT_POST, 'fillCode', FILTER_VALIDATE_INT);
  $password = filter_input(INPUT_POST, 'newPass', FILTER_SANITIZE_SPECIAL_CHARS);
  $codeReceive=null;
  if(!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
  }

  if(isset($_POST["sendCode"])){

    if(!empty($_POST['email'])){

      if(empty($email)){
        $err[] = "Invalid email<br>";
      }else{
        echo "<script>alert('Code has been sent')</script>";
      }

    }else{
      $err[] = "Enter email";
    }

    if(count($err) > 0){
      echo "<ul>";
          foreach($err as $error){
              echo "<li>$error</li>";
          }
      echo "</ul>";
  }

  }

  if(isset($_POST["submit"])){

    if(!empty($_POST['email'])){

      if(empty($email)){
        $err[] = "Invalid email<br>";
      }
      
    }else{
      $err[] = "Enter email";
    }

    if(empty($_POST['fillCode'])){
      $err[] = "Code is missing";
    }else{
      if(empty($codeEnter)){
        $err[] = "Invalid code<br>";
      }
    }
    if(empty($_POST['newPass'])){
      $err[] = "Enter a new password";
    }

    if(count($err) > 0){
      echo "<script>alert(";
          foreach($err as $error){
              echo "$error\n";
          }
      echo ");</script";
    }

  }
  
  if($email!="")
  {
   // 1.1 generate the code
    function randomPassword() {
      $scope = "0123456789";
      $pass = []; 
      $scopeLength = strlen($scope) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $scopeLength);
          $pass[] = $scope[$n];
      }
      return implode($pass); //turn the array into a string
      }
     if(count($err) == 0){
   //   function for random password 
       $codeReceive = randomPassword();
    //1.2
    /*send the code to the email
    task out of scope

    1.3 if the code is correct - update the password
    */
     if(isset($_POST["submit"]) && $codeEnter = $codeReceive){
           $sql = $conn->prepare("UPDATE users SET password=:password WHERE email_address=:email");
           $sql->bindParam(":password", $hashed_password);
           $sql->bindParam(":email", $email);
           $sql->execute();
           echo "<script>alert('password has been changed')</script>";
         }
     }
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
  <link rel="stylesheet" href="css/resetPass-page.css">
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
        <a class="button3" href="index.php">
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
      <form id="codeForm" action="resetPass-page.php" method="post">  
        <label for="email">Enter your E-mail</label>
        <div id="codeInfo">
          <input type="text" id="email" name="email" <?= isset($_POST["email"]) ? "value='" . $_POST["email"] . "'" : "" ?>>
          <input type="submit" name="sendCode">  
        </div>
        <label for="code">Enter code </label>
        <input type="text" id="code" name="fillCode" value="<?php echo isset($codeReceive)? $codeReceive : "" ;?>">
        <label for="newPass">New Password</label>
        <input type="text" id ="newPass" name="newPass"> 
        <input type="submit" id="submit" name="submit">
      </form>
    </div>
  </main>
</body>
</html>
