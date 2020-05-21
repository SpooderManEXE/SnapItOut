<?php
?><head>
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
    .wrapper {
      width: 42%;
    }
    .d-block{
      padding: 0px;
      padding-top: 15px;
      padding-bottom: 15px;

    }
    @media only screen and (min-width: 768px) {
      .wrapper {
        width: 85%;
      }
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
                      <h2>Payment Gateway</h2>
                  </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
<?php
require('pconfig.php');
require('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
$orderData = [
    'receipt'         => 3456,
    'amount'          => $_POST['amount'] * 100,
    'currency'        => $_POST['currency'],
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
if ($displayCurrency !== 'INR') {
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $_POST['item_name'],
    "description"       => $_POST['item_description'],
    "image"             => "",
    "prefill"           => [
    "name"              => $_POST['cust_name'],
    "email"             => $_POST['email'],
    "contact"           => $_POST['contact'],
    ],
    "notes"             => [
    "address"           => $_POST['address'],
    "merchant_order_id" => $_SESSION['id'].$_SESSION['name'],
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);


require("checkout/manual.php");
?>
</div>
