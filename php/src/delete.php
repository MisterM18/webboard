<?php
session_start();
if ($_SESSION['role'] != 'a') {
    header("location:index.php");
    die();
} else {
    $id = $_GET['id'];
    $host = 'db';
    $user = 'root';
    $pass = 'MYSQL_ROOT_PASSWORD';
    $db = 'webboard';
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // เตรียมคำสั่ง SQL สำหรับลบข้อมูล
    $sql = "DELETE FROM post WHERE id = $id";
    
    // ทำการ query คำสั่ง SQL
    if ($conn->query($sql) === TRUE) {
        $_SESSION['delete_success'] = true;
        header("location:index.php");
    } else {
        echo "เกิดข้อผิดพลาดในการลบข้อมูล: " . $conn->error;
    }
    
    $conn->close();
}
?>