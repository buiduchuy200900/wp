<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>eCommerce HTML-5 Template </title>
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
            #remove{
                color:blue;
            }
        </style>
    
  <!-- PHP here -->
       <?php
        session_start();
        if(isset($_POST["add_to_cart"])){ 
          if(isset($_SESSION["cart"])){
            // $item_array_id = array_column($_SESSION["cart"],"productid");
            // if (!in_array($_POST["id"],$item_array_id)){
              $count = count($_SESSION["cart"]);
              $item_array = array(
                'productName' => $_POST["name"],
                'productQty' => $_POST["Qty"],
                'productPrice' => $_POST["price"],
                'productid' => $_POST["id"],
                'productImg' => $_POST["img"]
            );
            $_SESSION["cart"][$count]= $item_array;
            // }
        //     else{
        //     echo '<script> alert("Item Already Added") </script>';
        //     echo '<script> window.location ="index.html" </script>';
        //   }
        }
         else{
          $item_array = array(
            'productName' => $_POST["name"],
            'productQty' => $_POST["Qty"],
            'productPrice' => $_POST["price"],
            'productid' => $_POST["id"],
            'productImg' => $_POST["img"]
          );
           $_SESSION["cart"][0]= $item_array;
            }
        }
        

        ///Remove the product
        if(isset($_POST["remove"])){
            foreach($_SESSION["cart"] as $key => $value){
                if ($key == $_POST["delete"]){
                    unset($_SESSION["cart"][$key]);
                }
            } 
        }

       
      ?> 
</head>

<body>

  <header>
    <!-- Header Start -->
    <?php include  "header.php" ?>
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
                        <h2>Card List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->
                       
  <!--================Cart Area =================-->

  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            <?php if (isset($_POST["add_to_cart"])){
                $subtotal = 0;
            }else{
                    $subtotal = "NaN";
                }
        
            ?>
                    <?php foreach($_SESSION["cart"] as $key => $value){ ?>
     <!-- HTML here -->
                 
              <tr>
                <form action="cart.php" method="post">
                <input type="hidden" name="delete" value="<?php echo $key?>">
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?php echo($value['productImg'])?>" alt="" class="img-fulid">
                    </div>
                    <div class="media-body">
                        <p><?php echo($value["productName"]);?><p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5><?php echo"$".($value["productPrice"]) ?></h5>
                </td>   
                <td>
                   <h5 style="font-size:20px"><?php echo($value["productQty"])?></h5>
                </td>
                <td>
                  <h5 ><?php echo"$".($value["productPrice"]*$value["productQty"]) ?></h5>
                </td>
                <td>
                    <input type="submit" id="remove" name="remove" value="Remove">
                </td>
                </form>
    
              </tr>
              <?php $subtotal= ($subtotal + ($value["productPrice"]*$value["productQty"]))?>
              <?php } ?> 
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                    <?php $subtotal = "$". $subtotal ?>
                  <h5><?php echo $subtotal; ?></h5>
                </td>
              </tr>

         
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                    <h5>Free Ship</h5>
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                    <h5><?php echo $subtotal ?></h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="product_list.php">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
<!--Start footer -->
  <?php include "footer.php" ?>
<!--End footer -->

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
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

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