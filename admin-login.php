<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <section class="auth-section">
            <form action="admin-login.php" method='POST'>
                <h1>Admin Login</h1>
                <br>
                <hr>
                <br>
                <h3>Signin</h3>
                <div><label for="">email</label></div>
                <div><input type="text" name="email"></div>
                <div><label for="">password</label></div>
                <div><input type="text" name="password"></div>
                <div class="flex"><input type="checkbox" class="checkbox"> show/hide</div>
                <div><button name="btnlogin1">Login</button> <small>Forgot password ? <a href="#">Reset</a></small></div>
                <small><a href="signup.php">Regitser</a></small>
            </form>
        </section>
        <center><small>Pets online @ 2024</small></center>
    </main>
    <?php 
    if (isset($_POST['btnlogin1'])) {
        $conn=mysqli_connect("localhost","root","","pets");
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * FROM `customers` WHERE email='$email' and password='$password'";

        $exec=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($exec);

        if($email =="admin@gmail.com" && $password=="admin123"){
            $_SESSION["user"]='Admin1';
              header('location:admin.php');
         }else{
          echo '
          <section>
          <div class="popBlack">
              <div class="pop-up-div">
                  <center>
                      <div><strong>Failed</strong></div>
                      <br>
                      <div>
                          <small>Incorect username or password !</small>
                      </div>
                      <div><a href="admin-login.php"><button class="btnOK">Ok</button></a></div>
                  </center>
              </div>
          </div>
      </section>
          ';
         }

    }
    ?>
</body>
</html>