<?php
session_start();
$users_email = $_POST['users_email'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

// SQL作成&実行
$sql = 'SELECT * FROM users_table WHERE users_email = :users_email';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':users_email', $users_email);
$stmt->execute();
$member = $stmt->fetch();

//ハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['users_password'], $member['users_password'])) {

    //DBのユーザー情報をセッションに保存
    $_SESSION = array();
    $_SESSION['user_id'] = $member['id'];
    $_SESSION['session_id'] = session_id();
    $_SESSION['users_name'] = $member['users_name'];
    $_SESSION['users_password'] = $member['users_password'];
    $_SESSION['users_email'] = $member['users_email'];

    $msg = 'ログインしました。';
    $link = '<a href="mypage.php">マイページ</a>';
} else {
    $msg = 'メールアドレスまたはパスワードが間違っています。';
    $link = '<a href="users_login_form.php">戻る</a>';
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報更新</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1><?php echo $msg; ?></h1>
    <?php echo $link; ?>
</body>

</html>