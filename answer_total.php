<?php
session_start();
include("functions.php");
check_session_id();
$user_id = $_SESSION['user_id'];

$pdo = connect_to_db();

$sql = "SELECT users_name,gender,age,answer,survey_table.created_at FROM users_table LEFT OUTER JOIN survey_table ON users_table.id = survey_table.user_id;";

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
      <td>{$record["users_name"]}</td>
      <td>{$record["gender"]}</td>
      <td>{$record["age"]}</td>
      <td>{$record["answer"]}</td>
      <td>{$record["created_at"]}</td>
    </tr>
  ";
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>回答一覧</title>
</head>

<body>
    <h1>アンケート回答一覧</h1>
    <a href="mypage.php">マイページ</a>
    <fieldset>
        <table border="1">
            <thead>
                <tr>
                    <th>ユーザー名</th>
                    <th>性別</th>
                    <th>年齢</th>
                    <th>回答内容</th>
                    <th>回答日時</th>
                </tr>
            </thead>
            <tbody>
                <?= $output ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>