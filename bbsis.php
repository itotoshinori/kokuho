<?php
require_once("MYDB.php");
$pdo = db_connect();

$str = substr($_POST['coment'], 0, 20);
$str1=$_POST['name'];
$str2=$_POST['title'];

if (preg_match("/^[a-zA-Z0-9]+$/", $str) or preg_match("/^[a-zA-Z0-9]+$/", $str1) or preg_match("/^[a-zA-Z0-9]+$/", $str2)) {
	$check=0;
}else{
 $check=1;
}

if ($check== 0 or $_POST['coment']== "" or  $_POST['name']== "" or $_POST['title']== "" ){
//if ($_POST['coment']== ""){
echo "戻るのボタンを押して、本文及びタイトル、名前を入力してください。また半角英数は入力しないで下さい。<br>";
}else{


// 挿入処理
      $pdo->beginTransaction();
      $sql = "INSERT  INTO bbs (name,title,contents,url,dairyserial) VALUES ( :name, :title, :coment,:url,:ID)";
      $stmh = $pdo->prepare($sql);
      
      $stmh->bindValue(':name',  $_POST['name'],  PDO::PARAM_STR );
      $stmh->bindValue(':title', $_POST['title'], PDO::PARAM_STR );
      $stmh->bindValue(':coment',        $_POST['coment'],        PDO::PARAM_STR );
      $stmh->bindValue(':url', $_POST['url'], PDO::PARAM_STR );
      $stmh->bindValue(':ID',  $_POST['ID'],  PDO::PARAM_INT );
      $stmh->execute();
      $pdo->commit();
	setcookie( 'name', $_POST['name'], time() + 360000 );
        setcookie( 'hp', $_POST['url'], time() + 360000);
        #  print "データを" . $stmh->rowCount() . "件、挿入しました。<br>";

        $title=$_POST['title']." の掲示板コメントあり";
        $message = $_POST["name"] ."さん\n".$_POST["mail"]."\nからコメントあり\n"."http://titonet384.sakura.ne.jp/kokuho/bbs.php";
	//$message = "名前：" . $_POST["name"] . "\n" . $_POST["mail"].."\n".$_POST["coment"];
        $from = "masaki@example.com"; //差出人
	mb_send_mail("tito40358@gmail.com",$title, $message);
        print "投稿できました";
        //header('Location: bbs.php?LT=0');

       if ($_POST['action']== "bbs"){
 	header('Location:bbs.php');
	}else{
       header('Location:shousaikai2.php?ID='.$_POST['ID']);
	}
    exit();
}
