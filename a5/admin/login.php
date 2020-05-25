
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<!-- PHP here
	<?php
	session_start();
	include 'connectdb.php';
    function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialChars($data);
	  return $data;
	}
	if(isset($_POST["login"])){
		$name = test_input($_POST["adminName"]);
		$pass = test_input($_POST["adminPass"]);
		if ($name == "" || $pass == "") {
			$error = "* You need to full fill your name or password";
		} else {
			$sql = "SELECT adminName, adminPassword from Admins where adminName = '$name' and adminPassword = '$pass' ";
			$query = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows == 0) {
				$error = "* Your password or username is wrong";
			} else {
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['adminName'] = $_POST['adminName'];
				$_SESSION['adminPass'] = $_POST['adminPass'];			
				header('Location: index.php');
			}
		}
	}
		
	?>
 

	<-->

<body>
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-5">
			<div>
				<form action="login.php" method="post">
					
					<h2 class="text-center">Log in</h2>      
					<div class="form-group">
						<input type="text" name="adminName"class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password"  name ="adminPass" class="form-control" placeholder="Password" >
						<div class="pt-2" style="color:red"><?php echo $error;?></div>
					</div>
					<div class="form-group">
						<button type="submit" name="login" value="success" class="btn btn-primary btn-block">Log in</button>
					</div>      
				</form>
			</div>
			</div>
		</div>
	</div>

</body>
</html>