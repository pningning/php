<?php 
function postadd() {
//验证表单是否为空
  if(empty($_POST['name'])) {
    $GLOBALS['message'] = '请输入姓名';
    return;
  }
  if(!(isset($_POST['gender']) && $_POST['gender'] !== '-1')) {
    $GLOBALS['message'] = '请选择性别';
    return;
  }
  //验证日期
  if(empty($_POST['birthday'])) {
    $GLOBALS['message'] = '请输入日期';
    return;
  }
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];
//验证图片
  if(empty($_FILES['avatar'])){
    $GLOBALS['message'] = '请上传头像';
    return;
  }
  $avatar = $_FILES['avatar'];
  if($avatar['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '头像上传失败';
    return;
  }
  if($avatar['size'] > 1 * 1024 * 1024) {
    $GLOBALS['message'] = '头像太大了';
    return;
  }
  if(strpos($avatar['type'], 'image/') !== 0) {
    $GLOBALS['message'] = '不支持上传图片的格式';
    return;
  }
  $ext = pathinfo($avatar['name'],PATHINFO_EXTENSION);

  $target = './uploads/' . uniqid() . '.' . $ext;
  if(!move_uploaded_file($avatar['tmp_name'], $target)) {
    $GLOBALS['message'] = '头像上传失败';
    return;
  }
  $avatar = '/pages' .substr($target,1);
//把数据上传到数据库
  //1.建立链接
  $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'dome3');
  if(!$conn) {
    $GLOBALS['message'] = '链接数据库失败';
    return;
  }
  //2.开始增加
  $query = mysqli_query($conn, "insert into users values (null, '{$name}', '{$gender}', '{$birthday}', '{$avatar}');");
  //如果增加的内容没有
  if(!$query) {
    $GLOBALS['message'] = '查询过程失败';
    return;
  }
  //用一个变量接收上一次发生变化的行数
  $affected_rows = mysqli_affected_rows($conn);
  //如果改变的不是一行
  if($affected_rows !== 1) {
    $GLOBALS['message'] = '添加数据失败';
    return;
  }

  header('Location: index.php');
}


if($_SERVER['REQUEST_METHOD'] === 'POST') {
  postadd();
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
    <h1 class="heading">添加用户</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <?php if(isset($message)): ?>
      <div class="alert alert-warning">
        <?php echo $message; ?>
      </div>
    <?php endif ?>
      <div class="form-group">
        <label for="avatar">头像</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
      </div>
      <div class="form-group">
        <label for="name">姓名</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1">男</option>
          <option value="0">女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
