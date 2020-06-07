<?php
require_once ('function.php');
require_once ('shouhinTable_class.php');
session_start();
session_regenerate_id(true);
setcookie(session_name(),session_id(),time()+60*60*24*3);

//セッション破棄用
//$_SESSION = array();
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
    echo '<p>その画面は表示できません。</p>';
}elseif(isset($_GET['error']) && $_GET['error'] == 2){
    echo '<p>カートの中身が空です。</p>';
}
$shouhins = [];
$shouhinTable = new ShouhinTable(db());
//商品検索
if(isset($_GET['sname'])){
    if(empty($_GET['sname'])) {
        echo '<p>検索内容が入力されていません。</p>';
    }else{
        $sname = $_GET['sname'];
        $shouhins = $shouhinTable->search($sname);
        if(!$shouhins){
            echo '<p>一致する商品名がありません。</p>';
        }
    }
}
//カート
if(isset($_GET['sid'],$_GET['rentalDays'])){
    $sid = $_GET['sid'];
    $rentalDays = $_GET['rentalDays'];
    if($rentalDays == 0){
        header("Location: http://mmr.e5.valueserver.jp/rentalshop/cartAdd.php?error=3&sid=" .$sid);
        exit();
    }
    $shouhin = $shouhinTable->getShouhin($sid);
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    $kakunou = array(
        'shouhin' => $shouhin,
        'rentalDays' => $rentalDays
    );
    array_push($_SESSION['cart'],$kakunou);
    $cart = $_SESSION['cart'];
}
?>
<div id="wrapper">
    <header>
        <h1>レンタルショップ</h1>
    </header>
    <div id="contents">
        <main>
            <?php
                if(isset($_GET['sid'],$_GET['rentalDays'])) {
                    ?>
                    <table>
                        <tr>
                            <th>商品区分</th>
                            <th>商品名</th>
                            <th>レンタル日数</th>
                        </tr>
                        <?php
                        foreach ($cart as $data) {
                            echo '<tr><td>' . h($data['shouhin']->getSkubunName()) . '</td><td>' . h($data['shouhin']->getSname()) . '</td><td>' . $data['rentalDays'] . '</td></tr>';
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
            <table>
                <tr><th>商品ID</th><th>商品区分名</th><th>発売年</th><th>商品名</th></tr>
            <?php
                foreach($shouhins as $shouhin){
                    ?>
                    <tr><td><?php echo $shouhin->getSid(); ?></td><td><?php echo $shouhin->getSkubunName(); ?></td><td><?php echo $shouhin->getReleaseYear(); ?></td><td><a href="cartAdd.php?sid=<?php echo $shouhin->getSid(); ?>"><?php echo h($shouhin->getSname()); ?></a></td></tr>
                    <?php
                }
                ?>
            </table>
            <form method="GET" action="kaikei.php">
                <p><input type="submit" value="会計する"></p>
            </form>
        </main>
    </div>
    <footer>
    </footer>
</div>
</body>
