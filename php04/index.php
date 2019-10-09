<?php
session_start();
include("funcs.php");
sschk();

$kanri_flg = $_SESSION["kanri_flg"];

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
  <title>ブックマーク登録</title>
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
<form method="POST" action="bm_insert.php">
  <div class="jumbotron">
   <fieldset>
     <legend>ブックマーク</legend>
      <label>書籍名：<input type="text" name="name"></label><br>
      <label>書籍URL：<input type="text" name="url"></label><br>
      <label>書籍コメント：<textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
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
