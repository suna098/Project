<?php
header("Content-type: text/html; charset=utf-8");
 
$dsn = 'mysql:host=127.0.0.1;dbname=test;charset=utf8';
$user = 'root';
$password = 'kuwagata18';
 
try{
	$dbh = new PDO($dsn, $user, $password);
	echo "接続成功";

	print "スキル検索:".$_POST['name'];
        $sql = "SELECT * FROM profile where skill1 = '".$_POST['name']."'";
        $sql .= "or skill2 = '" .$_POST['name']."'";
        $sql .= "or skill3 = '" .$_POST['name']."'";
	$statement = $dbh -> query($sql);
	
	//レコード件数取得
	$row_count = $statement->rowCount();
	
	while($row = $statement->fetch()){
		$rows[] = $row;
	}
	/*
	foreach ($statement as $row) {
		$rows[] = $row;
	}
	*/
	
	//データベース接続切断
	$dbh = null;
    
}catch (PDOException $e){
	print('Error:'.$e->getMessage());
	die();
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>nameテーブル表示</title>
<meta charset="utf-8">
</head>
<body>
<h1>社員データ表示</h1> 
 
 
 
<?php 
foreach($rows as $row){
?> 
<table border='1'>
	<tr><td>名前</td><td><?php echo $row['name']; ?> </td> </tr>
        <tr><td>性別</td><td><?php echo $row['sex']; ?></td> </tr>
        <tr><td>年齢</td><td><?php echo $row['age']; ?></td> </tr>
        <tr><td>最終学歴</td><td><?php echo $row['academic']; ?></td> </tr>
        <tr><td>スキル(言語等)</td><td><?php echo $row['skill1'].'<br>'; echo $row['skill2'].'<br>'; echo $row['skill3'].'<br>';?></td> </tr>
</table>
<button type="button" class="square_btn"  onclick="location.href='./home.php'">
ホームに戻る
</button>

<br>
<br>
<?php 
} 
?>
 
 
</body>
</html>
