<?PHP
	function post() {
		if(empty($_POST['name'])) {
		$GLOBALS['message'] = '请输入用户名';
		return;
		}
		if(empty($_POST['password'])) {
		$GLOBALS['message'] = '请输入密码';
		}

		setcookie('name', $_POST['name']);
		setcookie('password', $_POST['password']);
		header('Location: succeed.php');
	}
	
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		post();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
		<table>
			<?php if(isset($message)): ?>
				<tr>
					<td></td>
					<td><?php echo $message; ?></td>
				</tr>
			<?php endif ?>
			<tr>
				<td><label for="name">用户名</label></td>
				<td><input type="text" name="name" id="name" value="<?php echo isset($_COOKIE['name']) ? $_COOKIE['name'] : ''; ?>"></td>
			</tr>
			<tr>
				<td><label for="password">密码</label></td>
				<td><input type="password" name="password" id="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><button>登录</button></td>
			</tr>
		</table>
	</form>
</body>
</html>