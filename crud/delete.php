<?php
	if(empty($_GET['id'])) {
		exit('必须传入指定的参数');
	}
	$id = $_GET['id'];

	require_once 'query.php';
	conn('127.0.0.1', 'dome3', "delete from users where id = '{$id}';");
	header('Location: index.php');
	
?>