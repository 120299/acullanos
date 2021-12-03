<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$id = $_POST['courseid'];
$course = ucwords($_POST['course']);
$institution = ucwords($_POST['institution']);
$timeframe2 = ucwords($_POST['timeframe2']);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE tbl_professional_qualification SET institution = :institution, course = :course, timeframe2 = :timeframe2 WHERE id= :aid AND member_no = '$myid'");
    $stmt->bindParam(':institution', $institution);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':timeframe2', $timeframe2);
    $stmt->bindParam(':aid', $id);
    $stmt->execute();
    header("location:../qualifications.php?r=6734");
} catch (PDOException $e) {
}
?>
