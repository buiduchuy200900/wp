<?php
    include 'connectdb.php';
    // head back to login if you not login
    if (!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    // 
    if(isset($_GET["Del"])){
        $adminId = $_GET["Del"];
        // sql to delete a record
        $sql = "DELETE FROM Admins WHERE id= $adminId";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }
?>