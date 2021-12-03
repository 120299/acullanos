<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $myid = $_SESSION['myid'];
    $mycompany = $_SESSION['mycompany'];
    $mynit = $_SESSION['mynit'];
    $myname = $_SESSION['myname'];
    $myphone = $_SESSION['myphone'];
    $myemail = $_SESSION['myemail'];
    $myestablishment = $_SESSION['myestablishment'];
    $mystreet = $_SESSION['mystreet'];
    $mydepartament = $_SESSION['mydepartament'];
    $mycity = $_SESSION['mycity'];
    $mykg = $_SESSION['mykg'];
    $myharvest = $_SESSION['myharvest'];
    $myavatar = $_SESSION['avatar'];
    $mylogin = $_SESSION['lastlogin'];
    $myrole = $_SESSION['role'];
    $user_online = true;
    $myavatar = $_SESSION['avatar'];
} else {
    $user_online = false;
}
?>
