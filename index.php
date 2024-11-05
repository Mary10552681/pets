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
            <form action="index.php" method='POST'>
                <h1>furever pet system</h1>
                <br>
                <hr>
                <br>
                <h3>Sign in</h3>
                <div><label for="">email</label></div>
                <div><input type="text" name="email"></div>
                <div><label for="">password</label></div>
                <div><input type="password" name="password" id="pwd"></div>
                <div class="flex"><input type="checkbox" class="checkbox" id="check" onclick="showPwd()"> show/hide</div>
                <div><button name="btnlogin">Login</button> <small>Forgot password ? <a href="reset.php">Reset</a></small></div>
                <small><a href="signup.php">Regitser</a></small>
                <small>Are you administrator <a href="admin-login.php">Admin</a></small>
            </form>
        </section>
        <center><small>Pets online @ 2024</small></center>
    </main>
    <?php 
    if (isset($_POST['btnlogin'])) {
        $conn=mysqli_connect("localhost","root","","pets");
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT * FROM `customers` WHERE email='$email' and password='$password'";

        $exec=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($exec);

        if($count > 0){
            $_SESSION["user"]=$email;
              header('location:home.php');
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
                      <div><a href="index.php"><button class="btnOK">Ok</button></a></div>
                  </center>
              </div>
          </div>
      </section>
          ';
         }

    }
    ?>
    <script>
        const check=document.getElementById('check');
        const pwd=document.getElementById('pwd');

        function showPwd() {
            if (check.checked) {
            pwd.type="text";
            
        }else{
            pwd.type="password";
        }
        }
        

    </script>
</body>
</html>