<?php session_start();?>

<?php
  include("dbLink.php");

  // get the userid
  $userID = $_SESSION["user"]["userID"];
  //$userID = 1001;

  try{
    //$stmt = $dbHandler -> prepare("SELECT photo, telephone_number, email_address FROM users where userID = $userID");
    $stmt = $dbHandler -> prepare("SELECT user_photo, telephone_number, email_address FROM users where userID = $userID");
    $stmt->execute();
    $stmt->bindColumn(1, $photo);
    $stmt->bindColumn(2, $phone);
    $stmt->bindColumn(3,$email);

 
    while ($resule = $stmt->fetch()) {
      $_SESSION["phone"] = $phone;
      $_SESSION["email"] = $email;
    }
  }
  catch(Exception $ex){
    echo $ex;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_FILES['file_upload']) || !$_FILES["file_upload"]['size']) {
      $err[] = "Forgot photo!";
    }
    
    if (empty($err)) {
      try{
        // rename filename 
        $types = explode("/", $_FILES["file_upload"]["type"]);
        $image = md5(uniqid()) . "." . $types[1];
        
        // move file to folder
        $folder = "./uploade/" . $image;
        $rs = move_uploaded_file($_FILES["file_upload"]['tmp_name'], $folder);
        
        // if move file success, insert data to database
        if ($rs) {
          //$stmt = $dbHandler -> prepare("UPDATE users SET photo = :newImg WHERE userID = $userID");
          $stmt = $dbHandler -> prepare("UPDATE users SET user_photo = :newImg WHERE userID = $userID");
          
          $stmt->bindParam(":newImg", $image, PDO::PARAM_STR);
          $stmt ->execute();
          $stmt ->rowCount();
          $dbHandler = NULL;
          $photo = $image;
        } else {
          echo "Upload photo fail!";
        }
        
      }
      catch(Exception $ex){
        echo $ex;
      }
    }
  }
  
  if (isset($err) && !empty($err)) {
    foreach ($err as $i) {
      echo $i;
      echo "<br>";
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
  <link rel="stylesheet" href="css/teacherChangephoto-page.css">
  <link rel="icon" href="img/logo.svg">

</head>

<body>

  <div id="container">
    
    <header>

      <div>
        <a class="logo" href="home-page.php">
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

      <div class="backbutton">
        <a href="teacherProfile-page.php"><img src="img/backbutton.png" alt="backbutton"></a>
      </div>

      <div id="mainContent">
        
          <h1 class="textSettings">Profile</h1>

          <img class = "image" src="uploade/<?php echo $photo; ?>" title="teacherImg" alt="teacherImg">
          <form method="POST" enctype="multipart/form-data">

          <label class="textSettings"  for="file_upload">Choose file</label>
          <input class="textSettings" type="file" name="file_upload">

          <input  type="submit" name="submit" value="Submit">
          </form>
          <h3 class="textSettings"><?php echo "Phone number:$phone";?></h3>
          <h3 class="textSettings"><?php echo "E-mail:$email";?> </h3>
          <div class="button1" href="teacherClasses-page.php"><button>Classes</button></div>

      </div>

      
    </main>


  </div>

</body>
</html>
