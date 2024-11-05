<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt pet</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="navtop">
        <?php include 'navbar.php' ?>
    </header>
    <main class="main" onclick="closeMenu()">
        <section class="conatiner-1 about-container">
            <div class="about-imgDiv">
                <?php
                    if (isset($_POST['btnAdopt'])) {
                        $petname=$_POST['name'];
                        $description=$_POST['description'];
                        $fees=$_POST['fees'];
                        $image=$_POST['image'];
                        
                    }
                ?>
                
                <br>
                <img src="uploads/<?php echo $image ?>" alt="" class="img">
                <div class="detDed">
                    <h4><?php echo $petname ?></h4>
                    <p><?php echo $description ?></p>
                    <p><small>Adoption fee <strong>KSh. <?php echo $fees;  ?></strong></small></p>
                </div>
            </div>
            <div class="about-imgDiv bg-white">
                <form action="handlers/adoptH.php" method="POST">
                    <div class="detDed">
                        <h4>Provide your infomation</h4>
                    </div>
                    <br>
                    <div action="adopt.php" method="POST" class="form-det">
                        <div><label for="">Name</label></div>
                        <div><input type="text" name="name" required="true"></div>
                        <div><label for="">Email</label></div>
                        <div><input type="text" name="email" required="true"></div>
                        <div><label for="">Phone</label></div>
                        <div><input type="text" name="phone" required="true"> </div>
                        <div><label for="">Address</label></div>
                        <div><input type="text" name="address" required="true"></div>
                        <input type="hidden" value="<?php echo $fees  ?>" name="fees">
                        <input type="hidden" name="petname" value="<?php echo $petname ?>">
                        <div><button id="btnNext" name="btnNext" onclick="ShowPopUp()">Next</button></div>
                    </div>
                </form>
            </div>
           
        </section>
    </main>
   
</body>
</html>
<script src="js/app.js"></script>