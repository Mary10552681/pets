<?php

if (isset($_POST['btnUpdate'])) {
    $conn=mysqli_connect("localhost","root","","pets");
    $id=$_POST['id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $fee=$_POST['fee'];
    $address=$_POST['address'];
    $sql="UPDATE `pets` SET `name`='$name',`description`='$description',`address`='$address',`fee`='$fee' WHERE id='$id'";
    $exec=mysqli_query($conn,$sql);

    if($exec){
        header('location:../admin.php');
    }else{
        echo "sql error";
    }
}






?>