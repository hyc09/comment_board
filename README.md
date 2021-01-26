參考 Lidemy MTR04 的課程實作，利用 HTML、CSS、PHP，使用 MySQL 為資料庫並搭配 Sequal Pro 圖形化工具完成的留言版。

## 第一階段

完成首頁、登入頁、註冊頁刻板；完成簡單會員系統，包含首頁所有留言陳列、註冊與登入功能、會員新增留言及登出。

- 首頁 `index.php` 

- 登入 `login.php`

- 註冊 `register.php`

### 資料庫

 #### Table Schema

comments 紀錄每一則留言的內容、留言者暱稱、時間

| Fild       | Type     | **Length** | Key  | Default           | Extra          |
| ---------- | -------- | ---------- | ---- | ----------------- | -------------- |
| id         | INT      |            | PRI  |                   | auto_increment |
| nickname   | VARCHAR  | 128        |      |                   |                |
| content    | TEXT     |            |      |                   |                |
| created_at | DATETIME |            |      | CURRENT_TIMESTAMP |                |



users 紀錄會員資訊，包含暱稱、帳號、密碼、註冊時間

| Fild       | Type     | Length | Key  | Default           | Extra          |
| ---------- | -------- | ------ | ---- | ----------------- | -------------- |
| id         | INT      |        | PRI  |                   | auto_increment |
| nickname   | VARCHAR  | 128    |      |                   |                |
| user_name  | VARCHAR  | 128    | UNI  |                   |                |
| password   | VARCHAR  | 128    |      |                   |                |
| created_at | DATETIME |        |      | CURRENT_TIMESTAMP |                |



- PRI：Primary Key 不得重複且經常由此檢索表格
- UNI：Unique Key 不得重複的欄位
- 從 1 開始自動增加，且不會填補已刪除的 id 號碼
- 編碼與校對：使用 UTF-8 Unicode 與 utf8mb4_unicode_ci



