<?php
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ログイン</title>
</head>

<body class="opacity_body">
    <!------------ ▼ Header ------------>
    <?php include('header.php'); ?>
    <!------------ ▼ main------------>
    <div class="main">
        <!--ログインフォーム-->
        <form class="Form_box" action="users_login.php" method="POST">
            <h1 class="Form_Title">ログイン</h1>
            <!--メールアドレス-->
            <div class="Form-Item">
                <p class="Form-Item-Label">
                    <span class="Form-Item-Label-Required">必須</span>メールアドレス
                </p>
                <input type="email" class="Form-Item-Input" placeholder="例）example@gmail.com" name="users_email" required>
            </div>
            <!--パスワード-->
            <div class="Form-Item">
                <p class="Form-Item-Label">
                    <span class="Form-Item-Label-Required">必須</span>パスワード
                </p>
                <input type="text" class="Form-Item-Input" name="users_password" id="login_password">
            </div>
            <!--送信ボタン-->
            <div class="Form-Btn_box">
                <input type="submit" class="Form-Btn" value="送信する">
            </div>
            <div class="targetLink">
                <a href="users_input.php">新規ユーザー登録</a>
            </div>
        </form>
    </div>


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