<?php
session_start();
session_regenerate_id(true);
setcookie(session_name(),session_id(),time()+60*60*24*3);

//セッション破棄用
$_SESSION = array();

require_once ('function.php');
require_once ('shouhinTable_class.php');
$shouhins = [];
//商品検索
if(isset($_GET['sname']) && !empty($_GET['sname'])){
    $sname = $_GET['sname'];
    $shouhinTable = new ShouhinTable(db());
    $shouhins = $shouhinTable->search($sname);
}
//カート
if(isset($_GET['sname'],$_GET['rentalDays'],$_GET['skubunId'])){
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    $sname = $_GET['sname'];
    $rentalDays = $_GET['rentalDays'];
    $skubunId =$_GET['skubunId'];
    $kakunou = array(
        'sname' => $sname,
        'rentalDays' => $rentalDays,
        'skubunId' => $skubunId,
    );
    array_push($_SESSION['cart'],$kakunou);
    $cart = $_SESSION['cart'];
}
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
            <?php
                if(isset($_GET['sname'],$_GET['rentalDays'])) {
                    ?>
                    <table>
                        <tr>
                            <th>商品名</th>
                            <th>レンタル日数</th>
                        </tr>
                        <?php
                        foreach ($cart as $data) {
                            echo '<tr><td>' . h($data['sname']) . '</td><td>' . $data['rentalDays'] . '</td></tr>';
                        }
                        ?>
                    </table>
                    <?php
                }
            ?>
            <p>商品検索</p>
            <form method="GET" action="index.php">
                <p>商品名 <input type="text" name="sname"></p>
                <p><input type="submit" value="検索"></p>
            </form>
            <?php
                foreach($shouhins as $shouhin){
                    ?>
                    <p><a href="cartAdd.php?sname=<?php echo h($shouhin->getSname()); ?>&skubunId=<?php echo $shouhin->getSkubunId(); ?>"><?php echo h($shouhin->getSname()); ?></a></p>
                    <?php
                }
                ?>
            <form method="GET" action="kaikei.php">
                <p><input type="submit" value="会計する"></p>
            </form>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
