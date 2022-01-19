<?php
session_start();
//入力値に不正なデータがないかなどをチェックする関数
function checkInput($var)
{
    if (is_array($var)) {
        //$var が配列の場合、checkInput()関数をそれぞれの要素について呼び出す
        return array_map('checkInput', $var);
    } else {

        //NULLバイト攻撃対策
        if (preg_match('/\0/', $var)) {
            die('不正な入力（NULLバイト）です。');
        }
        //文字エンコードのチェック
        if (!mb_check_encoding($var, 'UTF-8')) {
            die('不正な文字エンコードです。');
        }
        //数値かどうかのチェック 
        if (!ctype_digit($var)) {
            die('不正な入力です。');
        }
        return (int)$var;
    }
}

//POSTされた全てのデータをチェック
$_POST = checkInput($_POST);

$error = 0;  //変数の初期化
//性別の入力の検証
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    if ($gender == 1) {
        $gendername = '男性';
    } elseif ($gender == 2) {
        $gendername = '女性';
    } else {
        $error = 1;  //入力エラー（値が 1 または 2 以外）
    }
} else {
    $error = 1;  //入力エラー（値が未定義）
}
//回答の入力の検証
if (isset($_POST['answer'])) {
    $answer = $_POST['answer'];
    switch ($answer) {
        case 0:
            $answer = 'SNS';
            break;
        case 1:
            $answer = '雑誌をみて';
            break;
        case 2:
            $answer = 'ネットニュース';
            break;
        case 3:
            $answer = '知人の紹介';
            break;
        case 4:
            $answer = 'その他';
            break;
    }
}
//年齢の値で分岐
$aboutage = $_POST['age'];
if ($aboutage != 8) {
    $age =  $aboutage . '0代';
} else {
    $age = $aboutage . '0代以上';
}

$gender = $gendername;
$user_id = $_SESSION['user_id'];

include('functions.php');
$pdo = connect_to_db();


$sql = 'INSERT INTO survey_table(id, user_id, gender, age,answer,created_at) VALUES(NULL, :user_id,:gender,:age,:answer,now())';

$stmt = $pdo->prepare($sql);
// バインド変数を設定
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_STR);
$stmt->bindValue(':answer', $answer, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$msg = 'アンケートのご協力ありがとうございました';
$link = '<a href="mypage.php">マイページ</a>';
?>

<h1><?php echo $msg; ?></h1>
<!--メッセージの出力-->
<?php echo $link; ?>