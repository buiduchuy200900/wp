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
            .link-button { 
            background: none;
            border: none;
            color: black;
            text-decoration: none;
            font-size : 22px;
            cursor: pointer; 
            }
            .link-button:hover{
            color: #0066ff;
            }
            </style>
    <!-- php here -->
        <?php include_once ("Createdb.php"); ?> 
        <?php require_once ("product.php"); ?>
</head>
<body>

    <header>
        <?php include  "header.php" ?>
    </header>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center"
            data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product list</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- product list part start-->
    <section id="product_list" class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input  type="text" id="myInput" onkeyup="searchKeyword()"name="#" placeholder="Search ">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <div id="myBtnContainer">
                                        <p><button  style ="width:100%" class="btn" onclick="showAll()"> Show All</button></p>                                                
                                        <p><button style ="width:100%" class="btn" onclick="showFootball()">Football</button></p>
                                        <p><button style ="width:100%" class="btn" onclick="showBasketball()">Basketball</button></p>                                                                                              
                                        <p><button style ="width:100%" class="btn" onclick="showTennis()">Tennis</button></p>
                                        <p><button style ="width:100%" class="btn" onclick="showBaseball()">Baseball</button></p>        
                                        <p><button style ="width:100%" class="btn" onclick="showGym()">Gym</button></p>
                                        <p><button style ="width:100%" class="btn" onclick="ShowTabletennis()">Table Tennis</button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="product_list">
                        <div class="row" id="myrow">
                            <?php
                                $sql ="SELECT * FROM Product";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        product($row['product_name'], $row['product_price'], $row['product_image'], $row['id'],$row['product_brand']);
                                    }
                                    }else {
                                        echo "0 results";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    <!-- product list part end-->

    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to
                                help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to
                                help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to
                                help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic”
                            sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod
                                            tempor incididunt ut labore.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made with <i class="ti-heart" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    <script>
        function showAll(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for (x of get_class) {
            x.style.display = "block";
            }
        }
        function showFootball(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 football"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }
        function showBasketball(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 basketball"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }
        function showTennis(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 tennis"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }
        function showBaseball(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 baseball"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }
        function showGym(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 gym"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }
        function ShowTabletennis(){
            var get_class = document.getElementsByClassName('col-lg-4 col-sm-4');
            for(x of get_class){
                if(x.className == "col-lg-4 col-sm-4 table_tennis"){
                    x.style.display = "block";                      
                }else{
                    x.style.display = "none";                                    
                }
            }     
        }  
        function searchKeyword() {
            var input, filter, row, h3, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            row = document.getElementById("myrow");
            col = row.getElementsByClassName("col-lg-4 col-sm-4");
            console.log("hello")
            for (i = 0; i < col.length; i++) {
                a = col[i].getElementsByTagName("input")[0];
                txtValue = a.value;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    col[i].style.display = "";
                } else {
                    col[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>