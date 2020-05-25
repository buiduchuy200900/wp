<?php
    include 'connectdb.php';
    // head back to login if you not login
    if (!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    //
    if(isset($_GET["DelId"])){
        $productId = $_GET["DelId"];
        //delete the image 
        $sql = "SELECT product_image FROM Product WHERE id=$productId";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
        //   output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            $img = $row["product_image"];
          }
        } else {
          echo "0 results";
        }
        $path="../$img";
        if(file_exists($path)==true)
        {
            echo "hello";
        unlink($path);
        }     
        // sql to delete a record in database
        $sql = "DELETE FROM Product WHERE id= $productId";

        if ($conn->query($sql) === TRUE) {
            header("Location: viewProduct.php");
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }
?>