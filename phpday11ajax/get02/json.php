<?php
	header('Content-Type: application/json');
	//返回的响应头应该设置返回的数据类型
	$data = array(
		array(
			'id' => 1,
			'name' => '张三',
			'age' => 18
			),
		array(
			'id' => 2,
			'name' => '李四',
			'age' => 20
			),
		array(
			'id' => 3,
			'name' => '王五',
			'age' => 21

			),
		array(
			'id' => 22,
			'name' => '马六',
			'age' => 23

			)
		);


	//判断接受到的请求
	if(empty($_GET['id'])) {
		//如果没有获取到id
		$json = json_encode($data);//得到一个 
		echo $json;
	} else {
		//传递了一个id
		foreach($data as $item) {
			if($item['id'] != $_GET['id']) continue;
			$json = json_encode($item);
			echo $json;
		}
	}
