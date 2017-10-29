<?php
//建立桥梁
$conn = mysqli_connect('127.0.0.1','root','123456','dome3');
if(!$conn) {
  exit('<h1>链接数据库失败</h1>');
}
//设置可以读取中文
mysqli_set_charset($conn, 'utf8');
//查询数据
$query = mysqli_query($conn,'select * from users;');
if(!$query) {
  exit('<h1>查询数据失败</h1>');
}

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
    <h1 class="heading">用户管理 <a class="btn btn-link btn-sm" href="add.php">添加</a></h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <td>选项</td>
          <th>#</th>
          <th>头像</th>
          <th>姓名</th>
          <th>性别</th>
          <th>年龄</th>
          <th class="text-center" width="140">操作</th>
        </tr>
      </thead>
      <tbody>
       <?php while($item = mysqli_fetch_assoc($query)): ?> 
          <tr>
          <td><input type="checkbox" value="true" ></td>
            <th scope="row"><?php echo $item['id']; ?></th>
            <td><img src="<?php echo $item['avatar']; ?>" class="rounded" alt="<?php echo $item['name']; ?>"></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['gender'] === '0' ? '女' : '男'; ?></td>
            <td><?php echo $item['birthday']; ?></td>
            <td class="text-center">
            <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">编辑</a>
            <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $item['id']; ?>">删除</a>
          </td>
          </tr>
       <?php endwhile ?>
      </tbody>
    </table>
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
    </ul>
  </main>
</body>
</html>
