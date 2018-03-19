<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<h1>社員情報新規入力</h1>
<form method="POST" action="get.php">
名前:
<input type="text" name="name" size="15" /><br>
年齢:
<input type="text" name="age" size="15" /><br>

性別: 
<input type="radio" name="sex" value="male">男
<input type="radio" name="sex" value="female"> 女<br>
最終学歴:
<input type="text" name="academic" size="15" /><br>

スキル1
<input type="text" name="skill1" size="15" /><br>
スキル2
<input type="text" name="skill2" size="15" /><br>
スキル3
<input type="text" name="skill3" size="15" /><br>

派遣ステータス
<input type="radio" name="dispatch" value="未定">未定
<input type="radio" name="dispatch" value="派遣中"> 派遣中 
<input type="radio" name="dispatch" value="派遣予定">派遣予定
<br>

<input type="submit" value="送信" class="square_btn" >
<button type="button" class="square_btn"  onclick="location.href='./home.php'">
homeに戻る
</button>

</form>
</body>
</html>

