<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php session_start();?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snap It Out</title>
    <meta name="title" content="SnapItOut">
    <meta name="description" content="Get your pictures in the form of polaroids. Suitable as gifts. Free delivery at Amrita Vishwa Vidyapeetham only.">

    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/combinecss.css">
</head>

<body>

  <header class="main_menu home_menu">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="index.php" > <img src="img/logo.png" alt="logo"> </a>
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


  <?php
  if($_SESSION['username']!=""){
       $u=$_SESSION['username'];
      echo "<script async>document.getElementById ('user'). href = 'logout.php';document.getElementById ('user'). innerHTML = 'Logout, $u';</script>";
  }
  else
      echo "<script async>document.getElementById ('user'). href = 'login.php';document.getElementById ('user'). innerHTML = 'Login';</script>";

  ?>



    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text" style="padding-left:15px;">
                        <div class="banner_text_iner">
                            <h1>Best quality
                                Snaps</h1>
                            <p>Simply put, we provide you with top-quality printed products at affordable prices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="images/basic.webp" alt="#" class="img-fluid">
            <img src="img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>



    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="images/a1.webp" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>Starting from ₹40</h5>
                                    <h2> <a href="single-product.html">Basic White
                                      Polaroids</a> </h2>
                                    <a href="whitepolaroids.php" class="btn_3">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="images/a2.webp" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>Starting from ₹50</h5>
                                    <h2> <a href="single-product.html">Custom Frame
                                      Polaroids</a> </h2>
                                    <a href="custom.php" class="btn_3">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="images/a3.webp" class="img-fluid" alt="#">
                                    <img src="img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>Starting from ₹50</h5>
                                    <h2> <a href="photostrips.php">Photostrip Polaroids</a> </h2>
                                    <a href="photostrips.php" class="btn_3">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>




    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Coming Soon</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                  <div class="single_product_item">
                      <img src="images/bookaloid.webp" alt="#" class="img-fluid">
                      <h3> Booklaroids </h3>
                      <p>From ₹125</p>
                  </div>
              </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <img src="images/mugs.webp" alt="#" class="img-fluid">
                        </div>
                        <h3>Custom Coffee Mugs</h3>
                        <p>From ₹350</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <div class="single_product_item_thumb">
                            <img src="images/hotmug.webp" alt="#" class="img-fluid">
                        </div>
                        <h3>Heat Sensitive Mugs </h3>
                        <p>From ₹550</p>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section class="client_review">
      <div class="single_client_review">

          <p>Disclaimer: The sheet used is not the actual Polaroid sheets due to its expensive price but a high quality glossy sheet.</p>
      </div>
    </section>




    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">

            <h3>  Share your life moments with friends.<br>
              Turn your memories into colorful photo prints.</h3>


                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Don't waste your precious moments in digital devices like mobile and hard drives. We at Snap It Out will help you turn your photos into unique custom personalized photo gifts, photo prints, decor and photo prints online.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>UPI Payment Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Cheap Delivery*</h4>
                    </div>
                    *Free delivery to Amrita Vishwa Vidyapeetham
                </div>

                </div>
            </div>
        </div>
    </section>

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



      <script async src="js/combinejs.js"></script>


  </body>

  </html>
