<? ob_start("ob_gzhandler"); ?>
<!doctype html>
<html lang="zxx">
<?php
// Include config file
session_start();

require_once "config.php";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: cart.php");
    exit;
}
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$name = $phone = $insta = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $insta = trim($_POST["insta"]);


    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password,name,phone,insta) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $name, $phone, $insta);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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


    <!-- breadcrumb part start-->
    <section class="breadcrumb_part" style="height: 130px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
<section class="login_part section_padding " style="background-image:url('images/a1.webp');background-repeat: no-repeat; background-size: 100%;">
          <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <div class="wrapper">
                                <h2>Sign Up</h2>
                                <p>Please fill this form to create an account.</p><br>
                                <form class="row contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                  <div class="col-md-12 form-group p_star">
                                      <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $name; ?>">

                                  </div>
                                    <div class="col-md-12 form-group p_star <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <input type="text" name="username" placeholder="Email" class="form-control" value="<?php echo $username; ?>">
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="col-md-12 form-group p_star <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo $password; ?>">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="col-md-12 form-group p_star <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                        <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" value="<?php echo $confirm_password; ?>">
                                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="<?php echo $phone; ?>">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" name="insta" placeholder="Instagram Username [optional]" class="form-control" value="<?php echo $insta; ?>">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="submit" class="btn_3" value="Create Account">
                                        <input type="reset" class="btn_3" value="Reset">
                                    </div>
                                    <p>Already have an account? <a href="login.php" style="background-color:white; color: #644861">Login here</a>.</p>
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
