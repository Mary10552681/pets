<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <h1> >> Add pet</h1>
                </div>
                <div>
                    <div></div>
                    <div class="add-container">
                    
                        <form action="addpet.php" class="add-form1" method="POST" enctype="multipart/form-data">
                            <div>
                                <div >
                                    <h4>Add new pet</h4>
                                    <br>
                                    <hr>
                                    <br>
                                    <div><label for="">Name</label></div>
                                    <div><input type="text" name="name"></div>
                                    <div><label for="" >Description</label></div>
                                    <div><textarea name="description" id=""></textarea></div>
                                    <div><label for="">Address</label></div>
                                    <div><input type="text" name="address"></div>
                                    <div><label for="">Fees</label></div>
                                    <div><input type="text" name="fees"></div>
                                    <div><input type="file" name="image"></div>
                                    <br>
                                    <center><div><button id="" name="btnSubmit" class="btnSubmit">Submit</button></div></center>
                                </div>
                            </div>
                        </form>
                    </div>

                    
                </div>
            </div>
        </section> 
        
    </main>
    <?php  

    if (isset($_POST['btnSubmit']) && isset($_FILES['image'])) {
        // echo "it works";
        $conn=mysqli_connect("localhost","root","","pets");

        $name=$_POST['name'];
        $description=$_POST['description'];
        $address=$_POST['address'];
        $fees=$_POST['fees'];
    
        $img_name=$_FILES['image']['name'];
        $img_size=$_FILES['image']['size'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $error=$_FILES['image']['error'];
       
        if ($error===0) {
           
            if ($img_size > 525000) {
                $em="too large file size";
                echo "file too large";
            }else{
                $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
    
                $allowed_ext=array("jpg","jpeg","png");
    
                // echo $allowed_ext;
                if (in_array($img_ex_lc,$allowed_ext)) {
                    $my_new_img_name=uniqid("IMG",true).'.'.$img_ex;
                    $img_upload_path='uploads/'.$my_new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                    $sql_insert="INSERT INTO `pets`(`id`, `name`, `description`, `address`, `fee`, `image`) VALUES (null,'$name','$description','$address','$fees','$my_new_img_name')";
    
                    $exec=mysqli_query($conn,$sql_insert);
                
                    if ($exec) {
                        echo '
                            <section class="pop-container show-pop" id="popupView">
                            <div class="popup">
                                    <div><strong>Success</strong></div>
                                    <div>
                                    <form action="addpet.php" class="form-det">
                                            <small>New pet added successfully</small>
                                            <br><br>

                                            <div><button>Confirm</button></div>
                                        </form>
                                    </div>
                            </div>
                        </section>
                        
                        ';
                    }else{
                        echo "failed";
                    }
    
                }else{
                    $em="file type not allowed";
                }
            }
        }else{
            $em="Unknown error occured!";
        }
      

    }



    ?>
</body>
</html>

