<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="GENERATOR" content="JustSystems Homepage Builder Version 20.0.1.0 for Windows">
<title>関西歴史建造物</title>
<link rel="stylesheet" href="shousai.css" type="text/css">
<link rel="stylesheet" href="hpbparts.css" type="text/css" id="hpbparts">
<link rel="stylesheet" href="container_11V_2c_top.css" type="text/css" id="hpbcontainer">
<link rel="stylesheet" href="main_11V_2c.css" type="text/css" id="hpbmain">
<link rel="stylesheet" href="user.css" type="text/css" id="hpbuser">
<link rel="stylesheet" type="text/css" href="table.css" id="HPB_TABLE_CSS_ID_">
<script type="text/javascript" src="jquery.min.js"><!-- hpbiptitle jQuery library --></script> <script type="text/javascript" src="move-mainnav.js">hpb-move-mainnav-js</script> </head>
<body id="hpb-template-11-22-01" class="hpb-layoutset-01 hpb-responsive" background="img_d002.gif">
<div id="hpb-skip"><a href="#hpb-title">本文へスキップ</a></div>
<!-- container -->
<div id="hpb-container" style="background-image : url(mainimg_11V1.png);">
  <!-- inner -->
  <div id="hpb-inner" style="text-align : left;" align="left">
    <!-- wrapper -->
    <div id="hpb-wrapper">
      <!-- page title -->
      <div id="hpb-title">
        <p><font size="+4" style="font-size : 310%;">関西歴史建造物 </font></p>
         <h2>国宝を中心とした関西の歴史的建造物を<br>
        実際に訪問してご紹介します。</h2>
      </div>
      <!-- page title end --><!-- main -->
      <div id="hpb-main">
        <!-- toppage --></div>
    </div>
    <div id="hpb-nav">
      <ul>
        <li id="menu01"><a href="index.php"><span class="en">Home</span></a>
        <li id="menu02"><a href="bbs.php"><span class="en">BBS</span></a>
        <li id="menu03"><a href="https://blooming-reef-85835.herokuapp.com/posts/index"><span class="en">BLOG</span></a></ul>
    </div>
<?php

require_once("MYDB.php");
$ID=$_GET['ID'];
$pdo = db_connect();
$sql= "SELECT * FROM bunkazailist where ID=$ID ORDER BY houmonbi DESC ";
    $stmh = $pdo->query($sql);
while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
$gazou=htmlspecialchars($row['gazou']);
//print "<article>"."<img src=gazou/$gazou width='300' height='200'>";
$houmonbi=htmlspecialchars($row['houmonbi']);
$meisho=htmlspecialchars($row['meisho']);
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
$hp="shousai.php?ID=".$ID;

include "objects.php";
$nengetu=$row['siteibi'];
$a = new Hizuke($nengetu);
$houmonbi=$row['houmonbi'];
$houmonbi =str_replace("-", "", $houmonbi);
$b = new Hizuke($houmonbi);
//(string)$a->setTime($nengetu);
//a=$row['siteibi'];
?>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_1_A_170219113937" class="hpb-cnt-tb1" width="893">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" valign="top" height="383" width="385">
          <div style="font-size: 20px;">
          <?=htmlspecialchars($meisho)?><br>
          住　所:<?=htmlspecialchars($row['shozaiti'])?><BR>
          建　立:<?=htmlspecialchars($row['jidai']) ?><BR>
          所有者: <?=htmlspecialchars($row['shoyusha']) ?><BR>
	        指定日:<?=htmlspecialchars($a->timese) ?>
          </div>
           <img src=gazou/<?=htmlspecialchars($row['gazou']) ?> border="0" width="388" height="257"> </td>
          <td class="hpb-cnt-tb-cell2" style="text-align : center;" align="center" valign="top" height="383" width="542"><iframe src="<?=htmlspecialchars($row['googlemap']) ?>" width="498" height="374" frameborder="0" style="border:0" allowfullscreen></iframe></td>
        </tr>
              </tbody>
    </table>
<?php
    if($row['houmonbi']<>'0000-00-00'){
?>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_2_A_170306055417" class="hpb-cnt-tb1">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="910">
          <div style="font-size: 20px;">訪問日：
          <?=htmlspecialchars($b->timese) ?></div>
          </td>
        </tr>
        <tr>
          <td class="hpb-cnt-tb-cell2" width="910">
            <div style="font-size: 20px;">
          <?=nl2br($row['comment']) ?></div>
          </td>
        </tr>
      </tbody>
    </table>
    <h3>
    <?php
    	}
 }
   ?>
    <a href="javascript:history.back()">[前のページに戻る]</a>　<a href="http://titonet384.sakura.ne.jp/kokuho/">関西歴史建造物トップへ</a><br>
    <br>
    <h2>コメント</h2>
    <form action="bbsis.php" method="post">
    <h3>名前: <br><input type="text" name="name" value=<?php echo $name; ?>></h3>
    <h3><input type="text" name="title" value="<?php echo $meisho; ?>" size="46"><br>
    <br>
    <TEXTAREA name="coment" rows="6" cols="70"></TEXTAREA><input type=hidden name="ID" value=<?php echo $ID; ?> /><br>
    ＨＰ: <br><input type="text" name="url" value="<?php echo $hp; ?>" size="44"><br>
    <br>
    <input type="submit" value="投稿">
    </h3>
    </form>
    <h3>
    <?php

$sql= "SELECT * FROM bbs where dairyserial=$ID ORDER BY datetime DESC ";
    $stmh = $pdo->query($sql);
?>
    <section>
    <?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
    </h3>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_5_A_170222000359" class="hpb-cnt-tb1">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="900">
          <h3><?=htmlspecialchars($row['name'])?>
          　登録日：
          <?=htmlspecialchars($row['datetime'])?>
          </h3>
          </td>
        </tr>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="900">
          <h3><?=nl2br(htmlspecialchars($row['contents'])) ?>
          </h3>
          </td>
        </tr>
      </tbody>
    </table>
    <p>
    <?php
}
echo "<p>";
//include "objects.php";
$ob= new Url();
$ob->url ='shousai.php?ID=';
$ob->id=$ID;
$ob->show();

?>
    </p>
    <form>
    <h3><br>
    </h3>
    </form>
    <h3><br>
    </h3>
  </div>
  <!-- inner end --><!-- footer -->
  <div id="hpb-footer">
    <div id="hpb-footerMain">
      <p>関西歴史建造物</p>
    </div>
    <div id="footerExtra1">
      <div id="pagetop"><a href="#hpb-container">このページの先頭へ</a></div>
    </div>
  </div>
  <!-- footer end -->
</div>
</body>
</html>