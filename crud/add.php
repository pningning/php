<?php

function image($obj) {
  if(empty($_FILES[$obj])) {
    $GLOBALS[$obj] = '请正确使用表格';
    return;
  }
  $avatar = $_FILES[$obj];
  if($avatar['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '请上传头像';
    return;
  }
  if($avatar['size'] > 1 * 1024 * 1024) {
    $GLOBALS['message'] = '头像图片太大了';
    return;
  }

  if(strpos($avatar['type'], 'image/') !== 0) {
    $GLOBALS['message'] = '不支持此图片格式';
    return;
  }

  $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
  $target = './uploads/' . uniqid() . '.' . $ext;
  if(!move_uploaded_file($avatar['tmp_name'], $target)) {
    $GLOBALS['message'] = '上传头像失败';
    return;
  }
}
function add() {
  //目标把接受提交的数据，把数据提交到数据库
  //校验图片
  // if(empty($_FILES['avatar'])) {
  //   $GLOBALS['message'] = '请正确使用表格';
  //   return;
  // }
  // $avatar = $_FILES['avatar'];
  // if($avatar['error'] !== UPLOAD_ERR_OK) {
  //   $GLOBALS['message'] = '请上传头像';
  //   return;
  // }
  // if($avatar['size'] > 1 * 1024 * 1024) {
  //   $GLOBALS['message'] = '头像图片太大了';
  //   return;
  // }

  // if(strpos($avatar['type'], 'image/') !== 0) {
  //   $GLOBALS['message'] = '不支持此图片格式';
  //   return;
  // }

  // $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
  // $target = './uploads/' . uniqid() . '.' . $ext;
  // if(!move_uploaded_file($avatar['tmp_name'], $target)) {
  //   $GLOBALS['message'] = '上传头像失败';
  //   return;
  // }
  image('avatar');
  
  //校验文本
  //把数据提交到数据库
  //页面跳转

}



if($_SERVER['REQUEST_METHOD'] === 'POST') {
  add();
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
</html>-