<?php

require_once "helpers/clientsApi.php";
$errors =[];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['email']) && isset($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM `user_info` WHERE email = '$email';";
        $user = fetchIdBySql($sql);

        if (is_array($user)){
            if($user['password'] == sha1($pass)){
                // login success
                session_start();
                $_SESSION["user"] = $user;
                header("Location: index.php");
            }
            else{
                // invalid pass
                $errors[] = "INVALID PASSWORD";
            }
        }
        else{
            // no account with this email
            $errors[] = "No account with this email, pls <a href='registration.php' style='color: #26B2F3'>Register Now</a>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="./CSS/signupcss.css">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <!-- <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn">Sign In</button>
               
            </div> -->
            <h1>Sign IN</h1>
            <div class="social-icons">
                <img src="./img/fb.png" alt="">
                <img src="./img/gp.png" alt="">
                <img src="./img/tw.png" alt="">
            </div>
            <form action="" id="login" class="input-group" method="post">
                <input type="text" name="email" id="" class="input-field" placeholder="User Id" required>
                <input type="password" name="pass" id="" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log In</button>
                
                <div class="extra">
                    <p>Don't have an account? <a href="registration.php" style="color: #26B2F3">Register Now</a></p>
                    <?php foreach ($errors as $error):  ?>
                        <p style="text-align: center; color: red; margin-top: 8px;"><?php echo $error; ?></p>
                    <?php endforeach;  ?>
                </div>
            </form>

            
            
        </div>
        
    </div>

    
</body>
</html>