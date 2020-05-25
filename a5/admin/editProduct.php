<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'sidebar-nav.php'?>
</head>
<?php 
    require_once 'connectdb.php';
    $productId   = $_GET['GetID'];
    $sql ="SELECT * FROM Product WHERE id= $productId";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        $name =$row['product_name'];
        $price = $row['product_price'];
        $image = $row['product_image'];
        $brand = $row['product_brand'];  
        $detail = $row['product_detail'];
    }
?>
<body>
<main role="main">
<div class="container">
    <div class="row ">
        <div class="col">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text while text-center py-3"> Update The Product </h3>
                </div>
            <div>
            <div class="card-body">
				<form action="updateProduct.php?ID=<?php echo $productId?>" method="post" enctype="multipart/form-data">			      
					<div class="form-group">
                        <label>Product Name</label>
						<input type="text" name="productName" value="<?php echo $name ?>"class="form-control" placeholder="Product Name" >
					</div>
					<div class="form-group">
                        <label>Product Price</label>
						<input type="text" name="productPrice" value="<?php echo $price ?>"class="form-control" placeholder="Product Price">
					</div>
					<div class="form-group">
                        <label>Product Brand</label>                  
						<input type="text"name="productBrand" value="<?php echo $brand ?>"class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Choose your file</label>
                        <div><img src="../<?php echo $image?>" style="width:200px;height=200px"></div>
                        <input type="hidden" name="productImage" value="<?php echo $image ?>">
						<input type="file" name="file" class="form-control">
					</div>
                    <div class="form-group">
                        <lable> Product Details </label>
                        <div><textarea style="width:100%" name="productDetail"> <?php echo $detail?> </textarea></div>
                    </div>
					<div class="form-group">
						<button type="submit" name="updateProduct" value="success" class="btn btn-primary btn-block">Update</button>
					</div>   
				</form>

			</div>
        <div>
    </div>
</div>
</main>
</body>
</html>