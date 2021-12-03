<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$company = $_POST['company'];
$nit = $_POST['nit'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$establishment = $_POST['establishment'];
$street = $_POST['street'];
$departament = $_POST['departament'];
$city = $_POST['city'];
$kg = $_POST['kg'];
$harvest = $_POST['harvest'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE nit = :nit AND member_no != '$myid'");
    $stmt->bindParam(':nit', $mynit);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
    if ($rec == "0") {
        $stmt = $conn->prepare(
            "UPDATE tbl_users SET company = :company, nit = :nit, name = :name, phone = :phone, email = :email, establishment = :establishment, street = :street, departament = :departament , city = :city , kg = :kg, harvest = :harvest WHERE member_no='$myid'"
        );
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':nit', $nit);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':establishment', $establishment);
		$stmt->bindParam(':street', $street);
		$stmt->bindParam(':departament', $departament);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':kg', $kg);
        $stmt->bindParam(':harvest', $harvest);
        $stmt->execute();

        $_SESSION['mycompany'] = $company;
        $_SESSION['mynit'] = $nit;
        $_SESSION['myname'] = $name;
        $_SESSION['myphone'] = $phone;
        $_SESSION['myemail'] = $email;
        $_SESSION['myestablishment'] = $establishment;
        $_SESSION['mystreet'] = $street;
        $_SESSION['mydepartament'] = $departament;
        $_SESSION['mycity'] = $city;
		$_SESSION['mykg'] = $kg;
        $_SESSION['myharvest'] = $myharvest;
    
        header("location:../index.php?r=6734");
    } else {
        header("location:../index.php?r=0927");
    }
} catch (PDOException $e) {
}

?>