<?php
if (
    !isset($_POST['users_name']) || $_POST['users_name'] == '' ||
    !isset($_POST['users_email']) || $_POST['users_email'] == '' ||
    !isset($_POST['users_password']) || $_POST['users_password'] == ''
) {
    exit('項目を全て満たしてるか確認してください');
}

$users_name = $_POST['users_name'];
$users_password = password_hash($_POST['users_password'], PASSWORD_DEFAULT);
$users_email = $_POST['users_email'];

// DB接続
include('functions.php');
$pdo = connect_to_db();

//メールアドレス重複チェック
$sql = 'SELECT COUNT(*) FROM users_table WHERE users_email = :users_email';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':users_email', $users_email);
$stmt->execute([':users_email' => $users_email]);
// var_dump($member['users_email']);
// exit();
if ($stmt->fetchColumn()) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="users_input.php">戻る</a>';
} else {

    $sql = 'INSERT INTO users_table(id, users_name, users_email, users_password,created_at, updated_at) VALUES(NULL, :users_name,:users_email,:users_password,now(),  now())';

    $stmt = $pdo->prepare($sql);

    // バインド変数を設定
    $stmt->bindValue(':users_name', $users_name, PDO::PARAM_STR);
    $stmt->bindValue(':users_password', $users_password, PDO::PARAM_STR);
    $stmt->bindValue(':users_email', $users_email, PDO::PARAM_STR);

    // SQL実行（実行に失敗すると `sql error ...` が出力される）
    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

    $msg = '会員登録が完了しました';
    $link = '<a href="users_login_form.php">ログインページ</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<!--メッセージの出力-->
<?php echo $link; ?>