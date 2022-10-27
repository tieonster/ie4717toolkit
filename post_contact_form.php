<?php

$servername = "localhost";
$username = "shauntieon";
$password = "shauntieon";
$dbname = "toolkit";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

// create short variable names
$customer_name = $_POST['CName'];
$customer_email = $_POST['CEmail'];
$customer_number = $_POST['CNumber'];
$customer_comments = $_POST['comments'];
$customer_order = $_POST['COrder'];
  
$sql = "INSERT INTO contact_form 
VALUES ('$customer_name', '$customer_email', '$customer_number', '$customer_comments', '$customer_order')";

?>

<html lang="en">
<head> 
    <title>
        ToolKit - Home
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body> 
    <div id="wrapper"> </div>
    <header id="header"> 
        <img id="logo" src="./images/toolkitLogo.png"/>
        <div> <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="orders.html">My Orders</a></li>
                <li><a class="active" href="contact.html">Contact Us</a></li>
              </ul>
          </nav> </div>  
    </header>
<h1 style="text-align:center"><font size="+5"><b>Thank You!</b></font></h1>

<div id="productcontainer" style="text-align:center">
		<p><b>Your Comments have been sent to us! We will reach out to you again. Please check your email regularly!</b></p>
</div>

<br>
<form action="http://localhost:8000/IE4717/ie4717toolkit-master/ie4717toolkit-master/index.html" method="POST">
	<input class="button" type="submit" value="Back to Home">
</form>

<form action="http://localhost:8000/IE4717/ie4717toolkit-master/ie4717toolkit-master/products.php" method="POST">
	<input class="button" type="submit" value="Continue Browsing">
</form>

<!-- Checks if comments have been sent -->
<!-- <?php 
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
};
?> -->

<!-- <?php
	date_default_timezone_set("Asia/Singapore");
	echo date_default_timezone_get();
	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

	echo "<p>Your order is as follows: </p>";

	$totalqty = 0;
	$totalqty = $tireqty + $oilqty + $sparkqty;
	echo "Items ordered: ".$totalqty."<br />";


	if ($totalqty == 0) {

	  echo "You did not order anything on the previous page!<br />";

	} else {

	  if ($tireqty > 0) {
		echo $tireqty." tires<br />";
	  }

	  if ($oilqty > 0) {
		echo $oilqty." bottles of oil<br />";
	  }

	  if ($sparkqty > 0) {
		echo $sparkqty." spark plugs<br />";
	  }
	}


	$totalamount = 0.00;

	define('TIREPRICE', 100);
	define('OILPRICE', 10);
	define('SPARKPRICE', 4);

	$totalamount = $tireqty * TIREPRICE
				 + $oilqty * OILPRICE
				 + $sparkqty * SPARKPRICE;

	echo "Subtotal: $".number_format($totalamount,2)."<br />";

	$taxrate = 0.10;  // local sales tax is 10%
	$totalamount = $totalamount * (1 + $taxrate);
	echo "Total including tax: $".number_format($totalamount,2)."<br />";

	if($find == "a") {
	  echo "<p>Regular customer.</p>";
	} elseif($find == "b") {
	  echo "<p>Customer referred by TV advert.</p>";
	} elseif($find == "c") {
	  echo "<p>Customer referred by phone directory.</p>";
	} elseif($find == "d") {
	  echo "<p>Customer referred by word of mouth.</p>";
	} else {
	  echo "<p>We do not know how this customer found us.</p>";
	}

?> -->
</body>
</html>
