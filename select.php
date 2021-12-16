<?php

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
$sql = 'SELECT * FROM form_table ORDER BY id ASC';
$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
      <td>{$record["form_name"]}</td>
      <td>{$record["form_email"]}</td>
      <td>{$record["form_text"]}</td>
    </tr>
  ";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <title>DB連携型お問い合わせリスト（一覧画面）</title>
</head>

<body>
    <fieldset>
        <legend>DB連携型お問い合わせ（一覧画面）</legend>
        <a href="form.php">入力画面</a>
        <table border="1">
            <thead>
                <tr>
                    <th>お客様名</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせ内容</th>
                </tr>
            </thead>
            <tbody>
                <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>