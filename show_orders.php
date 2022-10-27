<?php  //cart.php
session_start();
if (!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
    $_SESSION['qty'] = array();
    $_SESSION['startDate'] = array();
    $_SESSION['endDate'] = array();
    $_SESSION['unitprice'] = array();
    $_SESSION['subtotal'] = array();
}

if (isset($_GET['empty'])) {
  unset($_SESSION['cart']);
    unset($_SESSION['qty']);
    unset($_SESSION['startDate']);
    unset($_SESSION['endDate']);
    unset($_SESSION['unitprice']);
    unset($_SESSION['subtotal']);
  header('location: ' . $_SERVER['PHP_SELF']);
  exit();
}
?>

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

// Getting tools from database
$array_id = [];
$array_name = [];
$array_title = [];
$array_description = [];
$array_price = [];
$array_imageLink = [];

$query = "SELECT * FROM `tools` WHERE toolsID=1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$screwdriver_id = stripslashes($row['toolsID']);
$screwdriver_name = stripslashes($row['name']);
$screwdriver_title = stripslashes($row['title']);
$screwdriver_description = stripslashes($row['description']);
$screwdriver_price = stripslashes($row['price']);
$screwdriver_imageLink = stripslashes($row['imageLink']);

$screwdriver_wrapped_title = wordwrap($screwdriver_title, 43, "<br />\n");

$query = "SELECT * FROM `tools` WHERE toolsID=2";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$bolts_and_nuts_id = stripslashes($row['toolsID']);
$bolts_and_nuts_name = stripslashes($row['name']);
$bolts_and_nuts_title = stripslashes($row['title']);
$bolts_and_nuts_description = stripslashes($row['description']);
$bolts_and_nuts_price = stripslashes($row['price']);
$bolts_and_nuts_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=3";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$shuriken_id = stripslashes($row['toolsID']);
$shuriken_name = stripslashes($row['name']);
$shuriken_title = stripslashes($row['title']);
$shuriken_description = stripslashes($row['description']);
$shuriken_price = stripslashes($row['price']);
$shuriken_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=4";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$hammer_id = stripslashes($row['toolsID']);
$hammer_name = stripslashes($row['name']);
$hammer_title = stripslashes($row['title']);
$hammer_description = stripslashes($row['description']);
$hammer_price = stripslashes($row['price']);
$hammer_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=5";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$electric_saw_id = stripslashes($row['toolsID']);
$electric_saw_name = stripslashes($row['name']);
$electric_saw_title = stripslashes($row['title']);
$electric_saw_description = stripslashes($row['description']);
$electric_saw_price = stripslashes($row['price']);
$electric_saw_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=6";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$electric_drill_id = stripslashes($row['toolsID']);
$electric_drill_name = stripslashes($row['name']);
$electric_drill_title = stripslashes($row['title']);
$electric_drill_description = stripslashes($row['description']);
$electric_drill_price = stripslashes($row['price']);
$electric_drill_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=7";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$taser_id = stripslashes($row['toolsID']);
$taser_name = stripslashes($row['name']);
$taser_title = stripslashes($row['title']);
$taser_description = stripslashes($row['description']);
$taser_price = stripslashes($row['price']);
$taser_imageLink = stripslashes($row['imageLink']);

$query = "SELECT * FROM `tools` WHERE toolsID=8";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$soldering_machine_id = stripslashes($row['toolsID']);
$soldering_machine_name = stripslashes($row['name']);
$soldering_machine_title = stripslashes($row['title']);
$soldering_machine_description = stripslashes($row['description']);
$soldering_machine_price = stripslashes($row['price']);
$soldering_machine_imageLink = stripslashes($row['imageLink']);

// Storing into local arrays for easier calling later on
array_push($array_id, $screwdriver_id, $bolts_and_nuts_id, $shuriken_id, $hammer_id, $electric_saw_id, $electric_drill_id, $taser_id, $soldering_machine_id);
array_push($array_name, $screwdriver_name , $bolts_and_nuts_name, $shuriken_name, $hammer_name, $electric_saw_name, $electric_drill_name, $taser_name, $soldering_machine_name);
array_push($array_title, $screwdriver_title, $bolts_and_nuts_title, $shuriken_title, $hammer_title, $electric_saw_title, $electric_drill_title, $taser_title, $soldering_machine_title);
array_push($array_description, $screwdriver_description, $bolts_and_nuts_description, $shuriken_description, $hammer_description, $electric_saw_description, $electric_drill_description, $taser_description, $soldering_machine_description);
array_push($array_price, $screwdriver_price, $bolts_and_nuts_price, $shuriken_price, $hammer_price, $electric_saw_price, $electric_drill_price, $taser_price, $soldering_machine_price);
array_push($array_imageLink, $screwdriver_imageLink, $bolts_and_nuts_imageLink, $shuriken_imageLink, $hammer_imageLink, $electric_saw_imageLink, $electric_drill_imageLink, $taser_imageLink, $soldering_machine_imageLink);


$query = "SELECT MAX(orderID) FROM `customer_orders_main`";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$largestOrderID = $row['MAX(orderID)'];
?>

<!DOCTYPE html>
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
                <li><a class="active" href="orders.html">My Orders</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
          </nav> </div>  
    </header>
    <div><h1 style="text-align:center"><font size="+5">Your Order</font></h1></div>

<!-- <?php // create short variable names
$order_id = $_POST['orderid'];

$sql = "SELECT * FROM `all_orders` WHERE orderID='$order_id'";
$query = mysqli_query($conn, $sql);

if($query) {
    while($row = mysqli_fetch_assoc($query)){
        echo $row['item'] . " ";
        echo $row['quantity'] . " ";
        echo $row['price'] . " ";
        echo $row['dateStart'] . " ";
        echo $row['dateEnd'] . " ";
    }
}
?> -->

<?php
        $customer_orders_main = [];
        $orders = [];
        echo "<table class=center>";
        echo "<th> Item". "</th>";
        echo "<th> Image" ."</th>";
        echo "<th> Qty" ."</th>";
        echo "<th> Borrow Date". "</th>";
        echo "<th> End Date". "</th>";
        echo "<th> Unit Price" ."</th>";
        echo "<th> Subtotal" ."</th>";  

        for ($i=0; $i < count($_SESSION['cart']); $i++){
            // Calculate subtotal
            $startDate = strtotime($_SESSION['startDate'][$i]);
            $endDate = strtotime($_SESSION['endDate'][$i]);
            $itemname = $_SESSION['cart'][$i];
            $daydiff = round(($endDate - $startDate)/(60 * 60 * 24)) + 1;
            $unitprice = (float)$_SESSION['unitprice'][$i];
            $qty = (int)$_SESSION['qty'][$i];
            $subtotal = $unitprice * $qty * $daydiff;

            $key = array_search($itemname, $array_name);
            $imageLink = $array_imageLink[$key];

            array_push($orders, [$largestOrderID+1, $itemname, $qty, $unitprice, $_SESSION['startDate'][$i], $_SESSION['endDate'][$i]]);
            

            echo "<tr>";
            echo "<td width=300px style=text-align: center>". $itemname. "</td>";
            echo "<td width=100px><img class=cart src=$imageLink>"."</td>";
            echo "<td>"  .$_SESSION['qty'][$i]. "</td>";
            echo "<td>"  .$_SESSION['startDate'][$i]. "</td>";
            echo "<td>" .$_SESSION['endDate'][$i]. "</td>";
            echo "<td>" .$_SESSION['unitprice'][$i]. "</td>";
            echo "<td>" .$subtotal. "</td>";
            echo "</tr>";
            echo "<br>";
        }

        echo "</table>";
        ?>


    </div>

</body>

</html>