<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <main>
        <section class="admin-main">
            <div class="sideNav">
                <div class="tBar">
                    <h1>Admin</h1>
                    <hr>
                </div>

                    <div class="sideContainer">
                        <div>
                            <a href="admin.php">
                                <div class="adLinkDiv">
                                    <small>Dashboard</small>
                                </div>
                            </a>
                           
                            <a href="addpet.php">
                                <div class="adLinkDiv">
                                    <small>Add a pet</small>
                                </div>
                            </a>
                           
                            <a href="report.php">
                                <div class="adLinkDiv">
                                    <small>Report</small>
                                </div>
                            </a>
                           
                        </div>
                    </div>
                    <div>
                    <a href="index.php" class="a1">
                        <div class="adLinkDiv">
                            <center>
                            <small>Logout</small>
                            </center>
                        </div>
                    </a>
                    </div>
            </div>

            <div class="admin-main-container">
                <div class="main-nav">
                    <h1> >> Customer</h1>
                </div>
                <div>
                    <div></div>
                    <div class="add-container">
                        <div action="" class="add-form">
                            <?php 
                            if (isset($_POST['btnCustomer'])) {
                                $conn=mysqli_connect("localhost","root","","pets");
                                $id=$_POST['id'];
                                $sql="SELECT * FROM `customers` WHERE id='$id'";
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
                                <form action="customer.php" method="POST">
                                    <h4>Customer details</h4>
                                    <br>
                                    <div><label for="">Name</label></div>
                                    <div><input type="hidden" value="<?php echo $id ?>" name="id"></div>
                                    <div><input type="text" value="<?php echo $name ?>" name="name"></div>
                                    <div><label for="">Phone</label></div>
                                    <div><input type="text" value="<?php echo $phone ?>" name="phone"></div>
                                    <div><label for="">Address</label></div>
                                    <div><input type="text" value="<?php echo $address ?>" name="address"></div>
                                    <br>
                                    <center><div><button id="" name="btnChange">Change</button></div></center>
                                    <center><div><button id="" class="btnRemove">Remove</button></div></center>
                                </form>
                                <?php  }}}?>
                            </div>
                                    </div>
                    </div>
                    <?php 
                        if (isset($_POST['btnChange'])) {
                            $conn=mysqli_connect("localhost","root","","pets");
                            $id=$_POST['id'];
                            $sql="UPDATE `customers` SET `name`='',`email`='',`phone`='',`address`='',`password`='' WHERE id='$id'";
                            $exec=mysqli_query($conn,$sql);
                            if ($exec) {
                                header('location:admin.php');
                            }else{
                                echo 'sql error';
                            }
                        }
                    
                    ?>
                    
                </div>
            </div>
        </section> 
    </main>
</body>
</html>