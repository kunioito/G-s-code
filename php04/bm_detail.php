<?php
session_start();
include("funcs.php");
sschk();

$id = $_GET["id"];//?id～**を受け取る
$pdo = db_conn();
$kanri_flg = $_SESSION["kanri_flg"];

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

$link_view="";
//$link_view .= '<p><a class="navbar-brand" href="index.php">ブックマーク登録</a></p>';
$link_view .= '<p><a class="navbar-brand" href="bm_update_view.php">ブックマーク一覧</a></p>';
if($kanri_flg==1){
  $link_view .= '<p><a class="navbar-brand" href="entry.php">ユーザー登録</a></p>';
  $link_view .= '<p><a class="navbar-brand" href="update_view.php">ユーザー表示</a></p>';
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

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
<form method="POST" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>書籍URL：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
     <label>書籍コメント：<textArea name="comment" rows="4" cols="40"><?=$row["comment"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
  </div>
</nav>

</body>
</html>
