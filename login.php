<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: cart.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, name, phone FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $_SESSION["name"], $_SESSION["number"]);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
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

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part" style="height: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>login</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding " style="background-image:url('images/basic.webp');background-repeat: no-repeat; background-size: 100%;">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_text text-center">
                            <h3 style="color:white">Welcome Back ! <br>
                                Please Sign in now</h3>

                            <div class="wrapper">
                                <form class="row contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                                    <div class="col-md-12 form-group p_star <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <input type="text" name="username" class="form-control" placeholder="Email" value="<?php echo $username; ?>">
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="col-md-12 form-group p_star <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn_3" value="Login">
                                    </div>
                                    <p>Do not have an account? <a href="register.php" style="background-color:white; color: #644861">Register here</a>.</p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

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
