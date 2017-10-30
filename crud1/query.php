<?php


function conn($start) {
	//建立连接
	$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'dome3');

	if (!$conn) {
	  exit('<h1>连接数据库失败</h1>');
	}
	//设置编码
	 mysqli_set_charset($conn, 'utf8');
	// 2. 开始查询

	$GLOBALS['query'] = mysqli_query($conn, $start);
	if (!mysqli_query($conn, $start)) {
	  exit('<h1>查询数据失败</h1>');
	}
}


