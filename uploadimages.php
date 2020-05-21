<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php
// Initialize the session
session_start();
$imgcnt=0;
include "iconfig.php";
$connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

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
  <script>
  document.getElementById ("user"). href = "logout.php";
  document.getElementById ("user"). innerHTML = "Logout, <?php echo $_SESSION["username"]?>";
  </script>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part" style="height: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">

                        <h2>Upload Images</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Cart Area =================-->


  <div class="container" style="overflow-x:auto;">

       <div style="clear:both"></div>
       <br>
       <?php

       $t_product='cart'.$_SESSION['id'];

       $query = "SELECT * FROM $t_product ORDER BY id ASC";
       $result = mysqli_query($connect, $query);
       if(mysqli_num_rows($result) > 0)
       {
            while($row = mysqli_fetch_array($result))
            {
       ?>
       <h3><?php echo $row["name"]." : ".$row['quantity']." Sets "; ?>


<?php if($row["id"]==11||$row["id"]==13||$row["id"]==14){
            $imgcnt=4*$row["quantity"];
            echo " : ".$imgcnt." images<br>";
            echo "<button id='img41' onclick='f41()'>Select Files</button></h3><br>";

          }
          elseif ($row["id"]==211||$row["id"]==212||$row["id"]==213||$row["id"]==214||$row["id"]==215||$row["id"]==216||$row["id"]==217){
            $imgcnt=4*$row["quantity"];
            echo " : ".$imgcnt." images<br>";
            echo "<button id='img42' onclick='f42()'>Select Files</button></h3><br>";

          }
          elseif ($row["id"]==31||$row["id"]==32){
            $imgcnt=15*$row["quantity"];
            echo " : ".$imgcnt." images<br>";
            echo "<button id='img15' onclick='f15()'>Select Files</button></h3><br>";

          }
          elseif ($row["id"]==999||$row["id"]==990){

        }
          else{
            $imgcnt=8*$row["quantity"];
            echo " : ".$imgcnt." images<br>";
            echo "<button id='img8' onclick='f8()'>Select Files</button></h3><br>";

        }
          ?>
</h3>

<br>
<link href="//transloadit.edgly.net/releases/uppy/robodog/v1.5.1/robodog.min.css" rel="stylesheet">
<script src="//transloadit.edgly.net/releases/uppy/robodog/v1.5.1/robodog.min.js"></script>
<script>
  function f8(){
    var uppy = window.Robodog.pick({
      providers: [ 'instagram', 'webcam', 'google-drive' ],
      waitForEncoding: false,
      params: {
        // To avoid tampering, use Signature Authentication
        auth: { key: '5ebe0ca2bebb412e91e5b056ed7516a8' },
        steps: {
    ':original': {
      robot: "/upload/handle"
    },
    exported: {
      use: [":original"],
      robot: "/azure/store",
      account: "snapitout",
      key: "EElq8WohltSX51YWsb0voP3Dtq/6XLdAfDJ8qvHlIFFZJKhoDcxZeHfcHPJAKp8BUDL8RcYBQ5OlwQ7mkPpgfg==",
      container: "snapitoutstudio",
      path: "USER"+"<?php echo $_SESSION['id']?>"+"/MINI/${file.original_basename}.${file.ext}"
    }
  }
  }
    }).then(function (bundle) {
      window.alert("Images uploaded successfully");
      document.getElementById('img8').disabled = true;
      // Due to `waitForEncoding: true` this is fired after encoding is done.
      // Alternatively, set `waitForEncoding` to `false` and provide a `notify_url`
      // for Async Mode where your back-end receives the encoding results
      // so that your user can be on their way as soon as the upload completes.
      console.log(bundle.transloadit) // Array of Assembly Statuses
      console.log(bundle.results)     // Array of all encoding results
    }).catch(console.error)

  }

  function f41(){
    var uppy = window.Robodog.pick({
      providers: [ 'instagram', 'webcam', 'google-drive' ],
      waitForEncoding: false,
      params: {
        // To avoid tampering, use Signature Authentication
        auth: { key: '5ebe0ca2bebb412e91e5b056ed7516a8' },
        steps: {
    ':original': {
      robot: "/upload/handle"
    },
    exported: {
      use: [":original"],
      robot: "/azure/store",
      account: "snapitout",
      key: "EElq8WohltSX51YWsb0voP3Dtq/6XLdAfDJ8qvHlIFFZJKhoDcxZeHfcHPJAKp8BUDL8RcYBQ5OlwQ7mkPpgfg==",
      container: "snapitoutstudio",
      path: "USER"+"<?php echo $_SESSION['id']?>"+"/Polaroids/${file.original_basename}.${file.ext}"
    }
  }
  }
    }).then(function (bundle) {
      window.alert("Images uploaded successfully");
      document.getElementById('img41').disabled = true;
      // Due to `waitForEncoding: true` this is fired after encoding is done.
      // Alternatively, set `waitForEncoding` to `false` and provide a `notify_url`
      // for Async Mode where your back-end receives the encoding results
      // so that your user can be on their way as soon as the upload completes.
      console.log(bundle.transloadit) // Array of Assembly Statuses
      console.log(bundle.results)     // Array of all encoding results
    }).catch(console.error)
  }

  function f42(){
    var uppy = window.Robodog.pick({
      providers: [ 'instagram', 'webcam', 'google-drive' ],
      waitForEncoding: false,
      params: {
        // To avoid tampering, use Signature Authentication
        auth: { key: '5ebe0ca2bebb412e91e5b056ed7516a8' },
        steps: {
    ':original': {
      robot: "/upload/handle"
    },
    exported: {
      use: [":original"],
      robot: "/azure/store",
      account: "snapitout",
      key: "EElq8WohltSX51YWsb0voP3Dtq/6XLdAfDJ8qvHlIFFZJKhoDcxZeHfcHPJAKp8BUDL8RcYBQ5OlwQ7mkPpgfg==",
      container: "snapitoutstudio",
      path: "USER"+"<?php echo $_SESSION['id']?>"+"/CustomFrames/${file.original_basename}.${file.ext}"
    }
  }
  }
    }).then(function (bundle) {
      window.alert("Images uploaded successfully");
      document.getElementById('img42').disabled = true;
      // Due to `waitForEncoding: true` this is fired after encoding is done.
      // Alternatively, set `waitForEncoding` to `false` and provide a `notify_url`
      // for Async Mode where your back-end receives the encoding results
      // so that your user can be on their way as soon as the upload completes.
      console.log(bundle.transloadit) // Array of Assembly Statuses
      console.log(bundle.results)     // Array of all encoding results
    }).catch(console.error)
  }

  function f15(){
    var uppy = window.Robodog.pick({
      providers: [ 'instagram', 'webcam', 'google-drive' ],
      waitForEncoding: false,
      params: {
        // To avoid tampering, use Signature Authentication
        auth: { key: '5ebe0ca2bebb412e91e5b056ed7516a8' },
        steps: {
    ':original': {
      robot: "/upload/handle"
    },
    exported: {
      use: [":original"],
      robot: "/azure/store",
      account: "snapitout",
      key: "EElq8WohltSX51YWsb0voP3Dtq/6XLdAfDJ8qvHlIFFZJKhoDcxZeHfcHPJAKp8BUDL8RcYBQ5OlwQ7mkPpgfg==",
      container: "snapitoutstudio",
      path: "USER"+"<?php echo $_SESSION['id']?>"+"/PHOTOSTRIP/${file.original_basename}.${file.ext}"
    }
  }
  }
    }).then(function (bundle) {
      window.alert("Images uploaded successfully");
      document.getElementById('img15').disabled = true;
      // Due to `waitForEncoding: true` this is fired after encoding is done.
      // Alternatively, set `waitForEncoding` to `false` and provide a `notify_url`
      // for Async Mode where your back-end receives the encoding results
      // so that your user can be on their way as soon as the upload completes.
      console.log(bundle.transloadit) // Array of Assembly Statuses
      console.log(bundle.results)     // Array of all encoding results
    }).catch(console.error)
  }
</script>



     <?php

   }
   }?>
  </div>
<div>









    </div>

  </div>



      <section class="cart_area">
        <div class="container">
          <div class="cart_inner">
            <div class="table-responsive">
              <div class="checkout_btn_inner float-right">
                <form action="pay.php" method="POST">
                  <input type="hidden" name="item_name" value="Snap It Out">
                  <input type="hidden" name="item_description" value="Polaroids">
                  <input type="hidden" name="item_number" value="3456">
                  <input type="hidden" name="amount" value="<?php echo (int)$_SESSION['total'];?>">
                  <input type="hidden" name="address" value="<?php if($addr!='')echo $addr;else echo 'address';?>">
                  <input type="hidden" name="currency" value="INR">
                  <input type="hidden" name="cust_name" value="<?php echo $_SESSION["name"]?>">
                  <input type="hidden" name="email" value="<?php echo $_SESSION['username']?>">
                  <input type="hidden" name="contact" value="<?php echo $_SESSION["number"]?>">
                <input class="btn_1 checkout_btn_1" type="submit" name="checkout" value="Proceed to checkout">
              </form>
              </div>
            </div>
          </div>

  </section>
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
  <!--::footer_part end::-->

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
