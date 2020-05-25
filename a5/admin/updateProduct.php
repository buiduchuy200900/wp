<?php 
    require_once 'connectdb.php';
    if(isset($_POST['updateProduct'])){
        $productID = $_GET['ID'];
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productBrand = $_POST["productBrand"];
        $productDetail = $_POST["productDetail"];
        //Update Image
        $img_name=$_FILES['file']['name'];
        $img_type=$_FILES['file']['type'];
        $img_tmp_name=$_FILES['file']['tmp_name'];
        $img_size=$_FILES['file']['size'];
        #if dont change image, keep the orginal image
        if($img_name == ""){
            $img = $_POST["productImage"];
        }else{
        // if change then delete the old image in file product 
                $img = $_POST["productImage"];
                $path="../$img";
                if(file_exists($path)==true)
                {
                    echo "succesful";
                unlink($path);
                } 
        // Then uploade new image to file product
        if($img_type=="image/jpeg" || $img_type=="image/jpg" || $img_type=="image/png" || $img_type=="image/gif")
        {
            if($img_size<=50000000){
                    $img= "assets/img/product/".$img_name;
                    move_uploaded_file($img_tmp_name,"../assets/img/product/".$img_name);        
                }
        }
        }
        // Add to database
        $sql = "UPDATE Product SET product_name='$productName', product_price='$productPrice', product_image='$img',product_brand='$productBrand', product_detail='$productDetail' WHERE id=$productID";
        if ($conn->query($sql) === TRUE) {
            header("Location: viewProduct.php");
          } else {
            echo "Error updating record: " . $conn->error;
          }     
    }
    else{
        header("Location: login.php");
    }



?>
