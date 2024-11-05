<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="navtop">
        <?php include 'navbar.php' ?>
    </header>
    <main class="main mainHight" onclick="closeMenu()">
    <section class="conatiner-1 home-sec">
        
        <div class="accMain">

            <div class="detView">
            <div>
                <h4>My account</h4>
                <br>
                <hr>
            </div>
                        <?php 
                                $conn=mysqli_connect("localhost","root","","pets");
                                $email=$_SESSION['user'];
                                $sql="SELECT * FROM `customers` WHERE email='$email'";
                                $exec=mysqli_query($conn,$sql);
                                $count=mysqli_num_rows($exec);

                                if ($count==0) {
                                    echo "no data";
                                }else{
                                    while ($row=mysqli_fetch_array($exec)) {
                                        $name=$row['name'];
                                        $email=$row['email'];
                                        $id=$row['id'];
                                        $phone=$row['phone'];
                                        $address=$row['address'];
                            ?>
                <div>
                    <div><small><?php echo $name  ?></small></div>
                    <div><small><b>NAME</b></small></div>
                </div>
                <div>
                    <div><small><?php echo $phone ?></small></div>
                    <div><small><b>PHONE</b></small></div>
                </div>
                <div>
                    <div><small><?php echo $email ?></small></div>
                    <div><small><b>EMAIL</b></small></div>
                </div>
                <div>
                    <div><small><?php echo $address ?></small></div>
                    <div><small><b>ADDRESS</b></small></div>
                </div>
                <?php }}?>
            </div>
            <div class="activityView">
            <div class="table-View2">
                            <table>
                                <thead>
                                    <th>PET</th>
                                    <th>ADDRESS</th>
                                    <th>DATE</th>
                                    <th>FEES</th>
                                    <th>REMOVE</th>
                                </thead>
                                <tbody>
                                <?php
                                    $conn=mysqli_connect("localhost","root","","pets");
                                    $sql_get="SELECT * FROM `reports` WHERE 1";
                                    $exec=mysqli_query($conn,$sql_get);
                                                $count=mysqli_num_rows($exec);

                                    if ($count==0) {
                                        echo "No Data";
                                    }else{
                                        while ($row=mysqli_fetch_array($exec)) {
                                            $name=$row['customer'];
                                            $phone=$row['phone'];
                                            $address=$row['address'];
                                            $date=$row['date'];
                                            $fees=$row['fee'];
                                            $id=$row['id'];
                                ?>
                                    <tr>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $address ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>KSH .<?php echo $fees  ?></td>
                                        <td>
                                           <form action="account.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button class="btnDelete" name="btnDelete" type="submit">Delete</button>
                                           </form>
                                        </td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                            <?php 
                            if (isset($_POST['btnDelete'])) {
                                $conn=mysqli_connect("localhost","root","","pets");
                                $id=$_POST['id'];

                                $sql="DELETE FROM `reports` WHERE id='$id'";
                                $exec=mysqli_query($conn,$sql);
                                if ($exec) {
                                   
                                }else{
                                    echo "sql error";
                                }
                            }
                            ?>
                        </div>
                        
            </div>
        </div>
    </section>
    </main>
 
    <?php include('footer.php') ?>
</body>
</html>