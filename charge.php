<?php
  require_once('vendor\autoload.php');
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');
  session_start();

  \Stripe\Stripe::setApiKey('sk_test_51KzdcZBuWfpOWtPjhaWN0DiI03w95HJ9dDxMY7K6krr8cQnoBoWnkWvTuNqd3f1MiPqLpu1wt3rCjH0aVF2z8XWX00kFmzBWrF');


$GET=filter_var_array($_GET, FILTER_SANITIZE_STRING);
$product= $GET['id'];
$owner= $GET['name'];
 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];

$username=$_SESSION['userUid'];
//  print_r($token);

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => 50000,
  "currency" => "usd",
  "description" => $product,
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'username'=>$username,
  // 'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
  'username'=>$username,
  'ownername'=>$owner,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);