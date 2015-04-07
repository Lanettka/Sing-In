<?php
$db=mysql_connect('localhost', 'root', '');
mysql_select_db('top10', $db);
 

$blogin = htmlspecialchars($_POST[login]);
$bpass = htmlspecialchars($_POST[pass]);
 

$res=mysql_query("SELECT * FROM users WHERE login='$blogin' AND pass='$bpass'", $db);
if(mysql_num_rows($res) != 1){    
echo "Введены не верные логин или пароль";
}
else{    
session_start();
$_SESSION['login']=$blogin;    
$_SESSION['pass']=$bpass;
$_SESSION['var']=1;
Header("Location: index.html");   
mysql_close();
}
?>
