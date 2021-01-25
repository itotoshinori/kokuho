<?php

if ($_POST['coment']== "" or $_POST['mail']=="" or $_POST['name']==""){
echo "戻るのボタンを押して、本文及び名前、メールアドレスを入力してください。<br>";
}else{


// 挿入
        $title=$_POST['title']." のメールフォームからコメントあり";
        $message = $_POST["name"] ."さん\n".$_POST["mail"]."\nからメールフォームでコメントあり\n【コメント】\n".$_POST["coment"];
	//$message = "名前：" . $_POST["name"] . "\n" . $_POST["mail"].."\n".$_POST["coment"];
        $from = $_POST["mail"]; //差出人
	mb_send_mail("tito40358@gmail.com",$title, $message);
        print "投稿できました";
        //header('Location: bbs.php?LT=0');

       if ($_POST['action']== "bbs"){
 	header('Location:index.php');
	}else{
       header('Location:shousaikai2.php?ID='.$_POST['ID']);
	}
    exit();
}
