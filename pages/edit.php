<?php
 if(empty($_GET['id'])) {
  exit('<h1>必须传去参数</h1>');
 }
 $id = $_GET['id'];
 //连接数据库
 $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'dome3');
 if(!$conn) {
  exit('<h1>连接数据库失败</h1>');
 }
//开始查询
 $query = mysqli_query($conn, "select * from users where id = {$id};");
if(!$query) {
  exit('<h1>查询数据失败</h1>');
}
$user = mysqli_fetch_assoc($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XXX管理系统</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">XXX管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">用户管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">商品管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">编辑"张三"</h1>
    <form>
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender">
          <option>请选择性别</option>
          <option>男</option>
          <option>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>