<!DOCTYPE html>
<html lang="en">

  <?php 
    // head back to login if you not login
    if (!isset($_SESSION["login"])){
        header("Location: login.php");
    }
    include 'connectdb.php';
    $sql ="SELECT * FROM Admins";
    $result = mysqli_query($conn, $sql);
  ?>


<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="bg-success text while text-center py-3"> Admin Management </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                        <th >Name</th>
                                        <th >Password</th>
                                        <th >Email</th>
                                        <th >Address</th>
                                        <th> Phone</th>
                                        <th> Edit</th>
                                        <th> Delete </th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $name =$row['adminName'];
                                            $pass = $row['adminPassword'];
                                            $email = $row['email'];
                                            $Address = $row['Adresss'];
                                            $mobile = $row['mobilephone']                           
                                        
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $pass?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $Address?></td>
                                            <td><?php echo $mobile ?></td>
                                            <td><a href="editAdmin.php?GetID=<?php echo $id?>">Edit </a></td>
                                            <td><a href="deleteAdmin.php?Del=<?php echo $id?>">Delete </a></td>
                                        </tr>
                                    </tbody>
                                    <?php
                                    }
                                    }else {
                                        echo "0 results";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
