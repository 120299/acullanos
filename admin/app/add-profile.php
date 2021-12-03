<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE tbl_users SET name = :name, phone = :phone, email = :email WHERE member_no='$myid'"
);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->execute();

$_SESSION['myname'] = $name;
$_SESSION['myphone'] = $phone;
$_SESSION['myemail'] = $email;

    header("location:../index.php?r=6734");
} catch (PDOException $e) {
}
?>