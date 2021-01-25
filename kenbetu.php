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
        <!-- toppage --><h3>府県別リスト</h3></div>

    </div>
    <div id="hpb-nav">
      <ul>
        <li id="menu01"><a href="index.php"><span class="en">Home</span></a>
        <li id="menu02"><a href="bbs.php"><span class="en">BBS</span></a>
        <li id="menu03"><a href="https://blooming-reef-85835.herokuapp.com/posts/index"><span class="en">BLOG</span></a></ul>
    </div>
<h3>
<a href="kenbetu.php?ken=25">滋賀県</a>
 <a href="kenbetu.php?ken=30">和歌山県</a>
 <a href="kenbetu.php?ken=27">大阪府</a>
 <a href="kenbetu.php?ken=29">奈良県</a>
 <a href="kenbetu.php?ken=28">兵庫県</a>
 <a href="kenbetu.php?ken=26">京都府</a></h3>
    <p>
<?php
require_once("MYDB.php");
$ken=$_GET['ken'];
$pdo = db_connect();
 $sql= "SELECT * FROM bunkazailist where nken=$ken ORDER BY NKEN, ido, keido";
 $stmh = $pdo->query($sql);
?>


    
    <table width="905" border="1" cellspacing="0" cellpadding="8">
      <tbody>
<TR>
          <th width="225" style="text-align : center;" align="center" height="10">名称</th>
          <th width="74" style="text-align : center;" align="center" height="10">時代</th>
          <th width="396" height="10">所在府県</th>
          <?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
<TR>
<? $ID=$row['ID'] ?>
          <td width="225" height="28"><il><a href="shousai.php?ID=<?=htmlspecialchars($row['ID'])?>">
<?=htmlspecialchars($row['meisho'])?></il></a></td>
          <td width="74" height="28"><?=htmlspecialchars($row['jidai'])?></td>
          <td width="396" height="28"><?=htmlspecialchars($row['shozaiti'])?></td>
        </tr>


<?php
}    
?>
</tbody>
    </table>
    <p><a href="javascript:history.back()">[前のページに戻る]</a><br>
    　  
  
  </div>
  <!-- inner end --><!-- footer -->
  <div id="hpb-footer">
    <div id="hpb-footerMain">
      <p>関西歴史建造物&nbsp;</p>
    </div>
    <div id="footerExtra1">
      <div id="pagetop"><a href="#hpb-container">このページの先頭へ</a></div>
    </div>
  </div>
  <!-- footer end -->
</div>
<!-- container end --><script type="text/javascript" src="navigation.js">hpb-navigation-js</script> </body>
</html>