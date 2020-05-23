<?php
require_once ('function.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
    <title><?php echo title(); ?></title>
    <style>
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo css(); ?>">
</head>
<body>
<?php
//エラー処理
if(isset($_GET['error']) && $_GET['error'] == 1){
    echo '<p>指定した画面を表示できませんでした。</p>';
}
?>
<div id="wrapper">
    <header>
        <h1>レンタルショップ</h1>
    </header>
    <div id="contents">
        <main>
            <p>Todoの内容検索</p>
            <form method="GET" action="index.php">
                <p>Todoの内容 <input type="text" name="tname"></p>
                <p><input type="submit" value="検索"></p>
            </form>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
