<?php
    session_start();
    if (!isset($_SESSION["login"])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sider Menu Bar CSS</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
<!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Admin Register</title>
  </head>
  <header role="banner">
    <h1>Admin Panel</h1>
    <ul class="utilities">
      <br>
      <li class="users"><a href="#"><?php echo($_SESSION["adminName"])?></a></li>
      <li class="logout warn"><a href="logout.php">Log Out</a></li>
    </ul>
  </header>
    <nav role='navigation'>
      <ul class="main">
        <li class="dashboard"><a href="index.php">Dashboard</a></li>
        <li class="users"><a href="adminRegister.php">Manage Users</a></li>
        <li><a href="viewProduct.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Product List</a></li>
        <li class="write"><a href="addProduct.php">Add Product</a></li>
      </ul>
    </nav>
<body>
