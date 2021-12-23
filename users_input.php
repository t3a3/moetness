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
    <title>ユーザー登録</title>
</head>

<body class="opacity_body">
    <!------------ ▼ Header ------------>
    <?php include('header.php'); ?>
    <!------------ ▼ main------------>
    <div class="main">
        <!--ユーザー登録フォーム-->
        <form class="Form_box" action="users_create.php" method="POST">
            <h1 class="Form_Title">ユーザー登録</h1>
            <!--ユーザー名-->
            <div class="Form-Item">
                <p class="Form-Item-Label">
                    <span class="Form-Item-Label-Required">必須</span>ユーザー名
                </p>
                <input type="text" class="Form-Item-Input" placeholder="例）山田太郎" name="users_name" required>
            </div>
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
                <input type="password" class="Form-Item-Input" name="users_password" id="users_password" required>
            </div>
            <!--送信ボタン-->
            <div class="Form-Btn_box">
                <input type="submit" class="Form-Btn" value="送信する">
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