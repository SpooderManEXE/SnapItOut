<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php
// Initialize the session
session_start();

require_once "config.php";
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snap It Out</title>
    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/combinecss.css">

</head>

<body>

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


  <?php
  if($_SESSION['username']!=""){
       $u=$_SESSION['username'];
      echo "<script>document.getElementById ('user'). href = 'logout.php';document.getElementById ('user'). innerHTML = 'Logout, $u';</script>";
  }
  else
      echo "<script>document.getElementById ('user'). href = 'login.php';document.getElementById ('user'). innerHTML = 'Login';</script>";

  ?>


    <section class="breadcrumb_part" style="height: 130px;">
      <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>White Polaroids</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="product_list section_padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8" style="flex: 0 0 100%;max-width: 100%;">
                    <div class="product_list">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <a href="basicwhite.php"><img src="images/polaroid.webp" alt="#" class="img-fluid">
                                    <h3> Basic Polaroids </h3>
                                    <p>From ₹40</p></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <a href="basicwhitemini.php"><img src="images/minipolaroid.webp" alt="#" class="img-fluid">
                                    <h3> Mini Polaroids </h3>
                                    <p>From ₹45</p></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <a href="basicwhitesquare.php"><img src="images/square.webp" alt="#" class="img-fluid">
                                    <h3> Square Polaroids </h3>
                                    <p>From ₹40</p></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <a href="basicwhitewide.php"><img src="images/wide.webp" alt="#" class="img-fluid">
                                    <h3>Wide Polaroids</h3>
                                    <p>From ₹40</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="index.php" class="btn_3">Go Back</a>
                        </div>
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



      <script src="js/combinejs.js"></script>



  </body>

  </html>
