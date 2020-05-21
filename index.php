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
            <p><a href="quiz.php">クイズを始める</a></p>
            <p><a href="recordDisplay.php">記録を見る</a></p>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
