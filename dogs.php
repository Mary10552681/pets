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
            <div class="top-title"><strong><b>Dogs</b></strong> <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati nemo, vero similique, ad commodi nesciunt voluptate quidem velit ipsum consequuntur a tempore praesentium debitis architecto id, beatae quibusdam. Nisi, labore?</small></div>
            
            <section class="card-container">
                <?php
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
                        <p><?php echo $description ?></p>
                        <div class="hidden">
                            <input type="hidden" name="name" value="<?php echo $name ?>">
                            <input type="hidden" name="description" value="<?php echo $description ?>">
                            <input type="hidden" name="fees" value="<?php echo $fees ?>">
                            <input type="hidden" name="image" value="<?php echo $img ?>">
                        </div>
                        <button class="btnAdopt" name="btnAdopt">Adopt</button><small>Location. <?php echo $address ?></small>
                    </div>
                </form>
                <?php }}?>
            </section>
        </main>
</body>
</html>