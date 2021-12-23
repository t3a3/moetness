<?php
session_start();
$users_email = $_POST['users_email'];
$users_password = password_hash($_POST['users_password'], PASSWORD_DEFAULT);

// DB接続
include('functions.php');
$pdo = connect_to_db();

$sql = "SELECT * FROM users_table WHERE users_email = :users_email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':users_email', $users_email);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['users_password'], $member['users_password'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['users_name'] = $member['users_name'];
    $msg = 'ログインしました。';
    $link = '<a href="mypage.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="users_login.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>