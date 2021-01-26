<?php
session_start();
require_once 'conn.php';
require_once 'utils.php';

if (empty($_POST['username']) || empty($_POST['password'])) {
  header('Location: login.php?ErroMsg=1');
  die('資料不全');
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from users where user_name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$result = $stmt->execute();

if (!$result) {
  die($conn->error);
}

$result = $stmt->get_result();
if ($result->num_rows == 0) {
  header('Location: login.php?ErroMsg=2');
  exit();
}

// 如果有查到該使用者
$row = $result->fetch_assoc();

if (password_verify($password, $row['password'])) {
  // 登入成功時：
  $_SESSION['username'] = $username;
  // $expire = 3600 * 24 * 30;
  // setcookie("username", $username, time() + $expire);
  header('Location: index.php');
} else {
  header('Location: login.php?ErroMsg=2');
}

// header("Location: index.php");