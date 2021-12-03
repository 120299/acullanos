<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$company = $_POST['company'];
$nit = $_POST['nit'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$street = $_POST['street'];
$city = $_POST['city'];
$departament = $_POST['departament'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE tbl_company SET company = :company, nit = :nit, phone = :phone, email = :email, street = :street, city = :city, departament = :departament WHERE member_no='$myid'"
);
$stmt->bindParam(':company', $company);
$stmt->bindParam(':nit', $nit);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':street', $street);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':departament', $departament);
$stmt->execute();

    header("location:../index.php?r=2305");
} catch (PDOException $e) {
}
?>