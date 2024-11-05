<?php session_start(); ?>
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
        <section class="auth-section1">
            <form action="signup.php" method="POST">
               <div>
                    <h1>Create an account with pets Online System</h1>
                    <br>
                    <div><label for="">Fullname</label></div>
                    <div><input type="text" name="fname"></div>
                    <div><label for="">Phone</label></div>
                    <div><input type="text" name="phone"></div>
                    <div><label for="">Address</label></div>
                    <div><input type="text" name="address"></div>
               </div>
               <div>
               <div>
                <br><br>
                <br>
                    <label for="">Email</label></div>
                    <div><input type="text" name="email"></div>
                    <div><label for="">password</label></div>
                    <div><input type="text" name="password"></div>
                    <div><label for="">confirm Password</label></div>
                    <div><input type="text" name="cpassword"></div>
                    <div><button class="btnReg" name="btnCreate">Create account</button></div>
                    <center>or you have an account <a href="index.php">Login</a></center>
               </div>
            </form>
        </section>
        <center><small>Pets online @ 2024</small></center>
    </main>
  
</body>
</html>

<?php
    if (isset($_POST['btnCreate'])) {
        $conn=mysqli_connect("localhost","root","","pets");
        $fname=$_POST['fname'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql_insert="INSERT INTO `customers`(`id`, `name`, `email`, `phone`, `address`, `password`) VALUES (null,'$fname','$email','$phone','$address','$password')";

        $xec=mysqli_query($conn,$sql_insert);

        if ($xec) {
            echo '
              <section class="popBlack">
                <div class="pop-up-div">
                    <div><center><strong>Success !</strong></center></div>
                    <center>
                        <div class="imgCheck">
                            <center>
                                <img src="public/img15.png" alt="" class="img">
                            </center>
                        </div>
                        <small>Account created successfull</small>
                        <div>
                            <center><a href="index.php"><button>OK</button></a></center>
                        </div>
                    </center>
                </div>
            </section>
            ';
        }else{
            echo "something went wrong";
        }

    }


?>