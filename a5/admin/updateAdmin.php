<?php 
    require_once 'connectdb.php';
    if(isset($_POST['updateAdmin'])){
        print_r($_POST);
        $adminID = $_GET['ID'];
        echo $adminID;
        $adminName = $_POST["adminName"];
        $adminPass = $_POST["adminPassword"];
        $adminEmail = $_POST["adminEmail"];
        $adminAddress = $_POST["adminAddress"];
        $adminPhone = $_POST["adminPhone"];
        $sql = "UPDATE Admins SET adminName='$adminName', adminPassword='$adminPass', email='$adminEmail', Adresss = '$adminAddress', mobilephone='$adminPhone' WHERE id=$adminID";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
          } else {
            echo "Error updating record: " . $conn->error;
          }     
    }
    else{
        header("Location: login.php");
    }
?>