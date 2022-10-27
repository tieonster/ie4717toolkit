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
}

$query = "SELECT * FROM `tools` WHERE toolsID=1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$screwdriver_name = stripslashes($row['name']);
$screwdriver_title = stripslashes($row['title']);
$screwdriver_description = stripslashes($row['description']);
$screwdriver_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=2";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$bolts_and_nuts_name = stripslashes($row['name']);
$bolts_and_nuts_title = stripslashes($row['title']);
$bolts_and_nuts_description = stripslashes($row['description']);
$bolts_and_nuts_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=3";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$shuriken_name = stripslashes($row['name']);
$shuriken_title = stripslashes($row['title']);
$shuriken_description = stripslashes($row['description']);
$shuriken_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=4";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$hammer_name = stripslashes($row['name']);
$hammer_title = stripslashes($row['title']);
$hammer_description = stripslashes($row['description']);
$hammer_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=5";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$electric_saw_name = stripslashes($row['name']);
$electric_saw_title = stripslashes($row['title']);
$electric_saw_description = stripslashes($row['description']);
$electric_saw_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=6";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$electric_drill_name = stripslashes($row['name']);
$electric_drill_title = stripslashes($row['title']);
$electric_drill_description = stripslashes($row['description']);
$electric_drill_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=7";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$taser_name = stripslashes($row['name']);
$taser_title = stripslashes($row['title']);
$taser_description = stripslashes($row['description']);
$taser_price = stripslashes($row['price']);

$query = "SELECT * FROM `tools` WHERE toolsID=8";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$soldering_machine_name = stripslashes($row['name']);
$soldering_machine_title = stripslashes($row['title']);
$soldering_machine_description = stripslashes($row['description']);
$soldering_machine_price = stripslashes($row['price']);
?>

<!-- Get variables from the url link -->
<?php
session_start();
if(isset($_GET['name'])) {
    $name = $_GET['name'];
}

if(isset($_GET['title'])) {
    $title = $_GET['title'];
}

if(isset($_GET['description'])) {
    $description = $_GET['description'];
}

if(isset($_GET['imageLink'])) {
    $imageLink = $_GET['imageLink'];
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_GET['price'])) {
    $price = $_GET['price'];
}
    ?>

<?php //catalog.php
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
    $_SESSION['qty'] = array();
}

if (isset($_GET['buy'])) {
	$_SESSION['cart'][] = $_GET['buy'];
    $_SESSION['qty'][] = $_GET['qty'];
	header('location: cart.php');
	exit();
}
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
                <li><a class="active" href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="orders.html">My Orders</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
          </nav> </div>  
    </header>
    <h1> Your Selected Product </h1>
            <?php echo $name;?>
            <?php echo $title;?>
           <?php echo $description;?>
           <?php echo $id;?>
           <?php echo $price;?>
    <div class="container"> 
        <div class="leftColumn">
            <form>
                <input type="button" style="float:left" value="Back to selection" onclick="history.back()">
            </form>

    <?php 
    $qty = 0; ?>

            <form>
                <label>Name: &nbsp; &nbsp;<br><br></label>  
                <label> Available Date: &nbsp; &nbsp; </label> <input class='input-text' type='date' name='Date' id='dateID'> <br> <br>

                <label> Quantity: &nbsp; &nbsp; </label><input type='text' value='<?php echo $qty?>' name='qty'/> <br> <br>
                
                <label> Price: &nbsp; &nbsp; </label> $price
                <div> 
                    <input type='reset' value='Clear'> <br> <br>
                    <input type='submit' value='Add to Cart'> 
                </div>
            </form>
            

<!-- <?php echo "<td><a href='" .$_SERVER['PHP_SELF']. '?buy=' .$id."'>Buy</a></td>";?> -->

 <?php echo "<td><a href='" .$_SERVER['PHP_SELF']. '?buy=' .$id.'&qty=' .$qty."'>Buy</a></td>";?>
        </div>

        <div class="rightColumn">
            <img class="catalogpic" src=<?php echo $imageLink;?>>
        </div>