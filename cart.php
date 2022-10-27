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
}


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
    <script type="text/javascript" src="validator_functions.js"></script>
    <link rel="stylesheet" href="styles.css">

    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            font-size: 20px;
            height: 100%;
            table-layout: fixed;
        }
        .button {
            position: absolute;
            left: 60%;
            
        }
    </style>
</head>

<body> 
    <header id="header"> 
        <img id="logo" src="./images/toolkitLogo.png"/>
        <div> <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a class="active" href="cart.php">Cart</a></li>
                <li><a href="orders.html">My Orders</a></li>
                <li><a href="contact.html">Contact Us</a></li>
              </ul>
          </nav> </div>  
    </header>
    <div><h1 style="text-align:center"><font size="+5">Checkout</font></h1></div>


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
            echo "<td width=300px style=text-align:center>". $itemname. "</td>";
            echo "<td width=100px><img class=cart src=$imageLink>"."</td>";
            echo "<td>"  .$_SESSION['qty'][$i]. "</td>";
            echo "<td>"  .$_SESSION['startDate'][$i]. "</td>";
            echo "<td>" .$_SESSION['endDate'][$i]. "</td>";
            echo "<td>" .$_SESSION['unitprice'][$i]. "</td>";
            echo "<td>" .$subtotal. "</td>";
            echo "</tr>";
            echo "<br>";

            // echo "<tr> Name:"  .$itemname. "</tr>";
            // echo "<br>";
            // echo "<tr> Image Link:"  .$imageLink. "</tr>";
            // echo "<br>";
            // echo "<tr> Qty:"  .$_SESSION['qty'][$i]. "</tr>";
            // echo "<br>";
            //echo "<tr> Borrow Date:"  .$_SESSION['startDate'][$i]. "</tr>";
            // echo "<br>";
            //echo "<tr> End Date:" .$_SESSION['endDate'][$i]. "</tr>";
            // echo "<br>";
            // echo "<tr> Unit Price:" .$_SESSION['unitprice'][$i]. "</tr>";
            // echo "<br>";
            // echo "<tr> Subtotal:" .$subtotal. "</tr>";
            // echo "<br>";
        }

        echo "</table>";
        // echo '<pre>'; print_r($orders); echo '</pre>'
        ?>
    
    <div>
       <!-- <?php echo '<pre>'; print_r($array_name); echo '</pre>'; ?>
       <?php echo '<pre>'; print_r($array_imageLink); echo '</pre>'; ?> -->
       <form class="form" action="cart_confirm.php" method="post">
        <!-- to put the dynamic table of items here
        <table> 
            <th>Item</th>
            <th>Picture</th>
            <th>Qty</th>
            <th>Borrow Date</th>
            <th>End Date</th>
            <th>Unit Price</th>
            <th>Subtotal</th>

            <tr>
                <td width="300px"><? php echo .$itemname?></td>
                <td width="100px"><? php echo .$imageLink?></td>

                <td><input style="width:100px" min="0" type="number" id="javaQty" name="javaQty" value=0 onchange="calculatePrice();"></td>
                <td><input class="input-text" type="date" name="Date" id="dateID"></td>

            </tr>

            <tr>
                <td width="300px">test</td>
                <td><input style="width:100px" min="0" type="number" id="javaQty" name="javaQty" value=0 onchange="calculatePrice();"></td>
                <td><input class="input-text" type="date" name="Date" id="dateID"></td>
            </tr>


        </table> -->

        <!-- <?php echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>'; ?>
        <?php echo '<pre>'; print_r($_SESSION['startDate']); echo '</pre>'; ?> -->


        <br><br>
        <div>
            <input type="button" class="button" value="Change Order" onclick="history.back()">
        </div>
        
        <br><br><br><br>
        
        <div class="container">
            <div id="productcontainer">
            
        <br>
        <label> &nbsp; Order ID (Please remember this so that you can track your order): &nbsp; &nbsp;</label>  <input type="text" class="remove_input_text_borders" name="orderID" value='<?php echo $largestOrderID+1;?>' readonly><br><br>
        <label> &nbsp; *Name: &nbsp; &nbsp; </label> <input class="input-text" type="text" name="name"  id="custName" size=30 required placeholder = "Enter your name here"><br><br>
        <label> &nbsp; *Email: &nbsp; &nbsp; </label><input class="input-text" type="text" name="email" id="custEmail" size=30 required placeholder = "Enter your Email-ID here"><br><br>
        <label> &nbsp; *Contact No: &nbsp; &nbsp; </label><input class="input-text" type="text" name="number" id="custNumber" size=30 required placeholder = "Enter your Mobile Number here"><br><br>
        <label> &nbsp; *Shipping Address: &nbsp; &nbsp; </label><input class="input-text" type="text" name="address" id="custAddress" size=100 required placeholder = "Enter your shipping address here"><br><br>
        <label> &nbsp; *Card Number: &nbsp; &nbsp; </label><input class="input-text" type="text" name="cardnumber" id="custCard" size = 30 required placeholder ="Omit dashes"><br><br>
        <label> &nbsp; *CVV: &nbsp; &nbsp; </label><input class="input-text" type="password" name="cvv" id="custCVV" size="6"><br><br>
        
        <div>
            <br>
            <input type="reset" class="button"  value="Clear" style="position:relative; left: 240px; bottom:0px;">
            <input class="button" type="submit" value="Make Payment" style="position:relative; left: 250px; bottom:0px;">
            <input class="button" type="button" value="Back" onclick="history.back()" style="position:relative; left: -250px; bottom:0px;">
            <br><br><br>
        </div>
        </form>
            </div>
        <script type = "text/javascript"  src = "validator_checker.js" ></script>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?empty=1">Empty your cart</a></p>
    </div>


</body>

</html>