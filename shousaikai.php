<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Utf-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="GENERATOR" content="JustSystems Homepage Builder Version 20.0.1.0 for Windows">
<title>Builder Home Page</title>
<link rel="stylesheet" href="hpbparts.css" type="text/css" id="hpbparts">
<link rel="stylesheet" href="container_11V_2c_top.css" type="text/css" id="hpbcontainer">
<link rel="stylesheet" href="main_11V_2c.css" type="text/css" id="hpbmain">
<link rel="stylesheet" href="user.css" type="text/css" id="hpbuser">
<link rel="stylesheet" type="text/css" href="table.css" id="HPB_TABLE_CSS_ID_">
<script type="text/javascript" src="jquery.min.js"><!-- hpbiptitle jQuery library --></script> <script type="text/javascript" src="move-mainnav.js">hpb-move-mainnav-js</script> </head>
<body id="hpb-template-11-22-01" class="hpb-layoutset-01 hpb-responsive" background="img_d002.gif">
<div id="hpb-skip"><a href="#hpb-title">�{���փX�L�b�v</a></div>
<!-- container -->

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
}
?>
<div id="hpb-container" style="background-image : url(mainimg_11V1.png);">
  <!-- inner -->
  <div id="hpb-inner" style="text-align : left;" align="left">
    <!-- wrapper -->
    <div id="hpb-wrapper">
      <!-- page title -->
      <div id="hpb-title">
        <p><font size="+4" style="font-size : 310%;">�֐����󌚑��� </font></p>
        <h2>�֐��̍��󌚑��������ۂɖK�₵�āA���Љ�܂��B</h2>
      </div>
      <!-- page title end --><!-- main -->
      <div id="hpb-main">
        <!-- toppage --></div>
    </div>
    <div id="hpb-nav">
      <ul>
        <li id="menu01"><a href="#"><span class="en">MENU1</span></a>
        <li id="menu02"><a href="../kansai/mysite1/index2.html"><span class="en">MENU2</span></a>
        <li id="menu03"><a href="#"><span class="en">MENU</span></a></ul>
    </div>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_1_A_170219113937" class="hpb-cnt-tb1" width="923">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" valign="top" width="344" height="383">
          <h1><b><?=htmlspecialchars($row['meisho'])?><BR>
          aaaaaaa:<?=htmlspecialchars($row['shozaiti'])?><BR>
          ���@��:<?=htmlspecialchars($row['jidai']) ?><BR>
          ���L��: <?=htmlspecialchars($row['shoyusha']) ?><BR>
          �w����:<?=htmlspecialchars($row['siteibi']) ?>�@�@</b></h1>
          <img src="../../../Users/���T/AppData/Roaming/Justsystem/Homepage Builder Version 20/tmp/logo1.gif" width="316" height="222" border="0" style="border-top-width : 0px;border-left-width : 0px;border-right-width : 0px;border-bottom-width : 0px;" alt="NO PHOTO"></td>
          <td class="hpb-cnt-tb-cell2" style="text-align : center;" align="center" valign="top" height="383" width="525"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27197.56153416871!2d135.0458876110714!3d34.71047574294062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600080d7d252d4e1%3A0x5383f91171679c82!2z5aSq5bGx5a-6!5e0!3m2!1sja!2sjp!4v1488400074014" width="498" height="374" frameborder="0" style="border:0" allowfullscreen scrolling="AUTO"></iframe></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_2_A_170222004633" class="hpb-cnt-tb1">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="898">&nbsp;�K�����F2017-01-29</td>
        </tr>
        <tr>
          <td class="hpb-cnt-tb-cell2" width="898">&nbsp;<font size="3">�����̑������������@</font>�Ȃ��Ǌ��q�����ɏĂ��āA�P�R�O�O�N�����q���������ɍČ����ꂽ���������Ɏc���Ă��܂��B�_�ˎs���B���̍��󌚒z���ł��B�������Ȃ����A�_�ˎs���Ǝv���Ȃ����A�Â��ȎR�̒��ɂ��������ł����܂��B�����͌����тō����g�t�����͍ʑN�₩�ȕ��i���݂��܂��B�����̓����͑傫���ŃV���v���ŗY�傳�����������܂��B�܂��A�]�ˎ����Ɍ��Ă��ꂽ�O�d�����뉀�Ȃǂ������A�{���ȊO�ɂ������������܂��B</td>
        </tr>
      </tbody>
    </table>
    <h4>�R�����g</h4>
    <br>
    <table border="1" cellspacing="0" cellpadding="2" id="HPB_TABLE_5_A_170222000359" class="hpb-cnt-tb1">
      <tbody>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="896">&nbsp;���O:�Ƃ��@�o�^���F2017-02-20 20:42:59 </td>
        </tr>
        <tr>
          <td class="hpb-cnt-tb-cell1" width="896">&nbsp;�_�ˎs�c�n���S�A�N�e�B�w���O�����k���R�O�����x�̂Ƃ����ɂ����܂��B<BR>�o�X�ł����Ζ{���͏��Ȃ����A�_�ˎs�c�n���S���J�w�����o�Ă܂��B</td>
        </tr>
      </tbody>
    </table>

    <br>
    <br>
  </div>
  <!-- inner end --><!-- footer -->
  <div id="hpb-footer">
    <div id="hpb-footerMain">
      <p>copyright&copy;20XX&nbsp;Builder&nbsp;Home&nbsp;Page&nbsp;all&nbsp;rights&nbsp;reserved.</p>
    </div>
    <div id="footerExtra1">
      <div id="pagetop"><a href="#hpb-container">���̃y�[�W�̐擪��</a></div>
    </div>
  </div>
  <!-- footer end -->
</div>
</body>
</html>