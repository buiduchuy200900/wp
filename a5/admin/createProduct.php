<?php
include 'connectdb.php';
// head back to login if you not login
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
//
if(isset($_POST["addProduct"])){
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productBrand = $_POST["productBrand"];
    $productDetail = $_POST["productDetail"];
    //Image
    $img_name=$_FILES['file']['name'];
    $img_type=$_FILES['file']['type'];
    $img_tmp_name=$_FILES['file']['tmp_name'];
    $img_size=$_FILES['file']['size'];
    if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif")
    {
        if($img_size<=50000000){
                $img= "assets/img/product/".$img_name;
                #Move Image to file product
                move_uploaded_file($img_tmp_name,"../assets/img/product/".$img_name);        
            }
    }
    // Add to database
    $sql = "INSERT INTO Product (product_name,product_price,product_image,product_brand,product_detail)
    VALUES ('$productName', '$productPrice','$img','$productBrand','$productDetail')";
    if ($conn->query($sql) === TRUE) {
        header ("Location: viewProduct.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>