<?php

include_once "helpers/clientsApi.php";
$errors = [];
$notification = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['phone']) ){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        if ($name =='' || $email =='' || $pass1 =='' || $pass2 == '') $errors[] = "Invalid Information";

        if ($pass1 != $pass2){
            $errors[] = "Password not matched";
        }
        else{
            $sql = "SELECT id FROM `user_info` WHERE email = '$email'";
            $id = fetchIdBySql($sql);

            if(is_array($id)){
                $errors[] = "This email is already used";
            }

            if (count($errors) == 0){
                $pass1 = sha1($pass2);
                $pdo = false;
                require_once 'helpers/dbInfo.php';
                $pdo = new PDO("$dns", 'root', '');  //no error rfor $dns, it comes from dbInfo file
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO `user_info`(`name`, `email`, `password`) VALUES ('".$name."','".$email."','".$pass1."');";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $pdo = false;

                $notification = "Your account is created successfully, pls login in now";
            }

        }
    }
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>
    <meta charset="UTF-8">
    <title>Register</title>

    <link rel="stylesheet" href="CSS/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="container">
      <div class="title">Registration</div>
      <div class="content">
        <form action="#" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name" required name="name">
            </div>
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" placeholder="Enter your username" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Enter your email" required name="email">
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" placeholder="Enter your number" required name="phone">
            </div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="text" placeholder="Enter your password" required name="pass1">
            </div>
            <div class="input-box">
              <span class="details">Confirm Password</span>
              <input type="text" placeholder="Confirm your password" required name="pass2">
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1">
            <input type="radio" name="gender" id="dot-2">
            <input type="radio" name="gender" id="dot-3">
            <span class="gender-title">Gender</span>
            <div class="category">
              <label for="dot-1">
                <span class="dot one"></span>
                <span class="gender">Male</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="gender">Female</span>
              </label>
              <label for="dot-3">
                <span class="dot three"></span>
                <span class="gender">Prefer not to say</span>
              </label>
            </div>
          </div>
          <div class="button">
            <input type="submit" value="Register">
          </div>
        </form>
          <?php foreach($errors as $error): ?>
              <p style="color: red; text-align: center;"><?php echo $error; ?></p>
          <?php endforeach; ?>
          <?php if ($notification != ""): ?>
              <h4 style="color: green; text-align: center;">Your account is created successfully, pls <a href="signIn.php">login in</a> now</h4>
          <?php endif; ?>
      </div>
    </div>

  </body>

</html>