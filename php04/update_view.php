<?php
session_start();
include("funcs.php");
sschk();

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error();
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="detail.php?id='.$r["id"].'">';
    $view .= $r["id"]."|".$r["name"]."|".$r["lid"]."|".$r["kanri_flg"]."|".$r["life_flg"];
    $view .= '</a>';
    $view .="　";
    $view .= '<a class="btn btn-danger" href="delete.php?id='.$r["id"].'">';
    $view .= '[削除]';
    $view .= '</a><br>';
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User一覧画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <p><a class="navbar-brand" href="index.php">ブックマーク登録</a></p>
        <p><a class="navbar-brand" href="bm_update_view.php">ブックマーク表示</a></p>
        <p><a class="navbar-brand" href="entry.php">ユーザー登録</a></p>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
  </div>
</nav>

</body>
</html>
