<?php
/*
関数名：db
機能：データベースに接続する
引数：なし
戻り値：データベース接続のインスタンス
*/
function db(){

    $db = new PDO("mysql:dbname=mmr","mmr","pass");

    return $db;
}

/*
 関数名：h
 機能：文字列をエスケープして返す　XSS対策
 引数：出力する文字列
 戻り値：エスケープした文字列
 */
function h($s){

    return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
}

/*
 関数名：title
 機能：サイトタイトルを取得する
 引数：なし
 戻り値：サイトタイトル
 */
function title(){
    return 'レンタルショップ';
}

/*
 関数名：css
 機能：読み込むCSSファイルを取得する
 引数：なし
 戻り値：CSSファイル
 */
function css(){
    return 'styles.css';
}