<link rel="stylesheet" href="../css/style.css">

<?php 
            if (isset($_POST['btnNext'])) {
                $conn=mysqli_connect("localhost","root","","pets");
                $name=$_POST['name'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];
                $email=$_POST['email'];
                $petname=$_POST['petname'];
                $date="1/2/2024";
                $fees=$_POST['fees'];
                $sql_insert="INSERT INTO `reports`(`id`, `customer`, `phone`, `address`, `pet`, `date`, `fee`) VALUES (null,'$name','$phone','$address','$petname','$date','$fees')";
                $exec=mysqli_query($conn,$sql_insert);
                if ($exec) {
                    echo '
                     <section class="pop-container show-pop" id="popupView">
                        <div class="popup">
                                <div><strong>Confirm Adoption fee</strong></div>
                                <div>
                                <form action="adoptH.php" method="POST" class="form-det">
                                        <div><label for="">Phone</label></div>
                                        <div><input type="text" required="true"></div>
                                        <div><label for="">Date</label></div>
                                        <div><input type="date"></div>
                                        <div><label for="">Amount</label></div>
                                        <div><input type="text" required="true"></div>
                                        <div><button name="btnConfirm">Confirm</button> <button class="btnCancel" name="btnCancel">Cancel</button></div>
                                    </form>
                                </div>
                        </div>
                    </section>
                    ';
                }else{
                    echo "sql error";
                }

            }else{

             }
            
             if (isset($_POST['btnConfirm'])) {

                echo '
                <section class="pop-container show-pop" id="popupView">
                    <div class="popup">
                    <center>
                        <div><strong>Payment Complete !</strong></div>
                        <div>
                            <img src="public/img15.png" alt="">
                        </div>
                        <div><a href="../home.php"><button class="btnDone">Done</button></a></div>
                    </center>
                    </div>
                </section>
                
                ';
             }
             if (isset($_POST['btnCanel'])) {
                header('location:../home.php');
             }

             
            ?>
             