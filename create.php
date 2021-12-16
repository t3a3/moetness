<?php
//var_dump($_POST);
//exit();
// POSTデータ確認
if (
    !isset($_POST['form_name']) || $_POST['form_name'] === '' ||
    !isset($_POST['form_email']) || $_POST['form_email'] === '' ||
    !isset($_POST['form_text']) || $_POST['form_text'] === ''
) {
    exit('項目を全て満たしてるか確認してください');
}

$form_name = $_POST['form_name'];
$form_email = $_POST['form_email'];
$form_text = $_POST['form_text'];
// DB接続
$dbn = 'mysql:dbname=moetness_test;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
}

// SQL作成&実行
$sql = 'INSERT INTO form_table (id, form_name, form_email, form_text,created_at, updated_at) VALUES (NULL, :form_name, :form_email,:form_text, now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':form_name', $form_name, PDO::PARAM_STR);
$stmt->bindValue(':form_email', $form_email, PDO::PARAM_STR);
$stmt->bindValue(':form_text', $form_text, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:form.php");
exit();
