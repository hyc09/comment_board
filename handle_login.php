<?php
require_once 'conn.php';

if (empty($_POST['username']) || empty($_POST['password'])) {
  header('Location: login.php?ErroMsg=1');
  die('資料不全');
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = sprintf(
  "select * from users where user_name='%s' and password='%s'",
  $username,
  $password
);

$result = $conn->query($sql); 

if (!$result) { 
  die($conn->error);
}

if ($result->num_rows) {
  $expire = 3600 * 24 * 30;
  setcookie("username", $username, time() + $expire);
  header('Location: index.php');
} else {
  header('Location: login.php?ErroMsg=2');
}

// header("Location: index.php");