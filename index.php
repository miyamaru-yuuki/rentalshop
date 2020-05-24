<?php
require_once ('function.php');
require_once ('shouhinTable_class.php');
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
$shouhins = [];
//商品検索
if(isset($_GET['sname']) && !empty($_GET['sname'])){
    $sname = $_GET['sname'];
    $shouhinTable = new ShouhinTable(db());
    $shouhins = $shouhinTable->search($sname);
}
?>
<div id="wrapper">
    <header>
        <h1>レンタルショップ</h1>
    </header>
    <div id="contents">
        <main>
            <p>商品検索</p>
            <form method="GET" action="index.php">
                <p>商品名 <input type="text" name="sname"></p>
                <p><input type="submit" value="検索"></p>
            </form>
            <?php
                foreach($shouhins as $shouhin){
                    ?>
                    <p><a href="cartAdd.php"><?php echo $shouhin->getSname(); ?></a></p>
                    <?php
                }
                ?>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
