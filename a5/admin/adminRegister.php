<?php
    include 'sidebar-nav.php'
?>
<!DOCTYPE html>
<html lang="en">
<?php
?>
<body>
<main role="main">
<section>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text while text-center py-3"> Admin Register </h3>
                </div>
            <div>
            <div class="card-body">
				<form action="createAdmin.php" method="post">			      
					<div class="form-group">
                        <label>Name</label>
						<input type="text" name="adminName" class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
                        <label>Pasword</label>
						<input type="text" name="adminPassword" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
                        <label>Email</label>                  
						<input type="text"name="adminEmail" class="form-control" placeholder="Email">
					</div>
                    <div class="form-group">
                        <label>Address</label>                  
						<input type="text"name="adminAddress" class="form-control" placeholder="Address">
					</div>
                    <div class="form-group">
                        <label>Mobile Phone</label>                  
						<input type="text"name="adminPhone" class="form-control" placeholder="Mobile Phone">
                    </div> 
					<div class="form-group">
						<button type="submit" name="register" value="success" class="btn btn-primary btn-block">Register</button>
                    </div> 
                       
				</form> 

			</div>
        <div>
    </div>
</div>
</section>
</main>
</body>