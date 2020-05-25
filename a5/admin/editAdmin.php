<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "sidebar-nav.php";?>
</head>
<?php 

    require_once 'connectdb.php';
    $adminId = $_GET['GetID'];
    $sql ="SELECT * FROM Admins WHERE id= $adminId";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $adminId = $row['id'];
        $name =$row['adminName'];
        $pass = $row['adminPassword'];
        $email = $row['email'];
        $address = $row['Adresss'];  
        $mobile = $row['mobilephone'];
    }
?>
<main role="main">
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card mt-5">
                <div class="card-title">
                    <h3 class="bg-success text while text-center py-3"> Update Admin </h3>
                </div>
            <div>
            <div class="card-body">
				<form action="updateAdmin.php?ID=<?php echo $adminId?>" method="post">			      
					<div class="form-group">
                        <label>Name</label>
						<input type="text" name="adminName" value="<?php echo $name ?>"class="form-control" placeholder="Name">
					</div>
					<div class="form-group">
                        <label>Pasword</label>
						<input type="text" name="adminPassword" value="<?php echo $pass ?>"class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
                        <label>Email</label>                  
						<input type="text"name="adminEmail" value="<?php echo $email ?>"class="form-control" placeholder="Email">
					</div>
                    <div class="form-group">
                        <label>Address</label>                  
						<input type="text"name="adminAddress" value="<?php echo $address?>"class="form-control" placeholder="Address">
					</div>
                    <div class="form-group">
                        <label>Mobile Phone</label>                  
						<input type="number"name="adminPhone" value="<?php echo $mobile ?>"class="form-control" placeholder="Mobile Phone" required>
					</div>
					<div class="form-group">
						<button type="submit" name="updateAdmin" value="success" class="btn btn-primary btn-block">Update</button>
					</div>        
				</form> 

			</div>
        <div>
    </div>
</div>
</main>
</body>
</html>