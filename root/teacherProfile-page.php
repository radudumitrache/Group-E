<?php session_start();?>

<?php
        include("connection.php");

       // get the userid
        $userID = $_SESSION["user"]["userID"];
        
        try{
          $stmt = $conn -> prepare("SELECT user_photo, telephone_number, email_address FROM users where userID = $userID");
          $stmt->execute();
          $stmt->bindColumn(1, $photo);
          $stmt->bindColumn(2, $phone);
          $stmt->bindColumn(3,$email);

          
          while ($resule = $stmt->fetch()) {
            $_SESSION["phone"] = $phone;
            $_SESSION["email"] = $email;
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
  <link rel="stylesheet" href="css/teacherProfile-page.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <div id="container">
    
    <header>

      <div>
        <a class="logo" href="index.php">
          <img src="img/logo.svg" alt="logo">
        </a>
      </div>

      <div class="listContainer">
        <ul class="headerList">
          <li>
            <a class="button1" href="signIn-page.php">
              <button>SignOut</button>
            </a>
          </li>
        </ul>
      </div>

    </header>

    <main>
      <div id="mainContent">
          <h1 class="textSettings">Profile</h1>
          <img class = "image" src="uploade/<?php echo $photo; ?>" title="teacherImg" alt="teacherImg">
          <a class="textSettings" href="teacherChangephoto-page.php">Change profile photo</a>
          <h3 class="textSettings"><?php echo "Phone number:$phone";?></h3>
          <h3 class="textSettings"><?php echo "E-mail:$email";?> </h3>
          <a class="button1" href="teacherClasses-page.php"><button>Classes</button></a>

      </div>

      
    </main>


  </div>

</body>
</html>
