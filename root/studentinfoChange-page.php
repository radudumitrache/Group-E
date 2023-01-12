<?php session_start();?>

<?php
  include("dbLink.php");
  include("testStudentinfo.php");
  
  if (empty($err) AND $_SERVER["REQUEST_METHOD"] == "POST") {
    $dis_studenID = filter_input(INPUT_POST, "dis_studenID", FILTER_SANITIZE_SPECIAL_CHARS);
    $dis_F_phone = filter_input(INPUT_POST, "dis_F_phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $dis_F_email = filter_input(INPUT_POST, "dis_F_email", FILTER_SANITIZE_SPECIAL_CHARS);
    $dis_S_phone = filter_input(INPUT_POST, "dis_S_phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $dis_S_email = filter_input(INPUT_POST, "dis_S_email", FILTER_SANITIZE_SPECIAL_CHARS);
    $dis_address = filter_input(INPUT_POST, "dis_address", FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if($_SERVER["REQUEST_METHOD"]=="POST" AND empty($err)){
    try{
      
      $phones = array($dis_F_phone, $dis_S_phone);
      $emails = array($dis_F_email, $dis_S_email);

      // select all parents
      $sql = "SELECT userID FROM parents LEFT JOIN parents_students on parents_students.parentID = parents.parentID where studentID = {$dis_studenID}";
      $stmt = $dbHandler->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll();
      if (count($results) == 0) {
        throw new Exception("No parent found!");
      }

      foreach($results as $i => $res){
        if (!isset($phones[$i])) {
          break;
        }

        $userID = $res["userID"];
        $sql = "UPDATE users SET email_address = :email, telephone_number = :phone, address = :address WHERE userID = $userID";
        $stmt = $dbHandler->prepare($sql);

        $stmt->bindParam(":phone", $phones[$i], PDO::PARAM_STR);
        $stmt->bindParam(":email", $emails[$i], PDO::PARAM_STR);
        $stmt->bindParam(":address", $dis_address, PDO::PARAM_STR);
        $stmt->execute();
      }
    } catch(Exception $ex) {
      $err[] = $ex->getMessage();
    }
  }

  if(!empty($err)){
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
  <link rel="stylesheet" href="css/studentInfo-page.css">
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

  <form class="main" action='studentinfoChange-page.php' method='POST' enctype="multipart/form-data">

    <h1 id="form_title">Admin</h1>

    <div class="event_form">

            <label for="title">Student ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="dis_studenID" placeholder="Input text"><br/>
       
            <label for="title">Parent 1 phone&nbsp;</label>
            <input type="text" name="dis_F_phone" placeholder="Input text"><br/>

            <label for="title">Parent 1 E-mail&nbsp;</label>
            <input type="text" name="dis_F_email" placeholder="Input text"><br/>

            <label for="title">Parent 2 phone&nbsp;</label>
            <input type="text" name="dis_S_phone" placeholder="Input text"><br/>

            <label for="title">Parent 2 E-mail&nbsp;</label>
            <input type="text" name="dis_S_email" placeholder="Input text"><br/>

            <label for="title">Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="dis_address" placeholder="Input text"><br/>

          <div class="edit">
            <input type='submit' value='Submit'>
          </div>
 
    </div>

  </form>

</body>
</html>
