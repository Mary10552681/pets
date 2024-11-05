<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt pet online</title>
</head>
<body>
        <header class="navtop">
            <?php include 'navbar.php' ?>
        </header>
        <main class="main" onclick="closeMenu()">
            <section class="conatiner-1 home-sec">
                <center>
                <h1>Adopt a pet with us</h1>
                <p>We are so glad you're here! We hope you find the perfect furry friend to add to your family.

Our system is designed to make it easy for you to find the right pet for you. You can search by breed, age, size, and other criteria. You can also read about the different types of pets we have available and learn about their personalities and needs.

Once you've found a pet you're interested in, you can contact us to schedule a meeting. We will be happy to answer any questions you have and help you make a decision.
</p>
                </center>
            </section>
            <form method="POST" action="home.php" class="searchDiv">
                <input type="search" name="search" id="" placeholder="search for pet..."> <button class="btnsearch" name="btnsearch">Search</button>
            </form>
            <section class="conatiner-1 about-us">
                <center>
                    <h1 class="title-b">PETS</h1>
                    
                </center>
                    <section class="card-container">

                        <?php

                            if (isset($_POST['btnsearch'])) {
                            $conn=mysqli_connect("localhost","root","","pets");
                            $search=$_POST['search'];
                            $sql_select="SELECT * FROM `pets` WHERE name LIKE '%$search%'";
                            $exec=mysqli_query($conn,$sql_select);
                            $count=mysqli_num_rows($exec);

                            if ($count===0) {
                                
                            }else{
                                while ($row=mysqli_fetch_array($exec)) {
                                    $name=$row['name'];
                                    $description=$row['description'];
                                    $fees=$row['fee'];
                                    $img=$row['image'];
                                    $address=$row['address'];
                        ?>
                        <form class="card" method="POST" action="adopt.php">
                            <div class="card-body">
                                <img src="uploads/<?php echo $img ?>" alt="" class="img">
                            </div>
                            <div class="card-footer">
                                <h4><?php echo $name ?></h4>
                                <p><b>Location</b> <small> <?php echo $address ?></small></p>
                                <div class="hidden">
                                    <input type="hidden" name="name" value="<?php echo $name ?>">
                                    <input type="hidden" name="description" value="<?php echo $description ?>">
                                    <input type="hidden" name="fees" value="<?php echo $fees ?>">
                                    <input type="hidden" name="image" value="<?php echo $img ?>">
                                </div>
                                <button class="btnAdopt" name="btnAdopt">Adopt</button>
                            </div>
                        </form>
                            
                            <?php }}}else {
                                $conn=mysqli_connect("localhost","root","","pets");
                                $sql_select="SELECT * FROM `pets` WHERE 1";
                                $exec=mysqli_query($conn,$sql_select);
                                $count=mysqli_num_rows($exec);

                                if ($count===0) {
                                    
                                }else{
                                    while ($row=mysqli_fetch_array($exec)) {
                                        $name=$row['name'];
                                        $description=$row['description'];
                                        $fees=$row['fee'];
                                        $img=$row['image'];
                                        $address=$row['address'];
                            ?>
                            <form class="card" method="POST" action="adopt.php">
                                <div class="card-body">
                                    <img src="uploads/<?php echo $img ?>" alt="" class="img">
                                </div>
                                <div class="card-footer">
                                    <h4><?php echo $name ?></h4>
                                    <p><b>Location</b> <small> <?php echo $address ?></small></p>
                                    <div class="hidden">
                                        <input type="hidden" name="name" value="<?php echo $name ?>">
                                        <input type="hidden" name="description" value="<?php echo $description ?>">
                                        <input type="hidden" name="fees" value="<?php echo $fees ?>">
                                        <input type="hidden" name="image" value="<?php echo $img ?>">
                                    </div>
                                    <button class="btnAdopt" name="btnAdopt">Adopt</button>
                                </div>
                            </form>                          
                            <?php }}} ?>
                    </section>
            </section>
        </main>
        <?php include('footer.php') ?>
</body>
</html>