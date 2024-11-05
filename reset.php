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
            <form action="reset.php" method='POST'>
                <h1>furever pet system</h1>
                <br>
                <hr>
                <br>
                <h3>Reset password</h3>
                <div><label for="">Email</label></div>
                <div><input type="text" name="email"></div>
                <div><label for="">New Password</label></div>
                <div><input type="text" name="pass"></div>
                <div><label for="">Confirm password</label></div>
                <div><input type="password" name="password" id="pwd"></div>
                <div class="flex"><input type="checkbox" class="checkbox" id="check" onclick="showPwd()"> show/hide</div>
                <div><button name="btnChange">Change</button></div>
            </form>
        </section>
        <center><small>Pets online @ 2024</small></center>
    </main>
    <?php 
    if (isset($_POST['btnChange'])) {
        $conn=mysqli_connect("localhost","root","","pets");
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="UPDATE `customers` SET `password`='$password' WHERE email='$email'";

        $exec=mysqli_query($conn,$sql);
        
        if ($exec) {
            echo '
                <section>
                <div class="popBlack">
                    <div class="pop-up-div">
                        <center>
                            <div><strong>Success</strong></div>
                            <br>
                            <div>
                                <small>Password changed</small>
                            </div>
                            <div><a href="index.php"><button class="btnOK">Ok</button></a></div>
                        </center>
                    </div>
                </div>
            </section>
          ';
            
        }else{
            echo 'sql err';
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