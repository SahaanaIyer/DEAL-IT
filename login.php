<?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/dbconn.php';
  $username = $_POST["uname"];
  $password = $_POST["passw"];
  
  $sql = "SELECT * from users where email='$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while($row = mysqli_fetch_assoc($result)){
      
      $new_pass = $row['password'];
      
      if(password_verify($password, $new_pass)) {
                                  $escapedPW = mysqli_real_escape_string($conn,$_REQUEST['password']);

                                  //save this user and pass as cookie if remeber checked start
                                  if (isset($_REQUEST['remember']))
                                      $escapedRemember = mysqli_real_escape_string($conn,$_REQUEST['remember']);
                            
                                  $cookie_time = 60 * 60 * 24 * 30; // 30 days
                                  $cookie_time_Onset=$cookie_time+ time();
                                  if (isset($escapedRemember)) {
                                      setcookie("uname", $usernameVal, $cookie_time_Onset);
                                      setcookie("passw", $escapedPW, $cookie_time_Onset);  
                                  } 
                                  else {
                                      $cookie_time_fromOffset=time() -$cookie_time;
                                      setcookie("uname", '',$cookie_time_fromOffset );
                                      setcookie("passw", '', $cookie_time_fromOffset);          
                                  }
        
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");   
      }
      else {
          echo "<script> alert('Invalid Credentials'); </script>";
      }
    }
  }
  else {
      echo "<script> alert('Invalid Credentials'); </script>";
  }
}

?>

<!doctype html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="website/css/sellform.css">
         <style>
            fieldset{
              padding: left 300;
              padding-top: -100px;
              margin: 0 auto;
              width:600px;
              height: 470px;
            }
            label{
              width: 200px;
              text-align:left;
            }
            input[type=text], input[type=password] {
               width: 100%;
               padding: 12px 20px;
               margin: 3px 0;
               height: 11%;
               display: inline-block;
               border: 1px solid #ccc;
               box-sizing: border-box;
            }
            button {
               background-color: rgb(0,0,36);
               /* color:gold; */
               padding: 10px 10px;
               margin: -6px 0;
               border: none;
               cursor: pointer;
               width: 48%;
               height: 50px;
            }
            #image {
               margin: 0 auto;
               padding-top: 1%;
            }
            #login{
              margin: -5px auto; 
              color: white;
            }
            .logo{
              width:20%;
              border-radius: 50%;
              margin: -20px;
            }
            .text {
               position: fixed;
               margin: 0 auto;
               left:0;
               right:0;
               top: 10%;
               padding: 6px;
               text-align: justify;
            }
            span.forgotpsw{
              float:right;
              padding-top: 20px;
            }
            .formfill {
              width: 50%;
            }
            #text {
              color: white;
              font-size: x-large;
            }
        </style>
    </head>
 
    <body text="black" width="100%" height="100%">
    <header class="nav" style="background-color: rgb(0, 0, 36);">
        <div class="bar">
            <a href="index.php" class="previous">&#8249;-</a>
            <span class="tname" style="color: white">Deal It</span>
        </div>
    </header>
    <div class="formfill" style="background-image: linear-gradient(180deg, rgb(0,0,36),  rgb(118, 201, 248)); opacity: 95%;">
      <form action="login.php" method="post"> 
          <br><br><br>
          <table class="text"><br><br>
            <fieldset dir="ltr">
              <legend style="padding-top: -50px; color:white;"><h1>LOGIN</h1></legend>  <br>
                <label align="left" id="text" for="uname"><b>Username</b></label>
                <br>
                <input type="text" value="<?php if(isset($_COOKIE['uname'])) echo $_COOKIE['uname']; ?>" placeholder="Enter registered E-mail id" name="uname" required>
                <br><br>
                <label for="passw" id="text"><b>Password</b></label>
                <br>
                <input type="password" maxlength="20" minlength="6" placeholder="Must be atleast 6 characters" value="<?php if(isset($_COOKIE['passw'])) echo $_COOKIE['passw']; ?>" name="passw" required><br><br>
                <br>
                <div class="form-group" style="display: flex; flex-direction: row; margin-top:-24px; margin-bottom:3px;">
                    <span class="forgotpsw" style="margin-left: 10px;">
                      <input type="checkbox" name="remember" <?php if(isset($_COOKIE['uname'])){echo "checked='checked'"; } ?> value="1">
                      <label for="remember" id="text">Remember Me</label>
                      <a href="forgot_passw.php" style="margin-left: 210px; text-decoration: none; color:rgb(0,0,36); font-size: x-large;"><b>Forgot Password?</b></a>
                    </span>
                </div><br><br>
                <div class="container sub" style="display: flex; flex-direction: row;">
                    <button type="submit" id="login" style="font-size: large;">LOGIN</button>
                    <button class="signup" type="submit"><a href="register.php" style="text-decoration: none; color:white; font-size: large;">SIGN UP</a></button>
                </div><br><br>
            </fieldset>
          </table>
            <br><br><br><br><br><br><br><br><br>
      </form>
    </div>  
      <footer style="color: rgb(0,0,36);">
          <div>
              DEAL IT &#169; 2020
          </div>
      </footer>
    </body>
</html>
