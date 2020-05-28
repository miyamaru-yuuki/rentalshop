<?php
session_start();
session_regenerate_id(true);
setcookie(session_name(),session_id(),time()+60*60*24*3);

require_once ('function.php');
require_once ('shouhinTable_class.php');
if(!isset($_SESSION['cart'])){
    header("Location: http://mmr.e5.valueserver.jp/rentalshop/index.php?error=1");
    exit();
}
$cart = $_SESSION['cart'];
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
            <?php
            $goukeikingaku = 0;
            $shouhinTable = new ShouhinTable(db());
            foreach ($cart as $data){
                $shouhin= new Shouhin(null,$data['sname'],$data['skubunId'],null);
                $kingaku = $shouhin->getKingaku($data['rentalDays']);
                $goukeikingaku = $goukeikingaku + $kingaku;
                ?>
            <p><?php echo h($shouhinTable->getSkubunName($shouhin)); ?>:<?php echo h($shouhin->getSname());?> <?php echo $data['rentalDays']; ?> <?php echo $kingaku; ?></p>
            <?php
            }
            ?>
            <p>合計:<?php echo $goukeikingaku; ?>円</p>
            <p><a href="index.php">TOP</a></p>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
