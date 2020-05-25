<?php 
    include '../tools.php';
    include 'connectdb.php';
    // head back to login if you not login
    if (!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    if(isset($_POST["register"])){
        $ErrorFound= 0;
        #Check if the name is empty
        if (empty($_POST["adminName"])) {
            $Err = "Can not create admin. Please go back to the register and fill in the blank ";
            $ErrorFound ++;
        } else {
            $name = test_input($_POST["adminName"]);
        }
        #Check if the password is empty
        if (empty($_POST["adminPassword"])) {
            $Err = "Can not create admin. Please go back to the register and fill in the blank";
            $ErrorFound ++;
        } else {
            $pass = test_input($_POST["adminPassword"]);
        }
        // #Check if the email is empty 
        if (empty($_POST["adminEmail"])) {
            $Err = "Can not create admin. Please go back to the register and fill in the blank";
            $ErrorFound ++;
        } else {
            $email = test_input($_POST["adminEmail"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "Invalid email format";
                $errorFound++;
            }
        }
        #Check if the address is empty
        if (empty($_POST["adminAddress"])) {
            $Err = "Can not create admin. Please go back to the register and fill in the blank";
            $ErrorFound ++;
        } else {
            $address = test_input($_POST["adminAddress"]);
        }
        // #Check if the mobilie phone is empty
        if (empty($_POST["adminPhone"])) {
            $Err = "Can not create admin. Please go back to the register and fill in the blank";
            $ErrorFound ++;
        } else {
            $mobile = test_input($_POST["adminPhone"]);
            if (!preg_match("/^( ?\d){10}$/", $mobile)){
                $mobileErr = "Your mobile must be ten digits";
                $errorFound ++;
            }
        }
        #Check if there is no error then go to viewproduct.php
        if (!$ErrorFound == 0){
            echo "<h1 style='text-align:center;color:red;margin-top:50px'> $Err</h3>"; 
            echo "<h1 style='text-align:center;color:red;margin-top:50px'> $emailErr</h3>"; 
            echo "<h1 style='text-align:center;color:red;margin-top:50px'> $mobileErr</h3>"; 

        }else{
            $sql = "INSERT INTO Admins (adminName,adminPassword,email,adresss,mobilephone)
            VALUES ('$name', '$pass','$email','$address', '$mobile')";
            if ($conn->query($sql) === TRUE) {
                header ("Location: index.php");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
    }
?>
