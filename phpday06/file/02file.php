<?php
	function unload() {
		//如果表单中没有这个表单域
		if(!isset($_FILES['avatar'])) {
			$GLOBALS['message'] = '逗我玩?';
			return;
		}
		//如果没有上传文件、
		$avatar = $_FILES['avatar'];
		if($avatar['error'] != UPLOAD_ERR_OK) {
			$GLOBALS['message'] = '上传失败';
			return;
		}

		//如果上传了文件
		$source = $avatar['tmp_name'];//把文件的临时地址存到变量中
		$target = './uploads/' . $avatar['name'];
		$moved = move_uploaded_file($source,$target);
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
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<input type="file" name="avatar">
		<button>上传</button>
		<?php if(isset($message)): ?>
			<p><?php echo $message; ?></p>
		<?php endif ?>
	</form>
</body>
</html>