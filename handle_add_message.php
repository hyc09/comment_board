<?php
require_once 'conn.php';

if (empty($_POST['content'])) {
  header('Location: index.php?ErroMsg=1');
  die('資料不全');
}

$username = $_COOKIE['username'];
$user_sql = sprintf(
  "select nickname from users where user_name='%s'", $username
);

$user_result = $conn->query($user_sql);
$row = $user_result->fetch_assoc();

$nickname = $row['nickname'];
$content = $_POST['content'];

$sql = sprintf(
  "INSERT INTO comments(nickname, content) VALUES('%s', '%s')",
  $nickname,
  $content
);

$result = $conn->query($sql); 
if (!$result) {
  die($conn->error);
}

header("Location: index.php");