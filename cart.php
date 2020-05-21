<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else {
  $connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");
  $t_product='cart'.$_SESSION['id'];
  $query=" CREATE TABLE IF NOT EXISTS `$t_product` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`quantity` int(11) NOT NULL,
`price` double(10,2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;";
$result = mysqli_query($connect, $query);
}
$connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");



if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
        $delid=$_GET['id'];
        $t_product='cart'.$_SESSION['id'];
         $query=" DELETE FROM `$t_product` WHERE id='$delid'";
         $result = mysqli_query($connect, $query);
        echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="cart.php"</script>';


  }
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

  <?php
  if($_SESSION['username']!=""){
       $u=$_SESSION['username'];
      echo "<script>document.getElementById ('user'). href = 'logout.php';document.getElementById ('user'). innerHTML = 'Logout, $u';</script>";
  }
  else
      echo "<script>document.getElementById ('user'). href = 'login.php';document.getElementById ('user'). innerHTML = 'Login';</script>";

  ?>

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
                        <h2>cart list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Cart Area =================-->

  <div class="container" style="overflow-x:auto;">

       <div style="clear:both"></div>
       <br />
       <h3>Order Details</h3>
       <div class="table-responsive">
            <table class="table table-bordered">
                 <tr>
                      <th width="40%">Item Name</th>
                      <th width="10%">Quantity</th>
                      <th width="20%">Price</th>
                      <th width="15%">Total</th>
                      <th width="5%">Action</th>
                 </tr>
                 <?php
                 $total=0;
                 $t_product='cart'.$_SESSION['id'];

                 $query = "SELECT * FROM $t_product ORDER BY id ASC";
                 $result = mysqli_query($connect, $query);
                 if(mysqli_num_rows($result) > 0)
                 {
                      while($row = mysqli_fetch_array($result))
                      {
                 ?>
                 <tr>
                      <td><?php echo $row["name"]; ?></td>
                      <td><?php echo $row["quantity"]; ?></td>
                      <td>₹ <?php echo $row["price"]; ?></td>
                      <td>₹ <?php echo number_format($row["quantity"] * $row["price"], 2); ?></td>
                      <td><a href="cart.php?action=delete&id=<?php echo $row["id"]; ?>"><span class="text-danger">Remove</span></a></td>
                 </tr>
                 <?php
                           $total = $total + ($row["quantity"] * $row["price"]);
                           $_SESSION['total']=$total;
                      }
                 ?>
                 <tr>
                      <td colspan="3" align="right">Subtotal</td>
                      <td align="right" id="total">₹ <?php echo number_format($_SESSION['total'], 2); ?></td>
                      <td></td>
                 </tr>
                 <?php
                 }
                 ?>
            </table>
       </div>
  </div>

  <div class="card_area">
    <script type="text/javascript">
      function addr() {
          var chkYes = document.getElementById("add");
          var addr = document.getElementById("addr");

          addr.style.display = chkYes.checked ? "block" : "none";



      }
  </script>

  <div id="gg" style="display:block">
    <div style="padding-left:50px">
      <h4>Not at Amritapuri?<h4>
      <h4><input type="radio" id="add" onclick="addr()"><label for="add"> Add ₹20 delivery charge</label></h4></div>
    <form method="GET" action="cart.php" id="prom">
          <textarea form="prom" name="addr" id="addr" style="margin-left: 50px;display: none" placeholder="enter full address with zipcode" rows="4" cols="50"></textarea><br>
      <div class="product_count_area">
          <div class="product_count d-inline-block" style="border:0px">
              <div class="product_count d-inline-block"style="border:0px">
                  <input type="text" name="promo" class="form-control" placeholder="Promocode" value="" style="color:white">

              </div>
          </div>
          <input type="submit" class=" btn_3" value="Submit" name="submit" style="background-color: #795376;color: white;text-align: center;">
        </form>

        </div>
        <br><h5 style="text-align:center;">[if you don't see a popup or change in the price try entering again]</h5>

        </div>
      </div>
    <?php
    $_SESSION['promo']="";
    $_SESSION['total']=$total;

    if(isset($_GET["submit"])) {
      $code=$_GET['promo'];

      $addr=$_GET['addr'];
      if($addr!=""){
      //$total+=20;
      $query=" INSERT INTO `$t_product` (`id`, `name`, `quantity`, `price`) VALUES
      (999, 'Delivery',1, 20.00)";
      $result = mysqli_query($connect, $query);
      $_SESSION['total']=$total;
      $_SESSION['address']=$addr;
      echo '<script>window.location="cart.php"</script>';


      }

      $_SESSION['promo']=$code;
      $connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");
      $t_product='cart'.$_SESSION['id'];
    $query = "SELECT * FROM promo where code='$code'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0&&$addr!="")
    {
        $row = mysqli_fetch_array($result);
        $total=$total-($total*$row['disc'])/100;
        $_SESSION['total']=$total;
        echo "<script>document.getElementById('total').innerHTML='₹$total';console.log('$total')</script>";
        echo "<script>var chkYes = document.getElementById('gg');</script>";
        echo "<script>chkYes.style.display='none';</script>";
        echo "<script>window.location='cart.php?addr='".$addr."'&promo='".$code."&submit=Submit</script>";


    }
    else if(mysqli_num_rows($result) > 0||$addr!="")
    {
        $row = mysqli_fetch_array($result);
        $total=$total-($total*$row['disc'])/100;
        $_SESSION['total']=$total;
        echo "<script>document.getElementById('total').innerHTML='₹$total';console.log('$total')</script>";
        echo "<script>var chkYes = document.getElementById('gg');</script>";
        echo "<script>chkYes.style.display='none';</script>";
        echo "<script>window.location='cart.php?addr='".$addr."'&promo='".$code."&submit=Submit</script>";

    }
    else if(mysqli_num_rows($result) < 0&&$addr!="")
    {
        $row = mysqli_fetch_array($result);
        $total=$total-($total*$row['disc'])/100;
        $_SESSION['total']=$total;
        echo "<script>document.getElementById('total').innerHTML='₹ $total';console.log('$total')</script>";
        echo "<script>window.alert('Invalid Promo Code')</script>";
        echo '<script>window.location="cart.php"</script>';

        //$query = "DELETE FROM promo where code='$code'";
        //$result = mysqli_query($connect, $query);

    }
    else
    {
         echo "<script>window.alert('Invalid Promo Code')</script>";
         echo '<script>window.location="cart.php"</script>';
    }
  }

    ?>






    </div>

  </div>




  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <div class="checkout_btn_inner float-right">

            <a class="btn_1" href="index.php">Continue Shopping</a>
            <form action="uploadimages.php" method="POST"<?php $_SESSION['total'] = $total;?>>
            <input class="btn_1 checkout_btn_1" type="submit" name="checkout" value="Proceed to upload images">
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
