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
?>

<?php 
session_start();
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
    <div><h1 style="text-align:center"><font size="+5">Our Catalog</font></h1></div>

    <div class="container">
        <table border="0" width="100%" table-layout:fixed;>
            <col style="width:25%">
            <col style="width:25%">
            <col style="width:25%">
            <col style="width:25%">
            <caption style="text-align:left"><font size="+3"><u>Hand Tools</u></font></caption>
        
            <tr>	
                <td><img class="catalogpic" src="./images/handtool1.png"></td>
                <td><img class="catalogpic" src="./images/handtool2.jpg"></td>
                <td><img class="catalogpic" src="./images/handtool3.jpg"></td>
                <td><img class="catalogpic" src="./images/handtool4.jpg"></td>
            </tr>
        
            <tr>	
                <td><b><?php echo $screwdriver_name;?></b></td>
                <td><b><?php echo $bolts_and_nuts_name;?></b></td>
                <td><b><?php echo $shuriken_name;?></b></td>
                <td><b><?php echo $hammer_name;?></b></td>	
            </tr>
            
            <tr>	
                <td style='width=200px;'>
                <?php echo '<a href="select_products.php?name='.$screwdriver_name.'&title='.$screwdriver_title.'&description='.$screwdriver_description.'&imageLink='.$screwdriver_imageLink.'&id='.$screwdriver_id.'&price='.$screwdriver_price.'">'.$screwdriver_wrapped_title.'</a>';?></td>
                <td> <?php echo '<a href="select_products.php?name='.$bolts_and_nuts_name.'&title='.$bolts_and_nuts_title.'&description='.$bolts_and_nuts_description.'&imageLink='.$bolts_and_nuts_imageLink.'&id='.$bolts_and_nuts_id.'&price='.$bolts_and_nuts_price.'">'.$bolts_and_nuts_title.'</a>';?></td>
                <td> <?php echo '<a href="select_products.php?name='.$shuriken_name.'&title='.$shuriken_title.'&description='.$shuriken_description.'&imageLink='.$shuriken_imageLink.'&id='.$shuriken_id.'&price='.$shuriken_price.'">'.$shuriken_title.'</a>';?></td>
                <td> <?php echo '<a href="select_products.php?name='.$hammer_name.'&title='.$hammer_title.'&description='.$hammer_description.'&imageLink='.$hammer_imageLink.'&id='.$hammer_id.'&price='.$hammer_price.'">'.$hammer_title.'</a>';?></td>
            </tr>
            
         </table>       

    </div>
    <br><br><br>
    <div class="container">
        <table border="0" width="100%" table-layout:fixed;>
            <col style="width:25%">
            <col style="width:25%">
            <col style="width:25%">
            <col style="width:25%">
            <caption style="text-align:left"><font size="+3"><u>Power Tools</u></font></caption>
        
            <tr>	
                <td><img class="catalogpic" src="./images/powertool1.jpg"></td>
                <td><img class="catalogpic" src="./images/powertool2.jpeg"></td>
                <td><img class="catalogpic" src="./images/powertool3.jpeg"></td>
                <td><img class="catalogpic" src="./images/powertool4.jpg"></td>
            </tr>
        
            <tr>	
                <td><b><?php echo $electric_saw_name;?></b></td>
                <td><b><?php echo $electric_drill_name;?></b></td>
                <td><b><?php echo $taser_name;?></b></td>
                <td><b><?php echo $soldering_machine_name;?></b></td>	
            </tr>
            
            <tr>	
            <td> <?php echo '<a href="select_products.php?name='.$electric_saw_name.'&title='.$electric_saw_title.'&description='.$electric_saw_description.'&imageLink='.$electric_saw_imageLink.'&id='.$electric_saw_id.'&price='.$electric_saw_price.'">'.$electric_saw_title.'</a>';?></td>
            <td> <?php echo '<a href="select_products.php?name='.$electric_drill_name.'&title='.$electric_drill_title.'&description='.$electric_drill_description.'&imageLink='.$electric_drill_imageLink.'&id='.$electric_drill_id.'&price='.$electric_drill_price.'">'.$electric_drill_title.'</a>';?></td>
            <td> <?php echo '<a href="select_products.php?name='.$taser_name.'&title='.$taser_title.'&description='.$taser_description.'&imageLink='.$taser_imageLink.'&id='.$taser_id.'&price='.$taser_price.'">'.$taser_title.'</a>';?></td>
            <td> <?php echo '<a href="select_products.php?name='.$soldering_machine_name.'&title='.$soldering_machine_title.'&description='.$soldering_machine_description.'&imageLink='.$soldering_machine_imageLink.'&id='.$soldering_machine_id.'&price='.$soldering_machine_price.'">'.$soldering_machine_title.'</a>';?></td>
            </tr>


         </table>       

</body>

</html>