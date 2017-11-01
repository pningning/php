<?php

if(empty($_POST['name'])) {
	exit('请输入用户名');
}
if(empty($_POST['password'])) {
	exit('请输入密码');
}
if($_POST['name'] !== '123') {
	exit('用户名不存在');
}
if($_POST['password'] !== '123') {
	exit('密码错误');
}
exit('恭喜');