<?php
session_start();
$_SESSION['message'] = '';

$mysqli = new mysqli('localhost', 'root', 'root@777', 'luke');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //pass equal
    if ($_POST['password'] == $_POST['confirmpassword']){

        // print_r($_FILES); die;

        $fullname = $mysqli->real_escape_string($_POST['fullname']);
        $mobile = $mysqli->real_escape_string($_POST['mobile']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = md5($_POST['password']);
        $image_path = $mysqli->real_escape_string('images/'.$_FILES['image']['name']);

        //check image
        if (preg_match("!image!", $_FILES['image']['type'])){

            // coppy image to images/ 
            if (copy($_FILES['image']['tmp_name'], $image_path)){

                $_SESSION['username'] = $username;
                $_SESSION['image'] = $image_path;

                $sql = "INSERT INTO users (fullname, mobile, email, username, password, image) "
                        ."VALUES ('$fullname', '$mobile', '$email', '$username', '$password', '$image_path')";

                //if query is successful
                if ($mysqli->query($sql) === true) {
                    $_SESSION['message'] = "Registration Succesfull";
                    header("location: login.php");
                }
                else {
                    $_SESSION['message'] = "User could not be entered!";
                }
            } 
            else {
                $_SESSION['message'] = "File upload failed";
            }

        }
        else {
            $_SESSION['message'] = "Not an Image";
        }
    }
    else {
        $_SESSION['message'] = "Password not match";
    }
}
?>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message']?></div>
      <input type="text" placeholder="Full Name" name="fullname" required />
      <input type="text" placeholder="Mobile No" name="mobile" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="text" placeholder="User Name" name="username" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <div class="avatar"><label>Select your image: </label><input type="file" name="image" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
      <a href="login.php">Already Registered? Login</a>
    </form>
  </div>
</div>