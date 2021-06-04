<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconn.php';
    $alert = false;
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $contact = $_POST["contact"];
    $username = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;
    $existsSql = "SELECT * from users where email='$username'";
    $result = mysqli_query($conn, $existsSql);
    $numRowsExist = mysqli_num_rows($result);
    if ($numRowsExist > 0)
        echo "Username Already Exists";
    //   $exists = true;
    else {
        // $exists = false;
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (fname, lname, contact, email, password, date) VALUES ('$fname', '$lname', '$contact', '$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $alert = true;
                echo "<script> alert('Successfully created ! Sign In to continue'); </script>";
            } else {
                echo "<script> alert('Passwords do not match'); </script>";
            }
        }
    }
}
?>

<!doctype html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="website/css/sellform.css">
    <style>
        body {
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-size: 100% 100%;
            color: white;
            word-wrap: nowrap;
            width: auto;
            position: relative;
        }

        footer {
            background-color: rgb(0, 0, 36);
            color: white;
            opacity: 0.9;
            height: 60px;
            margin-top: 40px;
            box-shadow: 2px 0px 10px 0px black;
            box-sizing: border-box;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        fieldset {
            width: 70%;
            height: 70%;

        }

        .sign {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        label {
            text-align: right;
            font-size: larger;
            padding-top: -20px;
            margin-top: -20px auto;
        }

        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number],
        input[type=date] {
            width: 100%;
            padding: 12px 12px;
            margin-top: -20px;
            height: 11%;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: content-box;

        }

        td {
            display: inline-block;
        }

        th {
            display: inline-block;
            width: 294px;
        }

        button {
            background-color: rgb(0, 0, 36);
            color: white;
            padding: 15px 30px;
            margin: 25px 40px;
            border: none;
            cursor: pointer;
            width: auto;
            border-radius: 8px;
            word-wrap: normal;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: -20px;
        }

        .vl1 {
            margin-bottom: -20px;
            height: 135px;
            border-left: 2px solid gold;
            position: absolute;
            left: 18%;
        }

        .vl2 {
            margin-bottom: -20px;
            height: 135px;
            border-left: 2px solid gold;
            position: absolute;
            margin-top: 0px auto;
            left: 28%;
        }

        .row {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        #text {
            font-size: x-large;
        }

        .q {
            margin: -20px;
            color: rgb(0, 0, 36);
            padding-left: 181px;
        }

        .formfill {
            background-image: linear-gradient(180deg, rgb(0, 0, 36), rgb(118, 201, 248));
            opacity: 95%;
            display: flex;
            justify-content: center;
            width: auto;
        }

        @media (max-width:767.98px) {
            .q {
                margin: -20px;
                color: rgb(0, 0, 36);
                padding-left: 0px;
            }

            button {
                background-color: rgb(0, 0, 36);
                color: white;
                padding: 5px 18px;
                margin: 25px 40px;
                margin-left: 0px;
                border: none;
                cursor: pointer;
                width: auto;
                border-radius: 8px;
                word-wrap: normal;
                display: block;
            }
        }
    </style>
</head>

<body text="cyan" background="books.jpg">
    <header class="nav" style="background-color: rgb(0, 0, 36);">
        <div class="bar">
            <a href="index.php" class="previous">&#8249;-</a>
            <span class="tname" style="color: white">Deal It</span>
        </div>
    </header>
    <div class="formfill container">
        <fieldset dir="ltr">
            <legend>
                <h1>SIGN UP!</h1>
            </legend>
            <form action="register.php" method="post">
                <table class="row">
                    <h2>
                        <tr>
                            <th>
                                <label id="text" for="fname"><b>First Name :</b></label>
                            </th>
                            <td>
                                <br> <input type="text" maxlength="30" placeholder="Enter First Name" name="fname" required><br>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><label id="text" for="lname"><b>Last Name :</b></label>
                            </th>
                            <td>
                                <br><input type="text" maxlength="30" placeholder="Enter Last Name" name="lname" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><label id="text" for="contact"><b>Contact :</b></label>
                            </th>
                            <td>
                                <br><input type="number" maxlength="255" placeholder="Enter Contact Number" name="contact" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><label id="text" for="email"><b>Email Id :</b></label>
                            </th>
                            <td>
                                <br><input type="email" maxlength="40" placeholder="Enter Email Id" name="email" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><label id="text" for="password"><b>Password : </b></label>
                            </th>
                            <td>
                                <br><input type="password" maxlength="20" minlength="6" placeholder="Enter Password" name="password" required>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <br><label id="text" for="cpassword">Confirm Password :</label>
                            </th>
                            <td>
                                <br><input type="password" maxlength="20" minlength="6" placeholder="Enter Password Again" name="cpassword" required>
                            </td>
                        </tr>
                        <br>
                    </h2>
                </table>
                <div class="bottom">
                    <div class="sign">
                        <button type="submit" style="font-size: large;"><strong>SIGN UP</strong></button>

                        <button type="submit" style="font-size: large;"><strong><a href="index.php" style="text-decoration: none; color:white;">CANCEL</a></strong></button>
                    </div>
                    <h2 class="q"><br>Already have an account? <a href="login.php" style="color: rgb(0,0,36);">SIGN IN</a></h2>
                    <br>
                </div>
            </form>
        </fieldset>
    </div>
    <footer>
        <div>
            DEAL IT &#169; 2020
        </div>
    </footer>
</body>

</html>