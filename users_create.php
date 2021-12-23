<?php
if (
    !isset($_POST['users_name']) || $_POST['users_name'] == '' ||
    !isset($_POST['users_email']) || $_POST['users_email'] == '' ||
    !isset($_POST['users_password']) || $_POST['users_password'] == ''
) {
    exit('項目を全て満たしてるか確認してください');
}

$users_name = $_POST['users_name'];
$users_email = $_POST['users_email'];
$users_password = password_hash($_POST['users_password'], PASSWORD_DEFAULT);

// DB接続
include('functions.php');
$pdo = connect_to_db();

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM users_table WHERE users_email = :users_email";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':users_email', $users_email);
$stmt->execute();
$member = $stmt->fetch();
if ($member['users_email'] === $users_email) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="users_input.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = 'INSERT INTO users_table(id, users_name, users_email, users_password, created_at, updated_at) VALUES(NULL, :users_name, :users_email, :users_password, now(),  now())';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':users_name', $users_name, PDO::PARAM_STR);
    $stmt->bindValue(':users_email', $users_email, PDO::PARAM_STR);
    $stmt->bindValue(':users_password', $users_password, PDO::PARAM_STR);
    $stmt->execute();
    $msg = '会員登録が完了しました';
    $link = '<a href="users_input.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<!--メッセージの出力-->
<?php echo $link; ?>