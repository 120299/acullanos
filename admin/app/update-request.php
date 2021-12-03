<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$id = $_POST['recoleccionid'];
$company = $_POST['company'];
$nit = $_POST['nit'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$establishment = $_POST['establishment'];
$street = $_POST['street'];
$departament = $_POST['departament'];
$city = $_POST['city'];
$solicitudkg = $_POST['solicitudkg'];
$recoleccion = $_POST['recoleccion'];
$radicado = $_POST['radicado'];


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE tbl_request SET company = :company, nit = :nit, name = :name, phone = :phone, email = :email, establishment = :establishment, street = :street, departament = :departament, city = :city, solicitudkg = :solicitudkg, recoleccion = :recoleccion, radicado = :radicado WHERE id= :aid AND member_no = '$myid'");
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':nit', $nit);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':establishment', $establishment);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':departament', $departament);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':solicitudkg', $solicitudkg);
    $stmt->bindParam(':recoleccion', $recoleccion);
    $stmt->bindParam(':radicado', $radicado);
    $stmt->bindParam(':aid', $id);
    $stmt->execute();
    header("location:../table.php?r=3214");
} catch (PDOException $e) {
}
?>
