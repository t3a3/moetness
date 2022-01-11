<?php
session_start();
include('functions.php');

$users_email = $_POST['users_email'];
$users_password = $_POST['users_password'];

$pdo = connect_to_db();

// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM users_table WHERE users_email=:users_email AND users_password=:users_password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':users_email', $users_email, PDO::PARAM_STR);
$stmt->bindValue(':users_password', $users_password, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$val = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$val) {
    echo "<p>ログイン情報に誤りがあります</p>";
    echo "<a href=users_login_form.php>ログイン</a>";
    exit();
} else {
    $_SESSION = array();
    $_SESSION['session_id'] = session_id();
    $_SESSION['is_admin'] = $val['is_admin'];
    $_SESSION['users_name'] = $val['users_name'];
    $_SESSION['users_email'] = $val['users_email'];
    header("Location:mypage.php");
    exit();
}
