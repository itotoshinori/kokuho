<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php
session_start();
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<HR size="1" noshade>
更新画面
<HR size="1" noshade>
[ <a href="list.php">戻る</a>]
<BR> 

<?php
require_once("MYDB.php");
$pdo = db_connect();
if(isset($_GET['ID']) && $_GET['ID'] > 0){
    $ID	= $_GET['ID'];
    $_SESSION['ID'] = $ID;
    $today = date("Y/m/d");//今日の日を取得
    PRINT $today;
}else{
    exit('パラメータが不正です。');
}


try {
  $sql= "SELECT * FROM bunkazailist WHERE ID = :ID ";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':ID',  $ID, PDO::PARAM_INT );
  $stmh->execute();
  $count = $stmh->rowCount();
  
  
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

if($count < 1){
  print "更新データがありません。<BR>";
}else{
  $row = $stmh->fetch(PDO::FETCH_ASSOC);  
?>


<FORM name="form1" method="post" action="list.php">
番号：<?=htmlspecialchars($row['ID'])?><BR>
文化財名称：<INPUT type="text" name="meisho" value="<?=htmlspecialchars($row['meisho'])?>"><BR>
コメント<textarea name="comment" cols="40" rows="4"><?php echo htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8'); ?></textarea><br>
画像：<INPUT type="text" name="gazou" value="<?=htmlspecialchars($row['gazou'])?>"><BR>

<?php
echo "今日の日付：".date("Y/m/d");
echo "<p><select name=\"houmonbi\">";

for ($i = -5; $i < 1; $i++) {
    echo "<option>".date("Y/m/d", strtotime("$i day"));
}
echo "</select>";


?>


<INPUT type="hidden" name="action" value="update">
<INPUT type="submit" value="更　新">
</FORM>
<?php
}
?>
</BODY>
</HTML>
