<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    $myid = $_SESSION['myid'];
    $myname = $_SESSION['myname'];
    $myphone = $_SESSION['phone'];
    $myemail = $_SESSION['email'];
    $myavatar = $_SESSION['avatar'];
    $mylogin = $_SESSION['lastlogin'];
    $myrole = $_SESSION['role'];
    $user_online = true;
    $myavatar = $_SESSION['avatar'];
} else {
    $user_online = false;
}
?>
