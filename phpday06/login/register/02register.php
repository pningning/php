<?php 
	function postback() {
		if(empty($_POST['name'])) {
			$GLOBALS['message'] = '请输入用户名';
			return;
		}
		if(empty($_POST['password'])) {
			$GLOBALS['message'] = '请输入密码';
			return;
		}
		if(empty($_POST['affirm'])) {
			$GLOBALS['message'] = '请输入确认码';
			return;
		}
		if($_POST['password'] != $_POST['affirm']) {
			$GLOBALS['message'] = '两次密码输入不一致';
			return;
		}
		if(!(isset($_POST['agree']) && $_POST['agree'] === "true")) {
			$GLOBALS['message'] = '必须同意注册协议';
			return;
		}
		$name = $_POST['name'];
		$password = $_POST['password'];
		//把用户名密码存储到文本中
		file_put_contents('name1.txt',$name . '|' . $password . "\n",FILE_APPEND);
		$_POST['name'] = '';
		$GLOBALS['message'] = '注册成功';
		return;

	}




	if($_SERVER['PHP_SELF']) {
		postback();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
	
  </style>
</head>
<body>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
 	<table border="1">
 		<tr>
 			<td><label for="name">用户名</label></td>
 			<td><input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>"></td>
 		</tr>
 		<tr>
 			<td><label for="password">密码</label></td>
 			<td><input type="password" name="password" id="password"></td>
 		</tr>
 		<tr>
 			<td><label for="affirm">确认密码</label></td>
 			<td><input type="password" name="affirm" id="affirm"></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><label><input type="checkbox" name="agree" value="true"></label>同意协议</td>
 		</tr>
 		<?php if(isset($message)): ?>
 			<tr>
 				<td></td>
 				<td><?php echo $message; ?></td>
 			</tr>
 		<?php endif ?>
 		<tr>
 			<td></td>
 			<td><button>注册</button></td>
 		</tr>
 	</table>          
  </form>
</body>
</html>