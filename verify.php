<?php

require('pconfig.php');

session_start();
require_once "config.php";
      $connect = mysqli_connect("localhost", "1110776", "Cartoons001", "1110776");
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

  $code=$_SESSION['promo'];
  $query = "DELETE FROM promo where code='$code'";
  $result = mysqli_query($connect, $query);


$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}
$iddd=$_POST['razorpay_payment_id'];
$tot=$_SESSION['total'];
$t_product='payment'.$_SESSION['id'];
$email=$_SESSION['username'];
if ($success === true){

      $cart='cart'.$_SESSION['id'];
     $query="INSERT INTO ORDERS VALUES ('$email','$tot','$iddd');";
$result = mysqli_query($connect, $query);
$query="CREATE TABLE $iddd SELECT * FROM $cart;";
$result = mysqli_query($connect, $query);
$addr=$_SESSION['address'];
$query=" INSERT INTO `$iddd` (`id`, `name`, `quantity`, `price`) VALUES
(990,'$addr',0, 0.00)";
$result = mysqli_query($connect, $query);
$query="DROP TABLE $cart";
     $result = mysqli_query($connect, $query);}
     else {
       $query="UPDATE $t_product SET paid =$success where total+0.00=$tot";
       $result = mysqli_query($connect, $query);
     }
    ?>
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body class="jumbotron text-center">
<div class="jumbotron text-center">
  <h1 class="display-3"><?php
  if ($success === true){
  echo "Thank You!";
  }
  else {
    echo "Sorry!";
  }
  ?></h1>
  <p class="lead"><strong>
    <?php
    if ($success === true){
    echo "<p>Your Payment ID is {$_POST['razorpay_payment_id']}</p>";
    }
    else {
      echo "<p>Your payment failed</p>
               <p>{$error}</p>";
    }
    ?>

</strong> <br><?php
if ($success === true){
echo "For queries on your purchase, mail us the ID to snapitoutstudio@gmail.com or whatsapp us at 6282613191.";
}
else {
  echo "Please try again or contact us via snapitoutstudio@gmail.com or whatsapp to 6282613191.";
}
?>
</p>
  <hr>
  <p>
    Having trouble? <a href="https://www.snapitout.studio/about.php">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://www.snapitout.studio/" role="button">Continue to homepage</a>
  </p>
</div>
