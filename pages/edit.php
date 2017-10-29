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
   mysqli_set_charset($conn, 'utf8');
  //开始查询
   $query = mysqli_query($conn, "select * from users where id = {$id};");
  if(!$query) {
    exit('<h1>查询数据失败</h1>');
  }
  $user = mysqli_fetch_assoc($query);
  if(!$user) {
    exit('<h1>找不你要编辑的数据</h1>');
  }

  //目标接收到编辑页面提交的数据，并修改到数据库中
  function post() {
    global $user;
    global $id;
    //判断文本
    if(empty($_POST['name'])) {
      $GLOBALS['message'] = '请输入姓名';
      return;
    }
    if(!(isset($_POST['gender']) && $_POST['gender'] !== '-1')) {
      $GLOBALS['message'] = '请选择性别';
      return;
    }

    if(empty($_POST['birthday'])) {
      $GLOBALS['message'] = '请输入日期';
      return;
    }
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    //判断图片
    if(empty($_FILES['avatar'])) {
      $GLOBALS['message'] = '请正确使用表格';
    }
    
    if($_FILES['avatar']['error'] === UPLOAD_ERR_NO_FILE ) {

      $avatar = $user['avatar'];

    }else {
      $avatar = $_FILES['avatar'];
      if($avatar['error'] !== UPLOAD_ERR_OK) {
        $GLOBALS['message'] = '上传头像失败';
        return;
      }
      if($avatar['size'] > 1 * 1024 * 1024) {
        $GLOBALS['message'] = '上传头像太大了';
        return;
      }
      if(strpos($avatar['type'], 'image/') !== 0) {
        $GLOBALS['message'] = '不支持上传头像的格式';
        return;
      }
      //
      $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
      $target = './uploads/' . uniqid() . '.' . $ext;
      if(!move_uploaded_file($avatar['tmp_name'], $target)) {
        $GLOBALS['message'] = '头像上传失败';
        return;
      }
      $avatar = '/pages' . substr($target, 1);
    }
    


    //修改数据
    //建立链接
    $conn = mysqli_connect('127.0.0.1', 'root', '123456', 'dome3');
    if(!$conn) {
      $GLOBALS['message'] = '链接数据库失败';
      return;
    }
    //查询数据
    $query = mysqli_query($conn, "update users set name = '{$name}' , gender = {$gender}, birthday = '{$birthday}' , avatar = '{$avatar}' where id = {$id};");
    if(!$query) {
      $GLOBALS['message'] = '编辑信息失败';
      return;
    }

    //页面跳转

    header('Location: index.php');

  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    post();
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
    <h1 class="heading">编辑<?php echo $user['name']; ?></h1>
    <form action="edit.php?id=<?php echo $user['id']; ?>" method="post" enctype="multipart/form-data">
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
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
      </div>
      <div class="form-group">
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1"<?php echo $user['gender'] === '1' ? ' selected' : ''?>>男</option>
          <option value="0"<?php echo $user['gender'] === '0' ? ' selected' : ''; ?>>女</option>
        </select>
      </div>
      <div class="form-group">
        <label for="birthday">生日</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>">
      </div>
      <button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>