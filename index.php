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
<body id="hpb-template-11-22-01" class="hpb-layoutset-01 hpb-responsive">
<div id="hpb-skip"><a href="#hpb-title">本文へスキップ</a></div>
<!-- container -->
<div id="hpb-container">
  <!-- inner -->
  <div id="hpb-inner">
    <!-- wrapper -->
    <div id="hpb-wrapper">
      <!-- page title -->
      <div id="hpb-title">
        <h1><a href="http://titonet384.sakura.ne.jp/kokuho/">関西歴史建造物</a></h1>
        <h2>国宝を中心とした関西の歴史的建造物を<br>
        実際に訪問してご紹介します。</h2>
      </div>
      <!-- page title end --><!-- main -->
      <div id="hpb-main">
        <!-- toppage -->
        <div id="toppage">
          <div id="toppage-item">
            <h3 class="hpb-c-index">ギャラリー</h3>
            <div class="item"><img src="houryuuji1.jpg" border="0" style="border-top-width : 0px;border-left-width : 0px;border-right-width : 0px;border-bottom-width : 0px;" width="228" height="140">
              <h4><a href="kenbetu.php?ken=29">奈良県</a></h4>
              
              <p>法隆寺をはじめ国宝建造物７１件。<br>
              内飛鳥時代　６件、奈良時代　２０件<br>
              その数、歴史とも日本一の県です。</p>
            </div>
            <div class="item"><img src="daigojikondou1.jpg" border="0" style="border-top-width : 0px;border-left-width : 0px;border-right-width : 0px;border-bottom-width : 0px;" width="228" height="141">
              <h4><a href="kenbetu.php?ken=26">京都府</a></h4>
              　　　　　　　
              <p>世界的に有名な清水寺、京都東寺をはじめとして国宝建造物６２件。奈良に次ぎ、２番めです。応仁の乱の影響で平安時代の建造物はほとんど残ってませんが、観光客の数等、人気は日本一です。</p>

            </div>
            <div class="item"><img src="f20100117tenshu1.jpg" border="0" style="border-top-width : 0px;border-left-width : 0px;border-right-width : 0px;border-bottom-width : 0px;" width="234" height="150">
              <h4><a href="kenbetu.php?ken=25">滋賀県</a></h4>
              <p>彦根城、石山寺、園城寺をはじめ国宝建造物２３件。奈良、京都に次いで３番めです。城や寺など多岐にわたり、個性的な建造物が多いのが特徴です。</p>
            </div>
            <div class="item"><img src="IMG_160903-31.jpg" border="0" style="border-top-width : 0px;border-left-width : 0px;border-right-width : 0px;border-bottom-width : 0px;" width="235" height="171">
              <h4><a href="kenbetu.php?ken=28">兵庫県</a>　<a href="kenbetu.php?ken=27">大阪府</a>　<a href="kenbetu.php?ken=30">和歌山県</a></h4>
              <p>三府県で国宝建造物２９件。奈良や京都ほどの派手さはないが、個性的な建造物がたくさんあります。<br>
              <br>
              番外編<br>
              <b><a href="kenbetu.php?ken=33">岡山県</a>　<a href="kenbetu.php?ken=34">広島県</a></b>
            </div>
          </div>
          <div id="toppage-news">
 <?php

require_once("MYDB.php");
$pdo = db_connect();

$sql= "SELECT * FROM bunkazailist where houmonbi<>0000-00-00";
   $stmh = $pdo->query($sql);
     $count = $stmh->rowCount();
$page=15;
$L=$_GET['LT'];
if($L){
$LT=($L)*$page;
	}
else{
	$LT=0;
}



$LT2=ceil($count/$page);

 $sql= "SELECT * FROM bunkazailist where houmonbi<>0000-00-00 ORDER BY houmonbi DESC LIMIT ".$LT.",$page";;
 $stmh = $pdo->query($sql);
?>
<h3><span class="ja"></span><span class="en">information</span>
            <?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
    $meisho=$row['meisho'];
?></h3>
            <dl>
              <dt><?=htmlspecialchars($row['houmonbi'])?>　
              <dd><a href=shousai.php?ID=<?=htmlspecialchars($row['ID'])?>>
              <?=htmlspecialchars($meisho)?>
              </a></dl>

<?php
}
print "<br>過去 ";

$num=0;
while($num<$LT2){
$num2=$num+1;
if($L==$num){
print $num2."  ";
	}
else{
print "<a href=index.php?LT=".$num.">".$num2."  </a>";
	}
 $num++;
}

?>
                        
            <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_2_A_170311110853" class="hpb-cnt-tb1">
              <tbody>
                <tr>
                  <td class="hpb-cnt-tb-cell1" width="340">管理人とし<br>
                  ５０代　関西在住　趣味　歴史探訪、ネットサーフィン、映画鑑賞、写真、旅、ジョギングお問い合わせはこちらまで<a href="mail.html">メールフォーム </a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <hr>
        </div>
        <!-- toppage end -->
      </div>
      <!-- main end -->
    </div>
    <!-- wrapper end --><!-- navi -->
    <div id="hpb-nav">
      <h3 class="hpb-c-index">ナビゲーション</h3>
      <ul>
        <li id="menu01"><a href="index.php"><span class="en">Home</span></a>
        <li id="menu02"><a href="bbs.php"><span class="en">BBS</span></a>
        <li id="menu03"><a href="https://blooming-reef-85835.herokuapp.com/posts/index"><span class="en">BLOG</span></a>
      </ul>
    </div>
    <!-- navi end -->
  </div>
  <!-- inner end --><!-- footer -->
<!--タグはここから-->
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <blockquote>
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><a href="http://www.rays-counter.com/"><img src="http://www.rays-counter.com/d376_f6_010/58f19f538ad64/" alt="アクセスカウンター" border="0"></a></td>
    </tr><tr>
      <td align="center">
<img src="http://www.rays-counter.com/images/counter_01.gif" border="0"><img src="http://www.rays-counter.com/images/counter_02.gif" border="0"><img src="http://www.rays-counter.com/images/counter_03.gif" border="0"><img src="http://www.rays-counter.com/images/counter_04.gif" border="0" ><img src="http://www.rays-counter.com/images/counter_05.gif" border="0"></td>
    </tr>
  </table>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  </blockquote>
  <!--ここまで-->

  <div id="hpb-footer">
    <div id="hpb-footerMain">
      <p><a href="http://titonet384.sakura.ne.jp/kokuho/">関西歴史建造物</a>&nbsp;</p>
    </div>
    <div id="footerExtra1">
      <div id="pagetop"><a href="#hpb-container">このページの先頭へ</a></div>
    </div>
  </div>
  <!-- footer end -->
</div>
<!-- container end --><script type="text/javascript" src="navigation.js">hpb-navigation-js</script> </body>
</html>