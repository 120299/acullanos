<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$course = ucwords($_POST['course']);
$institution = ucwords($_POST['institution']);
$timeframe2 = ucwords($_POST['timeframe2']);
$level = $_POST['level'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO tbl_academic_qualification (member_no, institution, course, level, timeframe2) VALUES 
                (:member, :institution, :course, :level, :timeframe2)");
    $stmt->bindParam(':member', $myid);
    $stmt->bindParam(':institution', $institution);
    $stmt->bindParam(':course', $course);
    $stmt->bindParam(':level', $level);
    $stmt->bindParam(':timeframe2', $timeframe2);
    $stmt->execute();
    header("location:../academic.php?r=2303");
} catch (PDOException $e) {
}

?>
