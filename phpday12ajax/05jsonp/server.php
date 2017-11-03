<?php
$conn = mysqli_connect('127.0.0.1','root','123456', 'dome3');

$query = mysqli_query($conn, 'select * from users');

while($row = mysqli_fetch_assoc($query)) {
	$data[] = $row;
}

if(empty($_GET['callback'])) {
	header('Content-Type: application/json');
	echo json_encode($data);
	exit();
}

//走下来的是通过script标记对我发送的请求，要返回一段js文件
header('Content_Type: application/javascript');