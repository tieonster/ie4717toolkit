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
    $_SESSION['startDate'] = array();
    $_SESSION['endDate'] = array();
    $_SESSION['unitprice'] = array();
    $_SESSION['subtotal'] = array();
}

if (isset($_POST['qty']) AND isset($_POST['startDate']) AND isset($_POST['endDate'])) {
    $toolname = $_POST['toolname'];
    $qty = $_POST['qty'];
    $start_date = $_POST['startDate'];
    $end_date = $_POST['endDate'];
    $unit_price = $_POST['unitprice'];
    $_SESSION['cart'][] = $toolname;
    $_SESSION['qty'][] = $qty;
    $_SESSION['startDate'][] = $start_date;
    $_SESSION['endDate'][] = $end_date;
    $_SESSION['unitprice'][] = $unit_price;
    $_SESSION['subtotal'][] = $subtotal;
    $url = "cart.php";
    header('location: ' . $url);
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
    <!-- <script type="text/javascript" src="validator_functions.js"></script> -->
        <script>

        const days = (date_1, date_2) =>{
            let difference = date_1- date_2;
            let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
            return TotalDays;
        }

        function isAfter(date1, date2) {
            return date1 >= date2;
            }

        function calculateSubtotal () {
            var Q = document.getElementById("quantity");
            var startDate = document.getElementById("startDateID");
            var endDate = document.getElementById("endDateID");            

            if (startDate.value != null && endDate.value != null) {
            if (isAfter(endDate.value, startDate.value)) {
                numberOfDays = days(endDate.valueAsNumber, startDate.valueAsNumber) + 1
            }
            }

            // Handle case for if value keyed in is not an integer
            var pos = Q.value.search(/^[\d\s]*$/);
            if (pos == -1) {
                document.getElementById('subtotal').innerHTML = "Error";
                return;
            }

            var unitprice = <?php echo number_format($price,2);?>;
            priceSubtotal = Number(Q.value) * Number(unitprice) * numberOfDays;
            priceSubtotal = priceSubtotal.toFixed(2);
            if (isNaN(priceSubtotal)) {
                document.getElementById("subtotal").innerHTML = "Subtotal: Please key in borrow, return date and quantity required";
            }
            else {
                document.getElementById("subtotal").innerHTML = "Subtotal: $"+priceSubtotal;
            }
        }
        setInterval(calculateSubtotal, 100)
    
  </script>
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
    <h1 style="text-align:center"> Your Selected Product </h1>
    <div id="scroll-container">
        <div id="productselected">
            <p><font size ="+4"><?php echo $name;?></font></p>
        </div>
        <p id="scroll-text"> <?php echo $description;?></p>
    </div>
        <form>
            <br>
                <input type="button" class="button" style="float:left" value="Back to selection" onclick="history.back()">
            </form>
            <br><br><br><br>

    <div class="container"> 
        <div class="leftColumn">
            <div id="productcontainer">
            <form method="post" action="select_products.php">
                <br>
                <label>Name: &nbsp; &nbsp;</label>  <input type="text" class="remove_input_text_borders" name="toolname" value='<?php echo $name;?>' readonly><br><br>
                <label> Borrow Date: &nbsp; &nbsp; </label> <input type='date' name='startDate' id='startDateID'> <br> <br>
                <label> Return Date: &nbsp; &nbsp; </label> <input type='date' name='endDate' id='endDateID'> <br> <br>
                <label> Quantity: &nbsp; &nbsp; </label><input type='text' name='qty' id='quantity'/> <br> <br>
                <label> Price per Day: $ &nbsp; &nbsp; </label> <input type='text' name="unitprice" value='<?php echo $price;?>' readonly/> /day <br/><br/>
                <label id='subtotal' name='subtotal'> </label>
                <div> 
                    <br>
                    <input type='reset' class="button" value='Clear'> &nbsp;
                    <input type='submit' class="button" value='Add to Cart'>
                </div>
            </form>
            <br>
            </div>
            

<!-- <?php echo "<td><a href='" .$_SERVER['PHP_SELF']. '?buy=' .$id."'>Buy</a></td>";?> -->

 <!-- <?php echo "<td><a href='" .$_SERVER['PHP_SELF']. '?buy=' .$id.'&qty=' .$qty."'>Buy</a></td>";?> -->
        </div>

        <div class="rightColumn">
            <img style='position:relative; top:0px; left: 60px;' class="catalogpic" src=<?php echo $imageLink;?>>
        </div>
        <!-- <script type = "text/javascript"  src = "validator_checker4.js" ></script> -->
        <script>
            var dateNode = document.getElementById("startDateID");
            var enddateNode = document.getElementById("endDateID");
            var quantityNode = document.getElementById("quantity");

            dateNode.addEventListener("change", chkDate, false);
            enddateNode.addEventListener("change",chkEndDate, false);
            quantityNode.addEventListener("change", chkOrder, false);

            function chkDate(event) {
    
            // Get the target node of the event
    
                var myDate = event.currentTarget;
                var selectedDate = new Date(myDate.value)
                var currentDate = new Date();

                if (selectedDate <= currentDate) {
                    alert("Please choose a start date after today!");
                    myDate.focus();
                    myDate.select();
                    return false;
                } 
                }

            function chkEndDate(event) {
                var startDate = document.getElementById("startDateID").value;
                dateNode.addEventListener("change", chkDate, false);

                var endDate = event.currentTarget.value;
          
      
                if ((Date.parse(endDate) <= Date.parse(startDate))) {
                    alert("Return date should be later than Borrow date!");
                    document.getElementById("enddateID").value = "";
                }
                }

        
            function chkOrder(event) {

                // Get the target node of the event

                var myOrder = event.currentTarget;

                // Test the format of the input name 
                //  Allow the spaces after the commas to be optional
                //  Allow the period after the initial to be optional

                var numberpos = myOrder.value.search(/^[0-9]{1,3}$/);

                // if all letters are alphabet characters and character spaces, pos is 0
                // if one letter is non alphabet character or character space, pos is -1

                if (numberpos != 0) {
                    alert("The name you entered (" + myOrder.value + 
                        ") is not in the correct form. \n" +
                        "Only key in 1 to 3 numbers");
                    myOrder.focus();
                    myOrder.select();
                    return false;
                }
                }
        </script>
</div>