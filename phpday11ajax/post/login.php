<?php

//接受用户提交的用户名密码
if(empty($_POST['name']) ||empty($_POST['password'])) {
	exit('请提交用户名和密码');
}

$name = $_POST['name'];
$password = $_POST['password'];
if($name === '123' && $password === '123') {
	exit('恭喜你');
}
exit('用户名或者密码错误');

