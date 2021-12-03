<?php
date_default_timezone_set('America/Bogota');

if (isset($_POST['reg_mode'])) {
    checkemail();
} else {
    header("location:../");
}

function checkemail()
{
    try {
        require '../constants/db_config.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = $_POST['email'];
        $nit = $_POST['nit'];
        $account_type = $_POST['acctype'];

        $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email Or nit = :nit");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nit', $nit);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $records = count($result);

        if ($account_type == "101") {
            $role = "user";
        } else {
            $role = "admin";
        }

        if ($records > 0) {
            header("location:../login.php?p=$role&r=0927");
        } else {
            if ($account_type == "101") {
                register_as_user();
            } else {
                register_as_admin();
            }
        }
    } catch (PDOException $e) {
        header("location:../login.php?p=$role&r=4568");
    }
}

function register_as_user()
{
    try {
        require '../constants/db_config.php';
        require '../constants/uniques.php';
        $role = 'user';
        $account_type = $_POST['acctype'];
        $last_login = date('d-m-Y h:m A [T P]');
        $member_no = 'USER' . get_rand_numbers(9) . '';
        $company = ucwords($_POST['company']);
        $nit = $_POST['nit'];
        $email = $_POST['email'];
        $login = md5($_POST['password']);

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO tbl_users (company, nit, email, last_login, login, role, member_no) 
	    VALUES (:company, :nit, :email, :lastlogin, :login, :role, :memberno)");
        $stmt->bindParam(':company', $company);
        $stmt->bindParam(':nit', $nit);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':lastlogin', $last_login);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':memberno', $member_no);
        $stmt->execute();
        header("location:../login.php?p=$role&r=1123");
    } catch (PDOException $e) {
        header("location:../login.php?p=$role&r=4568");
    }
}

function register_as_admin()
{
    try {
        require '../constants/db_config.php';
        require '../constants/uniques.php';
        $role = 'admin';
        $account_type = $_POST['acctype'];
        $last_login = date('d-m-Y h:m A [T P]');
        $comp_no = 'ADMIN' . get_rand_numbers(9) . '';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $login = md5($_POST['password']);

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO tbl_users (name, email, email_company, last_login, login, role, member_no) 
	    VALUES (:name,:email, :email_company, :lastlogin, :login, :role, :memberno)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':email_company', $email);
        $stmt->bindParam(':lastlogin', $last_login);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':memberno', $comp_no);
        $stmt->execute();
        header("location:../login.php?p=$role&r=1123");
    } catch (PDOException $e) {
        header("location:../login.php?p=$role&r=4568");
    }
    
}

?>
