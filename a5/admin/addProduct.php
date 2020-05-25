<!DOCTYPE html>
<html lang="en">

<?php
    include 'sidebar-nav.php';
?>
<body>
<main role="main">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text while text-center py-3"> Add Product</h3>
                </div>
            <div>
            <div class="card-body">
				<form action="createProduct.php" method="post" enctype="multipart/form-data">			      
					<div class="form-group">
                        <label>Product Name</label>
						<input type="text" name="productName" class="form-control" placeholder=" Product Name">
					</div>
					<div class="form-group">
                        <label>Product Price</label>
						<input type="number" name="productPrice" class="form-control" placeholder="Product Price">
					</div>
					<div class="form-group">
                        <label>Product Brand</label>                  
						<input type="text"name="productBrand" class="form-control" placeholder="Product Brand">
					</div>
                    <div class="form-group">
                        <label>Product Image</label>                  
						<input type="file" name="file" class="form-control">
					</div>
                    <div class="form-group">
                        <lable> Product Details </label>
                        <div><textarea style="width:100%" name="productDetail"></textarea></div>
                    </div>
					<div class="form-group">
						<button type="submit" name="addProduct" value="success" class="btn btn-primary btn-block">Add</button>
                    </div> 
                       
				</form> 

			</div>
        <div>
    </div>
</div>
</main>
</body>