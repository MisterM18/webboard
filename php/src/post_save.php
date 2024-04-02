<?php
session_start();
$comment = $_POST['comment'];
$post_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];
$host = 'db';
$user = 'root';
$pass = 'MYSQL_ROOT_PASSWORD';
$db = 'webboard';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO comment (content, post_date, user_id, post_id) VALUES ('$comment', NOW(), $user_id, $post_id)";
if ($conn->query($sql) === TRUE) {
    header("location: post.php?id=$post_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>