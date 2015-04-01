<?php
$db=mysql_connect('localhost', 'root', '');
mysql_select_db('top10', $db);
 
// Обезвреживаем переменные
$blogin = htmlspecialchars($_POST[login]);
$bpass = htmlspecialchars($_POST[pass]);
 
//проверяем есть ли пользователь с таким login'ом и pass'ом
$res=mysql_query("SELECT * FROM users WHERE login='$blogin' AND pass='$bpass'", $db);
if(mysql_num_rows($res) != 1){    //такого пользователя нет
echo "Введены не верные логин или пароль";
}
else{    //пользователь найден
session_start();
$_SESSION['login']=$blogin;    //устанавливаем login & pass
$_SESSION['pass']=$bpass;
$_SESSION['var']=1;
Header("Location: index.html");    // перенаправляем на index.html
mysql_close();
}
?>