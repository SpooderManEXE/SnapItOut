<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php
session_start();
require_once "config.php";
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snap It Out</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* For mobile phones: */
    .col-lg-7{
      flex: 0 0 100%;
      max-width: 100%;
    }
    .d-block{
      padding: 0px;
      padding-top: 15px;
      padding-bottom: 15px;

    }
    @media only screen and (min-width: 768px) {

      .col-lg-7{
        flex: 0 0 50.333333%;
        max-width: 50.333333%;
      }
      .d-block{padding: 100px}

    }
    </style>
</head>

<body>
  <!--::header part start::-->
  <header class="main_menu home_menu">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="index.php" > <img src="img/logo.png" alt="logo" > </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-expanded="false" aria-label="Toggle navigation">
                          <span class="menu_icon"><i class="fas fa-bars"></i></span>
                      </button>

                      <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="about.php">About</a>
                              </li>

                          </ul>
                      </div>
                      <div class="hearer_icon d-flex align-items-center">
                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" href="login.php" id="user">Login</a>
                            </li>
                          </ul>
                        </div>
                          <a href="cart.php">
                              <i class="flaticon-shopping-cart-black-shape"></i>
                          </a>
                      </div>
                  </nav>
              </div>
          </div>
      </div>

  </header>
  <!-- Header part end-->

  <?php
  if($_SESSION['username']!=""){
       $u=$_SESSION['username'];
      echo "<script>document.getElementById ('user'). href = 'logout.php';document.getElementById ('user'). innerHTML = 'Logout, $u';</script>";
  }
  else
      echo "<script>document.getElementById ('user'). href = 'login.php';document.getElementById ('user'). innerHTML = 'Login';</script>";

  ?>




    <!-- breadcrumb part start-->
    <section class="breadcrumb_part" style="height: 130px;">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">



            <div class="row">
              <div class="col-12 col-lg-7" >
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="images/wide.webp">
                                        <img class="d-block" src="images/wide.webp" alt="Wide Polaroid" >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5" style="padding-top: 5%;">
                      <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">₹40</p>
                            <a href="product-details.html">
                                <h6>Wide White Polaroids</h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                        </div>

                        <div class="short_overview my-5">
                            <p>They say bigger is better! </p>
                            <ul>
                              <br>
                                <li><h4>4 polaroids</h4></li>
                                <li><h4>Personalize with text.</h4></li>
                                  <li><h4>Final size is 11x9cm</h4></li>
                              </ul>
                        </div>
                        <div class="card_area">
                          <form method="post" action="basicwhitewide.php">
                            <div class="product_count_area">
                                <p>Quantity [Sets]</p>
                                <div class="product_count d-inline-block">
                                    <div class="quantity">
                                        <span class="product_count_item inumber-decrement" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="product_count_item input-number" id="qty" step="1" min="1" max="10" name="quant" value="1">
                                        <span class="product_count_item number-increment" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>

                                <p>₹40</p>
                            </div>
                          <div class="add_to_cart" style="text-align: center;">

                                  <input type="submit" class="btn_3" name="submit" value="add to cart">
                                </form>

                                <?php
            $connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");
                                if(isset($_POST["submit"])) {
                                  $t_product='cart'.$_SESSION['id'];
                                  $query = "SELECT * FROM $t_product where id=14";
                                  $result = mysqli_query($connect, $query);
                                  $row = mysqli_fetch_array($result);
                                      if($row[0]<1){
                                            $quant=$_POST['quant'];
                                              $query=" CREATE TABLE IF NOT EXISTS `$t_product` (
                                          `id` int(11) NOT NULL AUTO_INCREMENT,
                                          `name` varchar(255) NOT NULL,
                                          `quantity` int(11) NOT NULL,
                                          `price` double(10,2) NOT NULL,
                                          PRIMARY KEY (`id`)
                                          ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
                                          $result = mysqli_query($connect, $query);
                                          $query=" INSERT INTO `$t_product` (`id`, `name`, `quantity`, `price`) VALUES
                                          (14, 'Wide White Polaroid', $quant, 40.00)";
                                          $result = mysqli_query($connect, $query);
                                          echo '<script>window.location="cart.php"</script>';

                                        }

                                    else
                                    {
                                         echo "<script>window.alert('Item already added to cart')</script>";
                                         echo '<script>window.location="basicwhitewide.php"</script>';
                                    }
                            }

                               ?>




                          </div>

                        </div>
                        <!-- Add to Cart Form -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->


    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="footer_iner" style="padding: 20px;padding-bottom: 50px;">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-8" style="flex: 0 0 100%;max-width: 100%;">
                        <div class="" style="text-align: center;">

                            <div class="footer_menu_item" style="text-align: center;">
                                <a href="index.php">Home</a>
                                <a href="about.php">About</a>
                                <a href="https://www.instagram.com/snapitout.studio/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
        </div>
    </footer>

      <!-- jquery plugins here-->
      <script src="js/jquery-1.12.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.min.js"></script>

      <!-- easing js -->
      <script src="js/jquery.magnific-popup.js"></script>
      <!-- swiper js -->
      <script src="js/swiper.min.js"></script>
      <!-- swiper js -->
      <script src="js/mixitup.min.js"></script>
      <!-- particles js -->
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.nice-select.min.js"></script>
      <!-- slick js -->
      <script src="js/slick.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/contact.js"></script>
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/jquery.form.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/mail-script.js"></script>
      <!-- Plugins js -->
      <script src="js/plugins.js"></script>
      <!-- Active js -->
      <script src="js/active.js"></script>

      <!-- custom js
      <script src="js/custom.js"></script>-->
  </body>

  </html>
