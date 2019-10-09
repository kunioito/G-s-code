<?php
session_start();
include("funcs.php");

$id = $_GET["id"];//?id～**を受け取る
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
  sql_error();
}else{
  $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ詳細</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="bm_update_view_nl.php">ブックマーク一覧へ戻る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

 <label>書籍名：<?=$row["name"]?></label><br>
 <label>書籍URL：<?=$row["url"]?>></label><br>
 <label>書籍コメント：<?=$row["comment"]?></label><br>

<!-- Main[End] -->


</body>
</html>
