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
    <!-- PHP here -->
        <?php include_once ("Createdb.php"); ?>
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
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

  <!--================Single Product Area =================-->
  <?php
    
        if(isset($_POST["detail"])){
            $productid = $_POST["productid"];
            $sql ="SELECT * FROM Product WHERE id=$productid";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $img = $row["product_image"];   
                    $price  = $row["product_price"];
                    $name = $row["product_name"];
                    $id = $row["id"];
                    $detail=$row["product_detail"];

                    echo "
                    <div class='container' style='margin-top:150px'>
                        <div class='row justify-content-center'>
                            <div class='col-lg-8'>                
                                <div class='single_product_img'>
                                <img src= '$img'  alt='#' class='img-fluid'>
                                </div>
                            </div>
                        </div>
                        <div class='row justify-content-center'>
                        <div class='col-lg-8 text-center'>
                          <div class='single_product_text'>
                            <h3>$name</h3>
                            <p>
                                $detail
                            </p>
                            <form action='cart.php' method ='post'>
                                <div class='card_area'>
                                    <div class='product_count_area'>
                                        <p>Quantity</p>
                                        <div class='product_count d-inline-block'>
                                            <span class='product_count_item inumber-decrement'> <i class='ti-minus'></i></span>
                                            <input class='product_count_item input-number' type='text' name='Qty' value='1' min='0' max='10'>
                                            <span class='product_count_item number-increment'> <i class='ti-plus'></i></span>
                                            <input type='hidden' name='price' value ='$price'>
                                            <input type ='hidden' name='name' value ='$name'>
                                            <input type='hidden' name='id' value='$id'>
                                            <input type='hidden' name ='img' value= '$img'>
                                        </div
                                        <p>$price</p>
                    
                    
                                    </div>
                                <div class='mt-4 mb-4'>
                                      <input style='padding:20px;margin-left:40px;' type='submit' name='add_to_cart' value='Add To Cart'>
                                </div>
                            </form>
                 
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  ";    
                }
            };
        }
    ?>

  <!--================End Single Product Area =================-->

  <footer>
    <!-- Footer Start-->
   <?php include 'footer.php';?>
    <!-- Footer End-->
  </footer>

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

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
            <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>


</body>

</html>