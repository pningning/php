<?php 




	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		postback();
	}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
	<table>
		<tr>
			<td><label for="name">用户名</label></td>
			<td><input type="text" name="name" id="name"></td>
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
			<td><label><input type="text" name="agree" value="true">同意注册协议</label></td>
		</tr>
		<tr>
			<td></td>
			<td><button>注册</button></td>
		</tr>
	</table>
  </form>
</body>
</html>