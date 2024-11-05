<?php session_start(); ?>
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
                    <h1> >> Report</h1>
                </div>
                <div>
                    <section>
                        <div></div>
                        <div class="table-View">
                            <table>
                                <thead>
                                    <th>CUSTOMER</th>
                                    <th>PHONE</th>
                                    <th>ADDRESS</th>
                                    <th>PET</th>
                                    <th>DATE</th>
                                    <th>FEES</th>
                                    <th>DELETE</th>
                                </thead>
                                <tbody>
                                <?php
                                    $conn=mysqli_connect("localhost","root","","pets");
                                    $sql_get="SELECT * FROM `reports` WHERE 1";
                                    $exec=mysqli_query($conn,$sql_get);
                                    $count=mysqli_num_rows($exec);

                                    if ($count==0) {
                                        echo "no data";
                                    }else{
                                        while ($row=mysqli_fetch_array($exec)) {
                                            $name=$row['customer'];
                                            $address=$row['address'];
                                            $fee=$row['fee'];
                                            $id=$row['id'];
                                ?>
                                    <tr>
                                        <td>Abdulaziz</td>
                                        <td>076798734</td>
                                        <td>Nairobi</td>
                                        <td>Brown puppy</td>
                                        <td>12/2/2021</td>
                                        <td>KSH. 500</td>
                                        <td>
                                            <form action="report.php" method="post">
                                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                                <button name="btnRemove">Remove</button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php }}?>
                                    <?php
                                        if(isset($_POST['btnRemove'])){
                                         $conn=mysqli_connect("localhost","root","","pets");
                                         $id=$_POST['id'];
                                         $sql="DELETE  FROM `reports` WHERE id='$id'";
                                         $exec=mysqli_query($conn,$sql);

                                         if ($exec) {
                                            echo 'delete';
                                         }else{
                                            echo 'sql error';
                                         }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="bot-report">
                        <?php
                            $conn=mysqli_connect("localhost","root","","pets");
                            $sql_get="SELECT *, SUM(fee) AS totalprice FROM `reports`  WHERE  1 ";
                            $exec=mysqli_query($conn,$sql_get);
                            $fetch=mysqli_fetch_array($exec);
                            ?>
                            <div>
                                <strong>Total : KSH. <?php echo $fetch['totalprice'] ?></strong>
                                <button>Print report</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section> 
    </main>
</body>
</html>