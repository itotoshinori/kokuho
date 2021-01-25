<?php
$id = $_POST['password'];
if($id==""){
print $id;
setcookie('SetId', $id, time()+3600);
header('location: list.php');}
else{
print "パスワードが違います";
}
//setcookie('SetId', $id, time()+3600);
//  header('location: list.php');

//else{
//header('location: login.html');
//}
?>
