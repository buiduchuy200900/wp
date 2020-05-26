
<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Assignment 5 </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

  <!-- CSS here -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/flaticon.css">
      <link rel="stylesheet" href="assets/css/slicknav.css">
      <link rel="stylesheet" href="assets/css/animate.min.css">
      <link rel="stylesheet" href="assets/css/magnific-popup.css">
      <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/slick.css">
      <link rel="stylesheet" href="assets/css/nice-select.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <style>
      .error {color: #FF0000;}
    </style>
  <!--PHP here-->
  <?php 
  include 'tools.php';
  session_start(); 
  $errorFound = 0;
        # Check if the name is right or wrong
      if(isset($_POST["confirm"])){
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
          $errorFound ++;
        } else {
          $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z\-.' ]{1,100}$/", $name)){
            $nameErr = "Only letter,spaces and punctuation chars are allowed ";
            $errorFound ++;
          }
        }
        # Check if type email is correct
        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
          $errorFound++;
        } else {
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $emailErr = "Invalid email format";
             $errorFound++;
          }
        }
        # Check if mobile is correct
        if (empty($_POST["phone"])) {
          $mobileErr = "Mobile is required";
          $errorFound ++;
        } else {
          $mobile = test_input($_POST["phone"]);
            if (!preg_match("/^( ?\d){10}$/", $mobile)){
            $mobileErr = "Mobile Phone is unvalid";
            $errorFound ++;
          }
        }
        # Check if the address is empty or not
        if (empty($_POST["address"])) {
          $addressErr = "Address is required";
          $errorFound ++;
        }
        # if all ok , go to receipt.php
        if ($errorFound == 0){
          header("Location: confirmation.php"); 
          session_destroy();   
        }
      }
  ?>
    
</head>

<body>

<header>
  <!-- Header Start -->
  <?php include "header.php"?>
  <!-- Header End -->
</header>

  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-6">
            <!-- Customer Information -->
            <h3>Customer Information</h3>
            <form class="row contact_form" action="checkout.php" method="post" novalidate="novalidate">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                <div class="error">* <?php echo $nameErr;?></div>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                <div class="error">* <?php echo $emailErr;?></div>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="mobilephone" name="phone"placeholder="Mobile Phone" />
                <div class="error">* <?php echo $mobileErr;?></div>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
                <div class="error">* <?php echo $addressErr;?></div>
              </div>
            <!-- Shipping detail -->
              <div class="col-md-12 form-group">
                <div class="creat_account">
                  <h3>Shipping Details</h3>
                  <div> Free Ship </div>
                </div>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="order_box">
              <div class="table-responsive">
                <h2>Your Order</h2>
                  <table class="order_box table">
                    <thead>
                      <tr>
                        <th style="font-size: 14px;color: #828bb2;font-weight: normal;" >Product</th>
                        <th style="font-size: 14px;color: #415094;font-weight: normal;"> Qty</th>
                        <th style="font-size: 14px;color: #828bb2;font-weight: normal;" >Total</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php foreach($_SESSION["cart"] as $key => $value){ ?>
                      <tr>
                        <th style="font-size: 14px;color: #828bb2;font-weight: normal;" ><?php echo $value['productName']?></th>
                        <th style="font-size: 14px;color: #415094;font-weight: normal;"><?php echo $value['productQty']?></th>
                        <th style="font-size: 14px;color: #828bb2;font-weight: normal;" ><?php echo "$".$value['subtotal']?></th>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              </div>
              <ul class="list list_2">
                <li>
                  <a href="#">Subtotal
                    <span><?php echo $_SESSION['total']?></span>
                  </a>
                </li>
                <li>
                  <a href="#">Shipping
                    <span>Free Ship</span>
                  </a>
                </li>
                <li>
                  <a href="#">Total
                    <span><?php echo $_SESSION['total']?></span>
                  </a>
                </li>
              </ul>
              <button style="width:100%;padding:20px;color:blue" type="submit" name="confirm">CONFIRM <buttom>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->


  <footer>
    <!-- Footer Start-->
      <?php include 'footer.php'?>
    <!-- Footer End-->

	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

		<!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    
    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
      
</body>

</html>