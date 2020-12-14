<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>註冊頁面</title>
  <style>
    h1 {
      width: 500px;
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

    div{
      width: 150px;
      font-size: 18px;
      margin: 0 auto;
      text-align: left;
    }

    input {
      width: 150px;
      height: 20px;
      font-size: 16px;
      display: block;
      margin: 0 auto;
      padding: 5px 10px;
    }

    .submit {
      margin-top: 20px;
      width: 174px;
      height: 34px;
      border: 1px solid black;
      background-color: white;
      text-align: center;
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
  </style>
</head>
<body>
  <h1>想成為小森林的成員？請先註冊</h1>
  <?php
    if (!empty($_GET[ErroMsg])) {
      $code = $_GET[ErroMsg];
      $msg = 'Error';
      if ($code === '1') {
        $msg = '暱稱、帳號、密碼，缺一不可';
      }
      if ($code === '2') {
        $msg = '此帳號已被註冊';
      }
      echo '<h2 class="erroMsg">' . $msg . '</h2>';
    }
  ?>
  <form action="./handle_register.php" method="POST">
    <div class="nickname">暱稱：</div>
    <input type="text" name="nickname"><br>
    <div class="username"">帳號：</div>
    <input type="text" name="username"><br>
    <div class="password">密碼：</div>
    <input type="password" name="password"><br>
    <input class="submit" type="submit" value="送出">
    <a href="index.php">回首頁</a>
  </form>

</body>
</html>