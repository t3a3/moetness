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

<body>
    <!------------ ▼ Main ------------>
    <main>
        <h1><?= $_SESSION['users_name'] ?>さん、ログイン成功です!!</h1>
        <a href="index.php">ホームに戻る</a>
        <a href="users_logout.php">ログアウト</a>
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