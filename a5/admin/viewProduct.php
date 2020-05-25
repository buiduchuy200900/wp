<?php 
    include 'sidebar-nav.php'
?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'connectdb.php';
    $sql ="SELECT * FROM Product";
    $result = mysqli_query($conn, $sql);
  ?>

<!-- </head> -->
<main role="main">
<body>
    <div class="container">
        <div class="row" style="margin-top:100px">
            <div class="col">
                <div class="card mt-5">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsvie">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Id</th>
                                        <th >Name</th>
                                        <th >Price</th>
                                        <th >Image</th>
                                        <th >Brand</th>
                                        <th> Edit </th>
                                        <th> Delete </th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    if (mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $name =$row['product_name'];
                                            $price = $row['product_price'];
                                            $image = $row['product_image'];
                                            $brand = $row['product_brand'];                           
                                        
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $price ?></td>
                                            <td><img src="../<?php echo $image?>" style="height:40px;width:40px"></td>
                                            <td><?php echo $brand ?></td>
                                            <td><a href="editProduct.php?GetID=<?php echo $id?>">Edit </a></td>
                                            <td><a href="deleteProduct.php?DelId=<?php echo $id?>">Delete </a></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div> 
</body>
</main>
