<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navbar.php' ?>
    <main class="main" onclick="closeMenu()">
        <section class="conatiner-1  flexDiv">
            <div class="box">
                <img src="public/img7.jpeg" alt="" class="img">
            </div>
            <div class="box">
                <div><h1>About us</h1></div>
                <div>
                    <p>Our mission is to connect loving pets with their forever homes. We believe every animal deserves a chance to experience the joy of a loving family. Our user-friendly platform makes it easy to browse adoptable pets, learn about their personalities, and schedule a meet-and-greet. We partner with local shelters and rescue organizations to ensure the well-being of each animal and provide them with the care they need. Join us in finding your perfect furry companion today!</p>
                </div>
            </div>
        </section>
    </main>
    <?php include('footer.php') ?>
</body>
</html>