
<?php
require "constants/db_config.php";
try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_request WHERE member_no = '$myid' ORDER BY id");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $row) {
            $total_records++;
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>