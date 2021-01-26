<?php
session_start();
require_once 'conn.php';
require_once 'utils.php';

$username = NULL;
$user = NULL;
if (!empty($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $user = getUserFromUsername($username);
}
$stmt = $conn->prepare('SELECT * FROM comments ORDER BY id DESC');
$result = $stmt->execute();
if (!$result) {
  die('ERROR:' . $conn->error);
}
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>小森林留言板</title>
</head>

<body>
  <div class="nav">
    <a href="index.php">
      <img class="logo" src="/logo.png" alt="">
    </a>
    <div class="menu">
      <?php if (!$username) { ?>
        <a href="register.php">
          <div class="register">註冊</div>
        </a>
        <a href="login.php">
          <div class="login">登入</div>
        </a>
      <?php } else { ?>
        <a href="logout.php">
          <div class="logout">登出</div>
        </a>
      <?php } ?>
    </div>
  </div>

  <div class="container">
    <form class="addMessage" action="./handle_add_message.php" method="POST">
      <?php
      if (!empty($_GET['ErroMsg'])) {
        $code = $_GET['ErroMsg'];
        $msg = 'Error';
        if ($code === '1') {
          $msg = '請輸入完整內容，包含暱稱與留言';
        }
        echo '<h2 class="erroMsg">' . $msg . '</h2>';
      }
      ?>
      <!-- <input name="nickname" class="addNickname" type="text" placeholder="請輸入暱稱"> -->
      <textarea name="content" placeholder="來留言吧！"></textarea>
      <?php if ($username) { ?>
        <input class="submit" type="submit" value="送出">
        <h3>歡迎光臨 <?php echo escape($user['nickname']); ?></h3>
      <?php } else { ?>
        <h3 class="submit">請登入發布留言</h3>
      <?php } ?>
    </form>

    <div class="messages">
      <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="message">
          <div class="avatar">
            <img class="avatarImg" src="/avata_bear.png" alt="">
          </div>
          <div class="content">
            <p class="nickname"><?php echo escape($row['nickname']); ?></p>
            <p class="messageContent"><?php echo escape($row['content']); ?></p>
            <div class="editAndDate">
              <p class="date"><?php echo escape($row['created_at']); ?></p>
              <div class="editMenu">
                <div class="edit">編輯</div>
                <div class="delete">刪除</div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="message">
        <div class="avatar">
          <img class="avatarImg" src="/avtar_fox.png" alt="">
        </div>
        <div class="content">
          <p class="nickname">黑面狐狸</p>
          <p class="messageContent">冬天來了我先睡囉！明年見了各位！冬天來了我先睡囉！明年見了各位！冬天來了我先睡囉！明年見了各位！冬天來了我先睡囉！明年見了各位！冬天來了我先睡囉！明年見了各位！</p>
          <div class="editAndDate">
            <p class="date">2020/11/23 16:06:28</p>
            <div class="editMenu">
              <div class="edit">編輯</div>
              <div class="delete">刪除</div>
            </div>
          </div>
        </div>
      </div>

      <div class="message">
        <div class="avatar">
          <img class="avatarImg" src="/avata_bear.png" alt="">
        </div>
        <div class="content">
          <p class="nickname">臺灣黑熊</p>
          <p class="messageContent">昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！</p>
          <div class="editAndDate">
            <p class="date">2020/11/23 16:06:28</p>
            <div class="editMenu">
              <div class="edit">編輯</div>
              <div class="delete">刪除</div>
            </div>
          </div>
        </div>
      </div>

      <div class="message">
        <div class="avatar">
          <img class="avatarImg" src="/avata_bear.png" alt="">
        </div>
        <div class="content">
          <p class="nickname">臺灣黑熊</p>
          <p class="messageContent">昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！昨天在斷崖做了一個超棒的草窩，歡迎來參觀！</p>
          <div class="editAndDate">
            <p class="date">2020/11/23 16:06:28</p>
            <div class="editMenu">
              <div class="edit">編輯</div>
              <div class="delete">刪除</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

</html>