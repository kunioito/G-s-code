<?php
session_start();
include("funcs.php");
sschk();
$pdo = db_conn();
$kanri_flg = $_SESSION["kanri_flg"];

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
  sql_error();
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="bm_detail.php?id='.$r["id"].'">';
    $view .= $r["id"]."|".$r["name"]."|".$r["url"]."|".$r["comment"];
    $view .= '</a>';
    $view .="　";
    $view .= '<a class="btn btn-danger" href="bm_delete.php?id='.$r["id"].'">';
    $view .= '[削除]';
    $view .= '</a><br>';
  }
}

$link_view="";
$link_view .= '<p><a class="navbar-brand" href="index.php">ブックマーク登録</a></p>';
//$link_view .= '<p><a class="navbar-brand" href="bm_update_view.php">ブックマーク一覧</a></p>';
if($kanri_flg==1){
  $link_view .= '<p><a class="navbar-brand" href="entry.php">ユーザー登録</a></p>';
  $link_view .= '<p><a class="navbar-brand" href="update_view.php">ユーザー表示</a></p>';
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク一覧画面</title>
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
        <?=$link_view?>
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
