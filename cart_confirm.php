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

session_start();

// create short variable names
$customer_name = $_POST['name'];
$customer_email = $_POST['email'];
$customer_number = $_POST['number'];
$customer_address = $_POST['address'];
$customer_card_number = $_POST['cardnumber'];
$customer_cvv = $_POST['cvv'];
$order_id = $_POST['orderID'];
  
// Insert into customers main database
$sql = "INSERT INTO customer_orders_main 
VALUES ('$customer_name', '$customer_email', '$customer_number', '$customer_address', '$customer_card_number', '$customer_cvv', '$order_id')";

// Insert into all_orders database
$sql2 = "INSERT INTO all_orders 
(orderID, item, quantity, price, dateStart, dateEnd) VALUES";

$orders = [];
for ($i=0; $i < count($_SESSION['cart']); $i++){
    $itemname = $_SESSION['cart'][$i];
    $qty = (int)$_SESSION['qty'][$i];
    $unitprice = (float)$_SESSION['unitprice'][$i];
    $startDate = $_SESSION['startDate'][$i];
    $endDate = $_SESSION['endDate'][$i];

    $orders[] = "('$order_id', '$itemname', '$qty', '$unitprice', '$startDate', '$endDate')";
}

$sql2 .= join(',', $orders);
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
        <?php echo "<p> Order ID: '$order_id' </p>";?>
		<p><b>Your order has been received! Please take note of your order ID and check back periodically! </b></p>
</div>

<!-- <?php echo '<pre>'; print_r($orders); echo '</pre>'?>  -->

    <br>
    <a href="http://localhost:8000/IE4717/ie4717toolkit-master/">
	<input class="button" type="submit" value="Back to Home"></a>
    <br>
    <a href="http://localhost:8000/IE4717/ie4717toolkit-master/products.php">
	<input class="button" type="submit" value="Continue Browsing"></a>

<?php 
if ($conn->query($sql) === TRUE) {
    echo "";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  };

if ($conn->query($sql2) === TRUE) {
    echo "";
    } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
    };
  ?>

<?php
   session_destroy();
?>

</body>
</html>
