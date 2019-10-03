<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>User登録画面</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="update_view.php">User一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
     <legend>User</legend>
      <label>名前：<input type="text" name="name"></label><br>
      <label>ID：<input type="text" name="lid"></label><br>
      <label>PASS：<input type="password" name="lpw"></label><br>
      <label>管理者権限：<select name="kanri_flg"><option value="0">管理者</option><option value="1">スーパー管理者</option></select></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
