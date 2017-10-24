<?php
	function unload() {
		//如果没有上传图片
		if(!isset($_FILES['avatar'])) {
			$GLOBALS['message'] = '逗我玩?';
			return;
		}
		//如果上传图片了
		//把图片信息存储到一个变量里面
		$avatar = $_FILES['avatar'];
		//如果没有上传成功
		if($avatar['error'] !== UPLOAD_ERR_OK) {
			$GLOBALS['message'] = '上传失败';
			return;
		}

		$source = $avatar['tmp_name'];//把文件临时地址存到变量中
		$target = './uploads/' . $avatar['name'];//目标放在哪里

		// 移动到网站范围之内
		$moved = move_uploaded_file($source, $target);

		if(!$moved) {
			$GLOBALS['message'] = '上传失败';
			return;
		}
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		unload();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
		<input type="file" name="avatar">
		<button>上传</button>
		<?php if(isset($message)): ?>
			<p><?php echo $message; ?></p>
		<?php endif?>
	</form>
</body>
</html>