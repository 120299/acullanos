<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$title = ucwords($_POST['title']);
$certificate = addslashes(file_get_contents($_FILES['certificate']['tmp_name']));

if ($_FILES["certificate"]["size"] > 1000000) {
header("location:../attachments.php?r=2290");
}else{
	
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO tbl_other_attachments (member_no, title, attachment) VALUES ('$myid', :title, '$certificate')");
$stmt->bindParam(':title', $title);
$stmt->execute();
header("location:../attachments.php?r=6789");				  
}catch(PDOException $e)
{

}

	
}


?>
