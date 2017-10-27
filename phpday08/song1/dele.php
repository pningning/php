<?php
if(empty($_GET['id'])) {
	exit('<h1>必须传指定参数</h1>');
}
$id = $_GET['id'];
$temp = json_decode(file_get_contents('data.json'),true);
foreach($temp as $value) {
	if($value['id'] !== $id) continue;
	$index = array_search($value,$temp);//返回下标
	array_splice($temp,$index, 1);
	//把内容序列化
	$json = json_encode($temp);
	//把新的内容传到文件中
	file_put_contents('data.json', $json);
	//跳转页面
	header('Location: list.php');
}