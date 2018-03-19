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
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>nameテーブル表示</h1> 
 
レコード件数：<?php echo $row_count; ?>
 
 
<?php 
foreach($rows as $row){
?>
<form method="POST" action="get_edit.php"> 
<table border='1'>
	<tr><td>名前</td><td><input type="text" name="name" value= <?php echo $row['name']; ?>  size="60"></input> </td> </tr>
        <tr><td>性別</td><td><input type="text" name="sex" value= <?php echo $row['sex']; ?>  size="60"></input></td> </tr>
 	<tr><td>年齢</td><td><input type="text" name="age" value= <?php echo $row['age']; ?>  size="60"></input></td> </tr>
        <tr><td>最終学歴</td><td><input type="text" name="academic" value= <?php echo $row['academic']; ?>  size="60"></input></td> </tr>
	<tr><td>スキル1</td><td><input type="text" name="skill1" value= <?php echo $row['skill1']; ?>  size="60"></input></td> </tr>
	<tr><td>スキル2</td><td><input type="text" name="skill2" value= <?php echo $row['skill2']; ?>  size="60"></input></td> </tr>
 	<tr><td>スキル3</td><td><input type="text" name="skill3" value= <?php echo $row['skill3']; ?>  size="60"></input></td> </tr>
 	<tr><td>派遣ステータス</td><td><input type="text" name="dispatch" value= <?php echo $row['dispatch']; ?>  size="60"></input></td> </tr>

</table>
<input type="submit" class="square_btn"  value="送信">
</form>

<br>
<br>
<?php 
} 
?>
 
 
</body>
</html>
