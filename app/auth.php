<?php
date_default_timezone_set('America/Bogota');
$last_login = date('d-m-Y h:m A [T P]');
require '../constants/db_config.php';
$myemail = $_POST['email'];
$mypass = md5($_POST['password']);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :myemail AND login = :mypassword");
    $stmt->bindParam(':myemail', $myemail);
    $stmt->bindParam(':mypassword', $mypass);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);

    if ($rec == "0") {
        header("location:../login.php?p=user&r=0346");
    } else {
        foreach ($result as $row) {
            $role = $row['role'];
            if ($role == "user") {
                session_start();
                $_SESSION['logged'] = true;
                $_SESSION['myid'] = $row['member_no'];
                $_SESSION['mycompany'] = $row['company'];
                $_SESSION['mynit'] = $row['nit'];
                $_SESSION['myname'] = $row['name'];
                $_SESSION['myphone'] = $row['phone'];
                $_SESSION['myemail'] = $row['email'];
                $_SESSION['myestablishment'] = $row['establishment'];
                $_SESSION['mystreet'] = $row['street'];
                $_SESSION['mydepartament'] = $row['departament'];
                $_SESSION['mycity'] = $row['city'];
                $_SESSION['mykg'] = $row['kg'];
                $_SESSION['myharvest'] = $row['harvest'];
                $_SESSION['lastlogin'] = $row['last_login'];
                $_SESSION['avatar'] = $row['avatar'];
                $_SESSION['role'] = $role;
            } else {
                session_start();
                $_SESSION['logged'] = true;
                $_SESSION['myid'] = $row['member_no'];
                $_SESSION['myname'] = $row['name'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['avatar'] = $row['avatar'];
                $_SESSION['lastlogin'] = $row['last_login'];
                $_SESSION['role'] = $role;
            }

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("UPDATE tbl_users SET last_login = :lastlogin WHERE email = :email");
                $stmt->bindParam(':lastlogin', $last_login);
                $stmt->bindParam(':email', $myemail);
                $stmt->execute();
                header("location:../$role");
            } catch (PDOException $e) {
            }
        }
    }
} catch (PDOException $e) {
}

?>
