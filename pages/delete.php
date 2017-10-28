<?php 
if(empty($_GET['id'])) {
	exit('<h1>必须传去指定参数</h1>');
}
$id = $_GET['id'];

//跟数据库建立连接
$conn = mysqli_connect('127.0.0.1', 'root', '123456', 'dome3');
if(!$conn) {
	exit('<h1>数据库连接失败</h1>');
}
$query = mysqli_query($conn,"delete from users where id='{$id}';");
if(!$query) {
	exit('<h1>查询数据失败</h1>');
}
$affected_rows = mysqli_affected_rows($conn);
if($affected_rows <= 0) {
	exit('<h1>删除失败</h1>');
}
header('Location: index.php');
?>