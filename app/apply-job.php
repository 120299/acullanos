<?php
require '../constants/settings.php';
date_default_timezone_set($default_timezone);
$apply_date = date('m/d/Y');

session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];	
$myrole = $_SESSION['role'];
$opt = $_GET['opt'];

if ($myrole == "employee"){
include '../constants/db_config.php';

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_job_applications WHERE member_no = '$myid' AND job_id = :jobid");
	$stmt->bindParam(':jobid', $opt);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
	
	if ($rec == 0) {
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("INSERT INTO tbl_job_applications (member_no, job_id, application_date)
    VALUES (:memberno, :jobid, :appdate)");
    $stmt->bindParam(':memberno', $myid);
    $stmt->bindParam(':jobid', $opt);
    $stmt->bindParam(':appdate', $apply_date);
    $stmt->execute();
	
	print '<br>
	 <div class="alert alert-success">
     Ha aplicado con éxito este trabajo.
    </div>
     ';
					  
	}catch(PDOException $e)
    {

    }
	
		
	}else{
	foreach($result as $row)
    {
	 print '<br>
	 <div class="alert alert-warning">
     Ya ha solicitado este trabajo antes, no puede volver a postularse.
	 </div>

     ';
	}	
		
	}


					  
	}catch(PDOException $e)
    {

    }
	
}}

?>