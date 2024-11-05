<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
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
                    <h1> >> Dashboard</h1>
                </div>
                <div>
                    <section>
                        <div class="top-dash">
                            <div class="card">
                                <center>
                                    <div><strong>50</strong></div>
                                    <div><small>Number of pets</small></div>
                                </center>
                            </div>
                            <div class="card">
                                <center>
                                    <div><strong>20</strong></div>
                                    <div><small>Number of customers</small></div>
                                </center>
                            </div>
                            <div class="card">
                                <center>
                                    <div><strong>Ksh. 8900</strong></div>
                                    <div><small>Profit Made</small></div>
                                </center>
                            </div>
                        </div>
                        <div class="dash-main">
                            <div class="petsDiv">
                                <div class="table-View1">
                                <form method="POST" action="admin.php" class="searchDiv">
                                    <input type="search" placeholder="search ..." value="" name="search">
                                    <button name="btnsearch" onCLick="showSearch()">Search</button>
                                </form>
                                <table id="table2">
                                        <thead>
                                            <th>PET</th>
                                            <th>ADDRESS</th>
                                            <th>FEES</th>
                                            <th>EDIT</th>
                                            <th>DELETE</th>
                                        </thead>
                                        <tbody>
                                        
                                <?php 
                                     if (isset($_POST['btnsearch'])) {
                                        $conn=mysqli_connect("localhost","root","","pets");
                                        $search=$_POST['search'];
                                        $sql="SELECT * FROM `pets` WHERE  name LIKE '%$search%'";
                                        $res=mysqli_query($conn,$sql);
                                        $count=mysqli_num_rows($res);
                                        if ($count==0) {
                                            echo "no data";
                                        }else{
                                            while ($row=mysqli_fetch_array($res)) {
                                                $name=$row['name'];
                                                $address=$row['address'];
                                                $fee=$row['fee'];
                                                $id=$row['id'];
                                                $description=$row['description'];
                                         ?>

                                            <tr>
                                                <td><?php echo $name  ?></td>
                                                <td><?php echo $address ?></td>
                                                <td>KSH .<?php echo $fee ?></td>
                                                <td>
                                                    <form method="POST" action="editpet.php">
                                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                                        <input type="hidden" name="name" value="<?php echo $name ?>">
                                                        <input type="hidden" name="address" value="<?php echo $address ?>">
                                                        <input type="hidden" name="fee" value="<?php echo $fee ?>">
                                                        <input type="hidden" name="description" value="<?php echo $description ?>">
                                                        <button class="btnEdit" name="btnEdit">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <button class="btnDelete" name="btnDelete" onClick="openPopDel()">Delete</button> 
                                                </td>
                                            </tr>
                                        <?php }}}else { 
                                            
                                    $conn=mysqli_connect("localhost","root","","pets");
                                    $sql_get="SELECT * FROM `pets` WHERE 1";
                                    $exec=mysqli_query($conn,$sql_get);
                                    $count=mysqli_num_rows($exec);

                                    if ($count==0) {
                                        echo "no data";
                                    }else{
                                        while ($row=mysqli_fetch_array($exec)) {
                                            $name=$row['name'];
                                            $address=$row['address'];
                                            $fee=$row['fee'];
                                            $id=$row['id'];
                                            $description=$row['description'];
                                ?>
                                    <tr>
                                        <td><?php echo $name  ?></td>
                                        <td><?php echo $address ?></td>
                                        <td>KSH .<?php echo $fee ?></td>
                                        <td>
                                            <form method="POST" action="editpet.php">
                                                 <input type="hidden" name="id" value="<?php echo $id ?>">
                                                 <input type="hidden" name="name" value="<?php echo $name ?>">
                                                 <input type="hidden" name="address" value="<?php echo $address ?>">
                                                 <input type="hidden" name="fee" value="<?php echo $fee ?>">
                                                 <input type="hidden" name="description" value="<?php echo $description ?>">
                                                 <button class="btnEdit" name="btnEdit">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <button class="btnDelete" name="btnDelete" onClick="openPopDel()">Delete</button> 
                                        </td>
                                    </tr>
                                        <?php }}}?>
                                    </tbody>
                            </table>
                           
                            <section>
                            <div class="dn" id="black-scale">
                                            <div class="popup-scale">
                                                <center>
                                                    <div><strong>Confirm !!</strong></div>
                                                    <br>
                                                    <div>
                                                        <small>Are you sure you want to delete</small>
                                                    </div>
                                                    <div>
                                                        <form action="admin.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                                            <div class="flexdiv" >
                                                            <a href="admin.php"><button class="btnCancel" name="btnDel">Cancel</button></a>
                                                            <button class="btnDel" name="btnDel">Delete</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                           
                        </section>
                            <?php 
                             
                                if (isset($_POST['btnDel'])) {

                                    $conn=mysqli_connect("localhost","root","","pets");
                                    $id=$_POST['id'];
                                
                                    $sql="DELETE FROM `pets`  WHERE id='$id'";
                                    $exec=mysqli_query($conn,$sql);
                                
                                    if($exec){
                                        // echo 'deleted';
                                    }else{
                                        echo "sql error";
                                    }
                                }
                            
                            ?>
                        </div>
                   
                            </div>
                            <div class="customerDiv">
                                <div class="customer-view">
                                    <div><strong>Customers</strong></div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div>
                                        <div class="ol-div">
                                            <div >
                                               
                                                <?php
                                                    $conn=mysqli_connect("localhost","root","","pets");
                                                    $sql_get="SELECT * FROM `customers` WHERE 1";
                                                    $exec=mysqli_query($conn,$sql_get);
                                                    $count=mysqli_num_rows($exec);

                                                    if ($count==0) {
                                                        echo "no data";
                                                    }else{
                                                        while ($row=mysqli_fetch_array($exec)) {
                                                            $name=$row['name'];
                                                            $email=$row['email'];
                                                            $id=$row['id'];
                                                ?>
                                                    <form class="custDiv" action="customer.php" method="POST">
                                                        <input type="hidden" value="<?php echo $id ?>" name="id">
                                                        <button type="submit" name="btnCustomer"><small><?php echo $name ?></small></button>
                                                    </form>
                                                <?php }}?>
                                                
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section> 
    </main>
    <script src="js/app.js"></script>
</body>
</html>