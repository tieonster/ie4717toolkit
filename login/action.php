<?php       
  include "lib.php";

  if(checkUser($username,$password)){
    logIn($username, $password);
    header("Location: index_en.php");//goes to my main page
?>
    <li><a href="#">Hello, <?php echo $username; ?></a></li>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
      console.log("successfull");
      $(".nav_header").remove();//I tried to change my index_en.php page, but no changes appear there
    </script>
<?php
    }
?>