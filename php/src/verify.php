<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION["id"] == session_id()) {
    header("location: index.php");
    die();
}
$u = $_POST['login'];
$p = $_POST['pwd'];
$host = 'db';
$user = 'root';
$pass = 'MYSQL_ROOT_PASSWORD';
$db = 'webboard';
$conn = new mysqli($host, $user, $pass, $db);
$sql = "SELECT * FROM user where login='$u' and password=sha1('$p')";
$result = $conn->query($sql);
if ($result->num_rows == 1) { // ใช้ num_rows แทน rowCount
    $data = $result->fetch_assoc(); // ใช้ fetch_assoc() แทน fetch(PDO::FETCH_ASSOC)
    $_SESSION["username"] = $data["login"];
    $_SESSION["role"] = $data["role"];
    $_SESSION["user_id"] = $data["id"];
    $_SESSION["id"] = session_id();
    header("Location:index.php");
    die(); 
} else {
    $_SESSION["error"] = 1;
    header("Location:login.php");
    die();
}
$conn->close(); // ใช้ close() แทน null
?>