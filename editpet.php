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
                    <h1> >> Edit a pet</h1>
                </div>
                <div>
                    <div>
                      
                    </div>
                    <div class="add-container">
                        <?php 
                          if (isset($_POST['btnEdit'])) {
                            $name=$_POST['name'];
                            $address=$_POST['address'];
                            $description=$_POST['description'];
                            $fees=$_POST['fee'];
                            $id=$_POST['id'];
                          }
                        ?>
                        <form action="handlers/editpetH.php" method="POST" class="add-form editForm">
                            <div>
                                <div>
                                    <h4>Edit a pet</h4>
                                    <br>
                                    <hr>
                                    <br>
                                    <div><label for="">Name</label></div>
                                    <div><input type="hidden" name="id" value="<?php  echo $id ?>"></div>
                                    <div><input type="text" name="name" value="<?php  echo $name ?>"></div>
                                    <div><label for="">Description</label></div>
                                    <div><textarea name="description" value=""><?php  echo $description ?></textarea></div>
                                    <div><label for="">Address</label></div>
                                    <div><input type="text" name="address" value="<?php echo $address  ?>"></div>
                                    <div><label for="">Fees</label></div>
                                    <div><input type="text" name="fee" value="<?php echo $fees  ?>"></div>
                                    <br>
                                    <center><div><button id="" name="btnUpdate">Update</button></div></center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> 
    </main>
   
</body>
</html>