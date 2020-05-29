<?php
require_once ('function.php');
require_once ('shouhinTable_class.php');
if(!isset($_GET['sid'])){
    header("Location: http://mmr.e5.valueserver.jp/rentalshop/index.php?error=1");
    exit();
}
$sid = $_GET['sid'];
$shouhinTable = new ShouhinTable(db());
$sname = $shouhinTable->getSname($sid);
$skubunId = $shouhinTable->getSkubunId($sid);
$skubunName = $shouhinTable->getSkubunName($skubunId);
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
<div id="wrapper">
    <header>
        <h1>レンタルショップ</h1>
    </header>
    <div id="contents">
        <main>
            <form method="GET" action="index.php">
                <p>商品名:<?php echo h($sname); ?></p>
                <p>レンタル日数:<input type="number" name="rentalDays">日</p>
                <input type="hidden" name="sname" value="<?php echo h($sname); ?>">
                <input type="hidden" name="skubunId" value="<?php echo $skubunId; ?>">
                <input type="hidden" name="skubunName" value="<?php echo h($skubunName); ?>">
                <p><input type="submit" value="カートに入れる"></p>
            </form>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
