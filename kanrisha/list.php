<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
$password=$_COOKIE['SetId'];
if ($password){

}else{
header('location: login.html');
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<HR size="1" noshade>
会員名簿一覧
<HR size="1" noshade>
[ <a href="form.html">新規登録</a>]
<BR>

<FORM name="form1" method="post" action="list.php">
名前：<INPUT type="text" name="search_key"><INPUT type="submit" value="検索する">
</FORM>

<?php
require_once("MYDB.php");
$pdo = db_connect();
// 削除処理
if(isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] > 0 ){
    try {
      $pdo->beginTransaction();
      $id = $_GET['id'];
      $sql = "DELETE FROM kokuho WHERE id = :id";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':id', $id, PDO::PARAM_INT );
      $stmh->execute();
      $pdo->commit();
      print "データを" . $stmh->rowCount() . "件、削除しました。<br>";

    } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "エラー：" . $Exception->getMessage();
    }
}

// 挿入処理
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    try {
      $pdo->beginTransaction();
      $sql = "INSERT  INTO blog (name,title,coment,ken,rank,jidai,gazou) VALUES ( :name, :title, :coment,:ken,:rank,:jidai,:gazou)";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':name',  $_POST['name'],  PDO::PARAM_STR );
      $stmh->bindValue(':title', $_POST['title'], PDO::PARAM_STR );
      $stmh->bindValue(':coment',        $_POST['coment'],        PDO::PARAM_STR );
      $stmh->bindValue(':ken', $_POST['ken'], PDO::PARAM_STR );
      $stmh->bindValue(':jidai', $_POST['jidai'], PDO::PARAM_STR );	
      $stmh->bindValue(':rank', $_POST['rank'], PDO::PARAM_INT );
      $stmh->bindValue(':gazou', $_POST['gazou'], PDO::PARAM_STR );
      $stmh->execute();
      $pdo->commit();
      print "データを" . $stmh->rowCount() . "件、挿入しました。<br>";

    } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "エラー：" . $Exception->getMessage();
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // セッション変数よりidを受け取ります
    $ID = $_SESSION['ID'];
    
    try {
   //アップロード
    if($_POST['gazou']==""){	
	$file_name=$_FILES['filename']['name'];
	$file_type=$_FILES['filename']['type'];
	$temp_name=$_FILES['filename']['tmp_name'];
	$file_size=$_FILES['filename']['size']/1000000;
		$dir='../gazou/';
	$upload_name=$dir.$file_name;

		if(($file_type=='image/jpeg') and ($file_size < 1)){
			$result=move_uploaded_file($temp_name,$upload_name);
			$stamp=time();
			rename($upload_name,$dir.$stamp.'.jpg');
			$gazou=$stamp.'.jpg';
			//echo '<img src='.$dir.$stamp.'.jpg>';
			//echo '<img src='.$dir.$stamp.'.jpg'.' '.'width='.'"40%"'.' height='.'"40%">';
			}else{
			echo 'ファイル形式が違うかサイズが大き過ぎます';
		}

      }
      	else{
		$gazou=$_POST['gazou'];
	}
      $pdo->beginTransaction();
      $sql = "UPDATE  bunkazailist
                SET 
                  comment  = :comment,
                  meisho = :meisho,
                  gazou= :gazou,
                  houmonbi=:houmonbi
                WHERE ID = :ID";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':comment',  $_POST['comment'],  PDO::PARAM_STR );
      $stmh->bindValue(':meisho', $_POST['meisho'], PDO::PARAM_STR );
      $stmh->bindValue(':gazou',$gazou,        PDO::PARAM_INT );
      $stmh->bindValue(':houmonbi', $_POST['houmonbi'], PDO::PARAM_STR );
      $stmh->bindValue(':ID',         $ID,                  PDO::PARAM_INT );
      $stmh->execute();
      $pdo->commit();
      print "データを" . $stmh->rowCount() . "件、更新しました。<br>";
      print "idは、".$ID."です";
   } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "エラー：" . $Exception->getMessage();
    }	



    // 使用したセッション変数を削除する
    unset($_SESSION['id']);
}
// 更新処理


// 検索および現在の全データを表示します
try {	
  if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
    $search_key = '%' . $_POST['search_key'] . '%'; 
    $sql= "SELECT * FROM bunkazailist WHERE :meisho  like meisho OR todofuken  like :todofuken ORDER BY ID DESC ";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':meisho',  $search_key, PDO::PARAM_STR );
    $stmh->bindValue(':todofuken', $search_key, PDO::PARAM_STR );
    $stmh->execute();
  }else{
    $sql= "SELECT * FROM bunkazailist ORDER BY id DESC ";
    $stmh = $pdo->query($sql);
  }
  $count = $stmh->rowCount();
  print "検索結果は" . $count . "件です。<BR>";

} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}


if($count < 1){
	print "検索結果がありません。<BR>";
}else{
?>
<TABLE width="1400" border="1"  cellspacing="0" cellpadding="8">
<TBODY>
<TR><TH>番号</TH><TH>名前</TH><TH>時代</TH><TH>コメント</TH><TH>所在府県</TH><TH>訪問日</TH><TH>画像</TH><TH>&nbsp;</TH><TH>&nbsp;</TH></TR>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
<TR>
<TD align="center"><?=htmlspecialchars($row['ID'])?></TD>
<Td><?=htmlspecialchars($row['meisho'])?></Td>
<Td><?=htmlspecialchars($row['jidai'])?></Td>
<Td><?=nl2br(htmlspecialchars($row['comment']))?></Td>
<Td><?=htmlspecialchars($row['todofuken'])?></Td>
<Td><?=htmlspecialchars($row['houmonbi'])?></Td>
<Td><?=htmlspecialchars($row['gazou'])?></Td>

<TD align="center"><a href=updateform.php?ID=<?=htmlspecialchars($row['ID'])?>>更新</a></TD>
<TD align="center"><a href=list.php?action=delete&ID=<?=htmlspecialchars($row['ID'])?>>削除</a></TD>
</TR>
<?php
}    
?>
</TBODY></TABLE>

<?php
}
?>

</BODY>
</HTML>