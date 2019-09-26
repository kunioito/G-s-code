<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    //1.  DB接続します
    try {
      //Password:MAMP='root',XAMPP=''
      //host=本番レンタルサーバのアドレスに変更
      return new PDO('mysql:dbname=bookmark_db;charset=utf8;host=localhost','root','');

    } catch (PDOException $e) {
      exit('DB Connection Error:'.$e->getMessage());
      exit('エラー');
    }
    }
