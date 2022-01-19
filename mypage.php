<?php
session_start();
include('functions.php');
check_session_id(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>マイページ</title>
</head>

<body class="opacity_body">
    <!------------ ▼ Main ------------>
    <main>
        <h1><?= $_SESSION['users_name'] ?>さん、ログイン成功です!!</h1>
        <a href="index.php">ホームに戻る</a>
        <a href="users_logout.php">ログアウト</a>
        <a href="answer_total.php">アンケートの管理</a>



        <form action="answer_create.php" method="post" class="Form_box">
            <h1 class="Form_Title">アンケート入力ページ</h1>
            <div class="Form-Item">
                <p class="Form-Item-Label">性別</p>
                <input type="radio" name="gender" id="male" value="1">
                <label for="male"> 男性 </label>
                <input type="radio" name="gender" id="female" value="2">
                <label for="female"> 女性 </label>
            </div>
            <div class="Form-Item">
                <label for="age" class="Form-Item-Label"> 年齢 </label>
                <select name="age" id="age">
                    <option value="0" selected>選択してください。</option>
                    <?php
                    for ($num = 1; $num <= 7; $num++) {
                        echo '<option value="' . $num . '">' . $num . '0代</option>' . "\n";
                    }
                    ?>
                    <option value="8">80代以上</option>
                </select>
            </div>
            <div>
                <p>どこで萌えっとネスのことを知りましたか？</p>
                <?php
                $hobby = array(
                    0 => "SNS",
                    1 => "雑誌をみて",
                    2 => "ネットニュース",
                    3 => "知人の紹介",
                    4 => "その他",
                );
                $ids = array('sns', 'magazine', 'news', 'friends', 'other');
                foreach ($hobby as $key => $value) {
                    echo '<label for="' . $ids[$key] . '"><input type="radio" name="answer" value="'
                        . $key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
                }
                ?>
            </div>
            <div class="targetLink">
                <input type="submit">
            </div>
        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //******ハンバーガーメニュー******//
        $(function() {
            $("#global_nav_btn").on("click", function() {
                $(this).toggleClass("open");
                $("#global_nav").toggleClass("open");
            });
        });
        // メニューをクリックされたら、非表示にする
        $(function() {
            $(".global_nav_item a").on("click", function() {
                $("#global_nav").removeClass("open");
            });
        });
    </script>
</body>

</html>