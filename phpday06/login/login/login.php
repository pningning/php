<?php 
	function fn() {
		if(empty($_POST['name'])) {
			$GLOBALS['message'] = '请输入用户名';
			return;
		}
		if(empty($_POST['password'])) {
			$GLOBALS['message'] = '请输入密码';
			return;
		}

		$str = file_get_contents('../register/name.txt');
			
		$arr = explode("\n",$str);
		foreach($arr as $value) {
			if(!$value) continue;
			$arr2[] = explode('|',$value);
		}

		foreach($arr2 as $value2) {
			if($value2[0] === $_POST['name'] && $value2[1] === $_POST["password"]) {
				// $GLOBALS['login'] = 'login.php';
				$GLOBALS['message'] = '登录成功';
				break;
			}else {
				$GLOBALS['message'] = '用户名不存在或密码错误';
			}
		}


	}
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		fn();
	} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" >
		<table>
			<tr>
				<td><label for="name">用户名</label></td>
				<td><input type="text" name="name" id="name"></td>
			</tr>
			<tr>
				<td><label for="password">密码</label></td>
				<td><input type="password" name="password" id="password"></td>
			</tr>
			<?php if(isset($message)): ?>
			<tr>
				<td></td>
				<td><?php echo $message; ?></td>
			</tr>
			<?php endif ?>
			<tr>
				<td></td>
				<td><button>登录</button></td>
			</tr>
		</table>
	</form>
</body>
</html>