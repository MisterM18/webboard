<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}
$cate = $_POST['category'];
$top = $_POST['topic'];
$comm = $_POST['comment'];
$user = $_SESSION['user_id'];
$host = 'db';
$users = 'root';
$pass = 'MYSQL_ROOT_PASSWORD';
$db = 'webboard';
$conn = new mysqli($host, $users, $pass, $db);
$sql = "INSERT INTO post (title, content, post_date, cat_id, user_id) 
        VALUES ('$top', '$comm', NOW(), '$cate', '$user')";
        
if ($conn->query($sql) === TRUE) {
    // บันทึกข้อมูลสำเร็จ
    header("location:register.php");
    die();
} else {
    // เกิดข้อผิดพลาดในการบันทึกข้อมูล
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>