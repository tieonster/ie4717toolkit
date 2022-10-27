<?php
function checkUser($username,$password){
   include "connection.php";
   $result = mysqli_query($conn, "SELECT * FROM `data` WHERE `username` = '$username' AND `password` = '$password'") or die("No result".mysqli_error());

    $row = mysqli_fetch_array($result);
    $logic = false;

    if (($row['username'] == $username) && ($row['password'] == $password)) {
        echo "Login is successfull. Welcome <b>".$row['username']."</b>";
        $logic = true;
    }
    else{
        echo "Failed to login. Username or password is incorrect. Try again.";
    }
    return $logic;  
}
function logIn($username, $password){
    include ("connection.php");
    $_SESSION["loggedInUser"] = $username;
    $_SESSION["loggedInTime"] = time();
}
?>