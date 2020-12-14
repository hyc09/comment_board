<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入頁面</title>
  <style>
    h1 {
      width: 300px;
      border: 3px double black;
      margin: 100px auto 50px auto;
      text-align: center;
      padding: 10px 20px;
    }

    h2 {
      width: 500px;
      margin: 10px auto 50px auto;
      text-align: center;
      padding: 10px 20px;
    }
    div {
      width: 150px;
      font-size: 18px;
      margin: 0 auto;
      text-align: left;
    }

    input {
      width: 150px;
      height: 20px;
      font-size: 18px;
      display: block;
      margin: 0 auto;
    }

    .submit {
      margin-top: 34px;
      width: 174px;
      height: 30px;
      border: 1px solid black;
      background-color: white;
    }

    a {
      display: block;
      color: black;
      text-decoration: none;
      margin: 20px auto;
      width: 174px;
      height: 34px;
      border: 1px solid black;
      text-align: center;
      line-height: 34px;
    }

    .submit:hover, a:hover{
      color: white;
      background-color: black;
      cursor: pointer;
      transition: all ease 0.3s;
    }

    a {
      text-decoration: none;
    }
  </style>
</head>
<body>
<h1>歡迎回來，請登入</h1>
<?php
  if (!empty($_GET[ErroMsg])) {
    $code = $_GET[ErroMsg];
    $msg = 'Error';
    if ($code === '1') {
      $msg = '帳號、密碼，缺一不可';
    }
    if ($code === '2') {
      $msg = '帳號或密碼有誤';
    }
    echo '<h2 class="erroMsg">' . $msg . '</h2>';
  }
?>
  <form action="./handle_login.php" method="POST">
    <div class="username">帳號：</div>
    <input type="text" name="username"><br>
    <div class="password">密碼：</div>
    <input type="password" name="password"><br>
    <input class="submit" type="submit" value="送出">
    <a href="register.php">去註冊</a>
    <a href="index.php">回首頁</a>
  </form>
  
</body>
</html>