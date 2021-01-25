<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>関西歴史建造物</title>
<link rel="stylesheet" href="style.css">
</head>
<body id="posts">

<header>
<h1><a href="index.php">関西歴史建造物</a></h1>
<? php

?>
<nav>
<ul>
<li><a href="index.php">トップ</a></li>
<li><a href="bbs.php?LT=0">掲示板</a></li>
</ul>
</nav>
</header>
<?php
if (isset($_COOKIE['name'])){
 $name = $_COOKIE['name'];
}else{
 $name = '';
}
if (isset($_COOKIE['hp'])){
 $hp = $_COOKIE['hp'];
}else{
 $hp = '';
}



?>


<section>
	<hr>
    <h2>投稿一覧
<?php
require_once("MYDB.php");
$pdo = db_connect();
$sql= "SELECT * FROM bbs";
   $stmh = $pdo->query($sql);
     $count = $stmh->rowCount();
    PRINT "投稿数".$count;

$LT=$_GET['LT']*10;
$LT2=ceil($count/10);
//print $LT2;
$sql= "SELECT * FROM bbs  ORDER BY datetime DESC LIMIT ".$LT.",10";
    $stmh = $pdo->query($sql);
     
?>
件</h2>
<section>

<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
<h2>
 名前:<?=htmlspecialchars($row['name'])?>
　<?=htmlspecialchars($row['title'])?>
  　登録日：<?=htmlspecialchars($row['datetime'])?>
<p>
<article>

<p><?=nl2br(htmlspecialchars($row['contents'])) ?>

<?php
print "</article>";
$link=$row['url'];


if (isset($link)){ 
print " "."<a href=".$link.">HOME</a>";


 }
$count=$count-1;
} 

?>
</H2>
<footer>
<H1>


<?php
//print "番号".$_GET['LT'];
$LT=$_GET['LT'];
$num=0;
while($num<$LT2){
//for ($num = 1; $num <= $LT2; $num++){
//if($num==1){
//print "<a href=bbs.php?LT=0> ";
//print "1"." ";
//	}
//else{

$num2=$num+1;
if($LT==$num){
print $num2."  ";
	}
else{
print "<a href=bbs.php?LT=".$num.">".$num2."  </a>";
}
//	}
 $num++;
}
?>
</p>
</h1>
</footer>

</body>
</html>
</body>
</html>




</body>
</html>
